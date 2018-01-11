<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Package;
	use App\Shipment;
	use App\Customer;
	use App\Transaction;
	use Illuminate\Http\Request as iRequest;
	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Foundation\Validation\ValidatesRequests;

	class AdminShipmentsController extends \crocodicstudio\crudbooster\controllers\CBController {
	

    use DispatchesJobs, ValidatesRequests;
	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon_text";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "roopcom_cms.shipments";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Type","name"=>"shipment_type"];
			$this->col[] = ["label"=>"Tracking Number","name"=>"tracking_number"];
			$this->col[] = ["label"=>"Customer","name"=>"(select concat(first_name,' ',last_name) from customers where customer_id = customer_id)"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			$this->col[] = ["label"=>"Total Price","name"=>"price"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'dataenum' => array('air','sea'),
  'style' => NULL,
  'help' => NULL,
  'label' => 'Type',
  'name' => 'shipment_type',
  'type' => 'select',
  'validation' => 'required|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Parts',
  'name' => 'parts',
  'type' => 'text',
  'validation' => 'min:1|max:255|integer',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Tracking Number',
  'name' => 'tracking_number',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'customers,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Customer Id',
  'name' => 'customer_id',
  'type' => 'select2',
  'validation' => 'required|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Height',
  'name' => 'height',
  'type' => 'number',
  'validation' => 'numeric',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Width',
  'name' => 'width',
  'type' => 'number',
  'validation' => 'numeric',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Depth',
  'value'=>0,
  'name' => 'depth',
  'type' => 'number',
  'validation' => 'numeric',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'value'=>0,
  'label' => 'Weight',
  'name' => 'weight',
  'type' => 'number',
  'validation' => 'numeric',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Currency',
  'name' => 'currency',
  'type' => 'text',
  'validation' => 'required',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Price',
  'name' => 'price',
  'type' => 'text',
  'validation' => 'required',
  'width' => 'col-sm-10',
);
/*
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'warehouses,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Destination Warehouse Id',
  'name' => 'destination_warehouse_id',
  'type' => 'select2',
  'validation' => 'required|max:255',
  'width' => 'col-sm-10',
);*/
			# END FORM DO NOT REMOVE THIS LINE

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;



	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }
	    
	    public function getSetWeek($type,$id){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
	    	$packages = DB::table('shipments')->where('id',$id);
	    			if($type=='add'){
	    				$packages->update(['week'=>DB::raw('week+1')]);
	    			}
	    			if($type=='substract'){
	    				$packages->update(['week'=>DB::raw('week-1')]);
	    			}
   					CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Shipment with ID:".$id." updated","success");
	    }

      public function testAutoShipment(iRequest $request) {
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
      }
		
    public function getScanShipments(iRequest $request){
        if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
        $page_title = 'Arrival Shipments';     
       $week = $request->get('week',date('W'));
       if($request->isMethod('post')){
      
           $barcode = $request->input('tracking_number');
           $errors = array();
           if(!isset($barcode)){
             $errors[] = 'Vul alstublieft de tracking number in.';
           }
           if(isset($barcode)){
                  $shipment = Shipment::where('tracking_number', $barcode)->first();
                  if($shipment===null){
                    $errors[] = 'Tracking Number is not correct';
                   
                  }
                }

          if(sizeof($errors) > 0) {
            $shipment = new \stdClass();
              if($barcode) $shipment->barcode = $barcode;
              $shipments = Shipment::where('status','delivered')->orderBy('id','desc')->get();

               return view('backoffice.scan-shipment', compact('page_title','errors','shipments', 'shipment', 'week'));
            }

            if($shipment !== null){
              $shipment->status = "delivered";
              $shipment->save();
            }
         


       }
       
        $shipments = Shipment::where('status','delivered')->orderBy('id','desc')->get();

        return view('backoffice.scan-shipment', compact('page_title','shipments','week'));
    }

    public function getJsonShipments(iRequest $request){
        if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
        $page_title = 'Arrival Shipments';
        return view('backoffice.scan-shipment', compact('page_title'));
    }
		public function getRepack(iRequest $request){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		      $page_title = 'Repack';
		      $week = $request->get('week',date('W'));
      
    		  $packages = \DB::table('packages')
                      ->select(\DB::raw('count(*) as packages, shipment_type, first_name, last_name, customer_id'))
                      ->where('shipment_id','=',null)
                      ->where('week',$week)
                      ->groupBy('customer_id','first_name','last_name','shipment_type')
                      ->get();

            $lbs = Shipment::where('week',$week)->sum('weight');
	    	$shipments = Shipment::where('week',$week)->orderBy('id','desc')->get();
      		return view('backoffice.repack', compact('page_title','packages','week','shipments', 'lbs'));
		}
		
 		public function getCreateRepack(iRequest $request, $id){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
      $week = $request->get('week', date('W'));
      $shiptype = $request->get('shiptype','eco');
      $customer = Customer::find($id);
      $page_title='Create Repack';
      if($customer===null){
        return redirect(route('admin-repack'));
      }
      $settings_group = 'shipping settings';
      $rates['sea'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','usd_per_inch_sea')->first();
      $rates['air'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','usd_per_lbs_sea')->first();
      $rates['eco'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','usd_per_inch_eco')->first();
      $packages = \DB::table('packages')
            ->where('shipment_id','=',null)
            ->where('customer_id','=',$customer->id)
            ->where('shipment_type',$shiptype)
            ->where('week',$week);
      if($request->isMethod('post')){
        $shipment = new Shipment();
        $shipment->customer_id = $customer->id;
        $shipment->employee_id = CRUDBooster::myId();
        $shipment->tracking_number = $this->generateTrackingNumber();
        $shipment->barcode = $shipment->tracking_number;
        $shipment->currency='USD';
        $shipment->warehouse_id = 1;
        $shipment->destination_warehouse_id = 1;
        $shipment->height=0;
        $shipment->width=0;
        $shipment->depth=0;
        $shipment->weight=0;
          
        $total = 0;
        if($request->input('type') === 'sea'){
          $this->validate($request, [
              'height' => 'required|numeric',
              'width' => 'required|numeric',
              'depth' => 'required|numeric'
          ]);
          $total = $request->input('height') * 
                  $request->input('width') * 
                  $request->input('depth') * 
                  $rates['sea']->content;

          $shipment->height=$request->input('height');
          $shipment->width=$request->input('width');
          $shipment->depth=$request->input('depth');
          $shipment->price_per_inch = $rates['sea']->content;
        }
        
        if($request->input('type') === 'eco'){
          $this->validate($request, [
              'weight' => 'required|numeric',
          ]);
          $total = $request->input('weight') *  
                  $rates['eco']->content;

          $shipment->weight=$request->input('weight');
          //added by jin
          $shipment->weight = ceil($shipment->weight);
          $shipment->price_per_lbs = $rates['eco']->content;
        }

        if($request->input('type') === 'air'){
          $this->validate($request, [
              'weight' => 'required|numeric'
          ]);
          $total = $request->input('weight') * 
                  $rates['air']->content;

          $shipment->weight = $request->input('weight');
          //added by jin
          $shipment->weight = ceil($shipment->weight);
          $shipment->price_per_lbs = $rates['air']->content;
        }

          $this->validate($request, [
              'parts' => 'required|integer',
              'type'=>'required',
              'extrafee'=>'nullable|numeric',
          ]);

          //Good 2 go!
          $total += $request->input('extrafee');
          $shipment->parts = $request->input('parts');
          $shipment->extrafee = $request->input('extrafee');
          $shipment->price = $total;
          $shipment->shipment_type = $request->input('type');
          $shipment->week=date('W');
          $shipment->save();
          
          $packages = \DB::table('packages')
            ->where('shipment_id','=',null)
            ->where('customer_id','=',$customer->id)
            ->where('shipment_type',$shipment->shipment_type)
            ->where('week',$week);
        $packages->update(['shipment_id'=>$shipment->id]);
        return redirect(route('admin-repack'));
      }
      $packages = $packages->get();
      return view('backoffice.create-repack', compact('page_title','customer','rates','shiptype','packages'));
    }

    public function getUpdateRepack(iRequest $request, $id){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
      $shipment = Shipment::find($id);
      if($shipment===null){
        return redirect(url('admin/shipments'));
      }
      $shipment->status = $request->input('status');
      $shipment->save();
      return redirect(url('admin/shipments'));
    }

    public function getCreateInvoice(iRequest $request, $id){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
      $shipment = Shipment::find($id);
      $page_title='Create invoice';
      if($shipment===null || $shipment->transaction !== null){
        return redirect(url('admin/shipments'));
      }
      $settings_group = 'shipping settings';
      $rates['srd'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','us_su_rate')->first();
      $rates['eur'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','us_nl_rate')->first();

      if($request->isMethod('post')){
      		
          $this->validate($request, [
              'srd' => 'required|numeric',
              'usd' => 'required|numeric',
              'eur' => 'required|numeric',
          ]);
          //Create transaction
          $tx = new Transaction();
          $tx->customer_id = $shipment->customer_id;
          $tx->shipment_id = $shipment->id;
          $tx->srd = $request->input('srd');
          $tx->usd = $request->input('usd');
          $tx->eur = $request->input('eur');
          $tx->total = $shipment->price;
          $paid = round(
          	$tx->usd + 
          	($tx->srd * (1/$rates['srd']->content)) + 
          	($tx->eur * (1/$rates['eur']->content))
          	,2);
          $tx->paid = $paid;
          $tx->change = ($paid - $tx->total)*-1;
          $tx->signature = $request->get('signature');
          $tx->save();
          //Update shipment
          $shipment->status = 'completed';
          $shipment->save();

          //Generate Invoice PDF
      	  //echo '<script>window.open('.route('admin-print-invoice',['id'=>$shipment->transaction->id]).');</script>';
          return redirect(url('admin/shipments'));
          
      }
      return view('backoffice.create-invoice', compact('page_title','shipment','rates'));
    }

    public function getPrintInvoice(iRequest $request, $id){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
      $tx = Transaction::find($id);
      if($tx===null){
        return redirect(url('admin/shipments'));
      }
      $pdf = \PDF::loadView('backoffice.print-invoice',compact('tx'));
      return $pdf->stream();
      //return view('backoffice.print-invoice',compact('tx'));

    }



	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        DB::table('packages')->where('shipment_id',$id)->update(['shipment_id'=>DB::raw('NULL')]);
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    } 


	    //By the way, you can still create your own method in here... :) 
	    public function getBulkUpdate(){
	    	$ids = $_POST['ids'];
	    	if(sizeof($ids)==0)
	    		return redirect(url('admin/shipments'));
	    	$action = $_POST['_bulkaction'];
	    	$packages = \DB::table('shipments')->whereIn('id',$ids);
	    	
	    	if($action=='transit'){
	    		$packages->update(['status'=>'transit']);
	    	}
	    	if($action=='delivered'){
	    		$packages->update(['status'=>'delivered']);
	    	}
	    	
	    	return redirect(url('admin/shipments'));
	    }
	    	    
		public function getDetail($id) {
			//Create an Auth
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			
			$data = [];
			$data['page_title'] = 'Shipment Details';
			$data['shipment'] = DB::table('shipments')->where('id',$id)->first();
			$data['packages'] = DB::table('packages')->where('shipment_id',$id)->get();
			
			//Please use cbView method instead view method from laravel
			$this->cbView('backoffice.shipments_detail',$data);
		}

		public function getIndex() {
			//First, Add an auth
			if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			
			//Create your own query 
			$data = [];
			$data['page_title'] = 'Shipments (repacked)';
			$data['shipments'] = Shipment::orderby('id','desc')->paginate(25);
				
			//Create a view. Please use `cbView` method instead of view method from laravel.
			$this->cbView('backoffice.shipments_overview',$data);
		}
		
		

    /**
    *
    */
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