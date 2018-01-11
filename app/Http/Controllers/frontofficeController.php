<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Package;
use App\Shipment;
use App\Product;
use App\User;
use App\Giftcard;
use App\Order;
use App\Provider;
use App\Transaction;
use Countries;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Redirect;
use CRUDBooster;
use Mail;

class frontofficeController extends Controller
{
    #use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(Request $request, Redirector $redirect){
    	//83.84.248.234 IP Dennis
    	//IP VJ
    	$maintenance = true;
    	/*$ips = array('83.84.248.234','83.84.251.112','186.179.253.48');
    	if(!in_array($_SERVER["REMOTE_ADDR"],$ips)){
			return Redirect::route('maintenance')->send();
		}*/
    }

    public function index(Request $request){
    	$products = \DB::table('products')->where('webshop',1)->get();
      return view('frontoffice.home',compact('products'));
    }

    public function contact(Request $request){
      if($request->isMethod('post')){
        $this->validate($request, [
            'naam' => 'required|min:3|max:255',
            'bericht' => 'required|min:3',
        ]);
        $data = array(
        	'naam'=>$request->get('naam'),
        	'tel'=>$request->get('tel'),
        	'email'=>$request->get('email'),
        	'bericht'=>$request->get('bericht')
        );
        Mail::send('frontoffice.basicmail', $data, function($message) {
         $message->to('droopram@gmail.com', 'Dennis Roopram')
         ->subject('Mail test');
         $message->from('droopram2@gmail.com','Dennis Roopram');
      });
        
      }
      return view('frontoffice.contact');
    }

    public function about(Request $request){
      return view('frontoffice.about-us');
    }

    public function tracktrace(Request $request){
      if($request->get('tt')){
        $tt = $request->get('tt');
        //Shipment
        $type='shipment';
        $package = Shipment::where('tracking_number',$tt)->first();
        if($package===null){
          $package = Package::where('barcode',$tt)->first();
          $shipment = Shipment::find($package->shipment_id);
          if($shipment!==null){
          	$package = $shipment;
          	$package->status = 'received';
          }
        }
        return view('frontoffice.tracktrace',compact('package'));
      }
      return view('frontoffice.tracktrace');
    }

    public function messages()
    {
        return [
            'naam.required' => 'Vul aub uw naam in.',
            'bericht.required'  => 'Vul aub een bericht in.',
        ];
    }
    
    public function myAccount(Request $request){
    	if(!Auth::check()){
            $countries = Countries::get();

    		return view('frontoffice.register',compact('countries'));
    	}
    	$user = Auth::user();
    	
    	if($request->isMethod('post') ){
            if($request->get('link') !== null){
                $links = array();
                $iLinks = $request->get('link');
                $iNotes = $request->get('note');
                foreach($iLinks as $k=>$v){
                    if($v!==null){
                        $order = new Order();
                        $order->link = $v;
                        $order->notes = $iNotes[$k];
                        $order->customer_id = $user->id;
                        $order->status = 'Pending';
                        $order->save();
                    }
                }    
            }

    		if($request->get('amount') !== null){
                $links = array();
                $amounts = $request->get('amount');
                $providers = $request->get('provider');
                foreach($amounts as $k=>$v){
                    if($v!==null){
                        $providerData = $providers[$k];
                        $provider = json_decode($providerData);

                        $giftcard = new Giftcard();
                        $giftcard->value = $v;
                        $giftcard->cost = $v + ($v /100) * $provider->fee;
                        //$giftcard->code = mt_rand(100000,999999);
                        $giftcard->customer_id = $user->id;
                        $giftcard->provider_id = $provider->id;
                        $giftcard->status = 'pending';
                        $giftcard->save();
                    }
                }    

            }
         
    	  /*Mail::send('frontoffice.ordermail', array('links'=>$links,'user'=>$user), 
    			function($message) {
    	   		  $message->to('droopram@gmail.com', 'Dennis Roopram')
		         ->subject('Mail test');
		         $message->from('droopram2@gmail.com','Dennis Roopram');
	      });*/
               return redirect(route('my-account')); 

    	}
        $contents = array();
        $result = \DB::table('cms_settings')->where('name','inhoud_content')->first();
        if($result){
           $contentStrs = explode(",", $result->content) ;

           foreach ($contentStrs as $value) {
             $contents[] = ['value' => $value, 'text' => $value ];
           }
           $inhund_contents = json_encode($contents);
        }
        $providers = Provider::get();
    	return view('frontoffice.myaccount', compact('user', 'providers','inhund_contents'));
    }
    
    public function myPackages(){
    	if(Auth::check()){
    		$user = Auth::user();
    	       
               
            $sql = "SELECT packages.*, shipments.status FROM packages
                    LEFT JOIN shipments ON packages.shipment_id = shipments.id WHERE packages.customer_id=".$user->id. " AND ((shipments.status <> 'completed') OR (packages.shipment_id IS NULL)) ORDER BY packages.id DESC";
            $packages = \DB::select($sql);
            foreach ($packages as $key => $package) {
                if($package->status === null){
                    $package->status = "accepted";
                }
            }
          //  $packages = $user->packages();
    		return json_encode($packages);
    	}
    }
    
    public function myInvoices(){
        if(Auth::check()){
            $user = Auth::user();
             /*  
            $sql = "SELECT shipments.* FROM shipments status = 'completed' ORDER BY shipments.id DESC";
            $shipments = \DB::select($sql);
            foreach ($shipments as $key => $shipment) {
                if($package->status === null){
                    $package->status = "accepted";
                }
            }*/
            $shipments = Shipment::where('status','completed')->leftJoin('customers', 'shipments.customer_id', '=', 'customers.id')->where('customer_id','=',$user->id)->orderBy('shipments.id','desc')->select('shipments.*','customers.first_name','customers.last_name')->get();
            foreach ($shipments as $key => $shipment) {
                $packages = Package::where('shipment_id', $shipment->id)->get();    
                $shipment->fullname = $shipment->first_name. " " .$shipment->last_name;  
                $shipment->packages = $packages;
                $shipment->transaction = Transaction::where('shipment_id','=', $shipment->id)->first();
                $shipment->package_count = sizeof($packages). " Packages";
            }
          //  $packages = $user->packages();
            return json_encode($shipments);
        }
    }
    

    public function updateMyPackage(Request $request){
    	if(Auth::check()){
    		$package = Package::where('id',$request->get('id'))->first();
            $content = $request->get('content');
            $type = $request->get('type');
    		if($package!==null){
                $shipment = Shipment::where('id', $package->shipment_id)->first();
                if($content) $package->content = $content;
                if(!$shipment && $type) $package->shipment_type = $type;
    			$package->save();

    		}
    	}
    }

    public function signup(Request $request){
    	if(Auth::check()){
            return redirect()->intended('my-account');
    	}
        else {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
     
        }
    }

    public function login(Request $request){
    	if(Auth::attempt(
    		['email'=>$request->get('email'), 
    		'password'=>$request->get('pass')],
    		$request->get('remember_me',false)
    	)){
    		return redirect()->route('my-account');
    	}
    	return redirect()->route('my-account');
    }
    
    public function logout(){
    	if(Auth::check()){
    		Auth::logout();
    	}
    	return redirect()->route('home');
    }

    public function getOrders(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $orders =Order::where('customer_id' , $user->id)
                ->where('status', '!=' ,'Accepted')
                ->get();
           
            
            return json_encode($orders);
        }
    }

    public function getProviders(Request $request) {
        if(Auth::check()) {
            $providers = Provider::get();
            return json_encode($providers);
        }
    }

    public function confirmOrder(Request $request) {
        if(Auth::check()){
            $orderId = $request->get('order_id');
            if(!isset($orderId))
                return json_encode(['error'=>'invalid id']);

            $order = Order::find($orderId);
            if($order === null) {
                return json_encode(['error'=> 'no order found.']);
            }
            $order->status = 'Awaiting Payment';

            $order->save();
            return json_encode(['data'=>'success']);
        }

            return json_encode(['data'=>'success']);

    }

    public function declineOrder(Request $request) {
        if(Auth::check()){
            $orderId = $request->get('order_id');
            if(!isset($orderId))
                return json_encode(['error'=>'invalid id']);

            $order = Order::find($orderId);
            if($order === null) {
                return json_encode(['error'=> 'no order found.']);
            }
            $order->status = 'Price Declined';

            $order->save();
            return json_encode(['data'=>'success']);
        }

            return json_encode(['data'=>'success']);

    }
    public function newOrder(Request $request){

    }

    public function getGiftcards(Request $request){
    	if(Auth::check()){
    		$user = Auth::user();
    		$giftcards = $user->giftcards();
    		return json_encode($giftcards);
    	}
    }
    
    public function newGiftcard(Request $request){
        
    }
    
    public function faq(Request $request){
    	return view('frontoffice.faq');
    }
    
    public function viewProduct($id, Request $request){
    	$product = \DB::table('products')->find($id);
    	if($product===null) return redirect(route('home'));
    	return view('frontoffice.product-detail',compact('product'));
    }

      public function getPrintInvoice($id, Request $request){
          $tx = Transaction::find($id);
          if($tx===null){
            return redirect(url('/my-account'));
          }
          $pdf = \PDF::loadView('backoffice.print-invoice',compact('tx'));
          return $pdf->stream();
          //return view('backoffice.print-invoice',compact('tx'));

        }
}
