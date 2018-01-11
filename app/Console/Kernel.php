<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $orders = Order::get();
            foreach ($orders as $key => $order) {
                    
                    $startDate = strtotime($order.updated_at);
                    $currentDate = time();
                    if($currentDate - $startDate > 604800 ) {
                      $order->delete();
                    }

                  } 

        })->daily()->at('12:00');

        $schedule->call(function () {
            //create shipments
            $week = date('W');
            $settings_group = 'shipping settings';
            $rates['sea'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','usd_per_inch_sea')->first();
            $rates['air'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','usd_per_lbs_sea')->first();
            $rates['eco'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','usd_per_inch_eco')->first();
            $package_groups = \DB::table('packages')
                      ->select(\DB::raw('count(*) as packages, shipment_type, first_name, last_name, customer_id'))
                      ->where('shipment_id','=',null)
                      ->where('week',$week)
                      ->groupBy('customer_id','first_name','last_name','shipment_type')
                      ->get();

            foreach ($package_groups as $package_group) {
                $shiptype = $package_group->shipment_type;
                $customer_id = $package_group->customer_id;
                $customer = Customer::find($customer_id);
                $packages = \DB::table('packages')
                    ->where('shipment_id','=',null)
                    ->where('customer_id','=',$customer_id)
                    ->where('shipment_type',$shiptype)
                    ->where('week',$week);

                $shipment = new Shipment();
                $shipment->customer_id = $customer->id;
                $shipment->employee_id = 0;
                $shipment->tracking_number = $this->generateTrackingNumber();
                $shipment->barcode = $shipment->tracking_number;
                $shipment->currency='USD';
                $shipment->warehouse_id = 1;
                $shipment->destination_warehouse_id = 1;
                $shipment->height=0;
                $shipment->width=0;
                $shipment->depth=0;
                $shipment->weight=0;
                $width = 0;
                $height = 0;
                $depth = 0;
                $extrafee = 0;
                $parts = 0;
                $total = 0;
                if($shiptype === 'sea'){
                    $total = $height * 
                           $width * 
                           $depth * 
                           $rates['sea']->content;

                    $shipment->height=$height;
                    $shipment->width=$width;
                    $shipment->depth=$depth;
                    $shipment->price_per_inch = $rates['sea']->content;
                }
                if($shiptype === 'eco'){
                    $total = $weight *  
                              $rates['eco']->content;

                      $shipment->weight=$weight;
                      $shipment->price_per_lbs = $rates['eco']->content;
                }
                if($shiptype === 'air'){
                      $total = $weight * 
                              $rates['air']->content;

                      $shipment->weight = $weight;
                      $shipment->price_per_lbs = $rates['air']->content;
                }

                $total += $extrafee;
                $shipment->parts = $parts;
                $shipment->extrafee = $extrafee;
                $shipment->price = $total;
                $shipment->shipment_type = $shiptype;
                $shipment->week=date('W');
                $shipment->save();
                $packages = \DB::table('packages')
                  ->where('shipment_id','=',null)
                  ->where('customer_id','=',$customer->id)
                  ->where('shipment_type',$shipment->shipment_type)
                  ->where('week',$week);
                      
                $packages->update(['shipment_id'=>$shipment->id]);
            }
           


        })->weekly()->fridays()->at('12:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

    public function generateTrackingNumber(){
      $next = \DB::table('shipments')->max('id');
      $next++;
      //$next = number_format($next,4,'-','');
      $next = sprintf("%08d",$next);
      $next = substr($next,0,4).'-'.substr($next,-4);
      $s = strtoupper(md5(uniqid(rand(),true)));
      $guidText =
          'RPCM' . '-' . #roopcom
          date('Y').'-' . #year ISO
          $next; #Package 
      return $guidText;
    }
}
