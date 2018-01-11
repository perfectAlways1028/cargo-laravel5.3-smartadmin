<?php

namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Order;
	use App\Package;
	use App\Customer;

	use Illuminate\Http\Request as iRequest;
	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Foundation\Validation\ValidatesRequests;

	class AdminOrdersController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "created_at, desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon_text";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "roopcom_cms.orders";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Link","name"=>"link"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			$this->col[] = ["label"=>"Notes","name"=>"notes"];
			$this->col[] = ["label"=>"Tracking (External)","name"=>"tracking_number"];
			$this->col[] = ["label"=>"Package","name"=>"package_id","join"=>"roopcom_cms.packages,id"];
			$this->col[] = ["label"=>"Customer Id","name"=>"customer_id","join"=>"roopcom_cms.customers,id"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => 'Please enter a valid URL',
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Link',
  'name' => 'link',
  'type' => 'text',
  'validation' => 'required|url',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => 'Pending;Priced;Awaiting Payment;Paid',
  'datatable' => NULL,
  'dataquery' => NULL,
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'parent_select' => NULL,
  'label' => 'Status',
  'name' => 'status',
  'type' => 'select',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Notes',
  'name' => 'notes',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Tracking Number (External)',
  'name' => 'tracking_number',
  'type' => 'text',
  'validation' => 'min:1|max:255',
  'width' => 'col-sm-10',
);
/*
			
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'packages,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Package Id',
  'name' => 'package_id',
  'type' => 'select2',
  'validation' => 'min:1|max:255',
  'width' => 'col-sm-10',
);*/
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
  'validation' => 'required|min:1|max:255',
  'width' => 'col-sm-10',
);
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
		 public function getOrdersList(iRequest $request){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    		    $contents = array();
    		$sql = "SELECT orders.*, CONCAT(customers.first_name,' ', customers.last_name) as customer_name FROM orders LEFT JOIN customers ON orders.customer_id=customers.id ORDER BY CASE status
			           WHEN 'Paid' THEN 1
			           WHEN 'Pending' THEN 2
			           WHEN 'Priced' THEN 3
			           WHEN 'Awaiting Payment' THEN 4
			           WHEN 'Accepted' THEN 5
			           ELSE 6
			         END";
			$orders = \DB::select($sql);
			//$orders = Order::get();

      		$result = \DB::table('cms_settings')->where('name','order_fixed_fee')->first();
      		$fixed_fee = $result->content;
      		$result = \DB::table('cms_settings')->where('name','order_fee_percentage')->first();
      		$percentage_fee = $result->content;
      		
		    if($request->isMethod('post')){
		    	$link = $request->input('link');
		    	$notes = $request->input('notes');
		    	$customer_id = $request->input('customer_id');
		    	$customer_name = explode(' ',$request->input('customer_name'));
		    	$price = $request->input('price');
		    	$fee = $request->input('fee');
		    	$tracking_number = $request->input('tracking_number');
		    	$real_price = $request->input('real_price');
		    	$freight_price = $request->input('freight_price');
		    	$fixed_fee = $request->input('fixed_fee');
		    	$status = $request->input('status');


		    	$errors = array();
		        if(isset($customer_id)){
		          $customer = Customer::find($customer_id);
		          if($customer===null){
		            $errors[] = 'Gebruiker met ID: '.$customerId.' niet gevonden.';
		           
		          }
		        }


		        if($customer===null && sizeof($customer_name)>=1){
		        	$fname = $customer_name[0];
		            array_shift($customer_name);
		        	$lname = implode(' ',$customer_name);
		        	
		        	$customer = Customer::where('first_name','like','%'.$fname.'%')
		        	->where('last_name','like','%'.$lname.'%')->first();
		        	if($customer===null)
		        	{
		   	           /* $customer = new Customer();
		            	$customer->first_name = $fname;
			            $customer->last_name = $lname;
			            $customer->save();*/

		            }
		          }
	          
		          if($customer===null){
		            $errors[] = 'Vul aub een naam of ID in.';
		          }

		    	if(!isset($link) || strlen($link) <1){
		    		 $errors[]='Vul een gebruikersnaam of link in.';         			
		    	}
		    	if(!isset($price) || strlen($price) <1){
		    		 $errors[]='Vul een gebruikersnaam of prijs in.';         			
		    	}
		    	if(!isset($fee) || strlen($fee) <1){
		    		 $errors[]= 'Vul een gebruikersnaam of honorarium in.';
          
		    	}
		    	if(!isset($tracking_number) || strlen($tracking_number) < 1) {
		    		$errors[]= 'Vul een gebruikersnaam of Volg Nummer in.';
          	   	}

		    	if(!isset($freight_price) || strlen($freight_price) < 1) {
		    		$errors[]= 'Vul een gebruikersnaam of freight prijs in.';
          	   	}
		        

          	   	if(sizeof($errors) > 0) {
					$order = new \stdClass();
					if($id) $order->id = $id;
					if($link) $order->link = $link;
					if($notes) $order->notes = $notes;
					if($price) $order->price = $price;
					if($customer_id) $order->customer_id = $customer_id;
					if($customer_name) $order->customer_name = $request->input('customer_name');
					if($freight_price) $order->freight_price = $freight_price;
					if($fee) $order->fee = $fee;
					if($tracking_number) $order->tracking_number = $tracking_number;
					if($real_price) $order->real_price = $real_price;
					if($fixed_fee) $order->fixed_fee = $fixed_fee;
					if($percentage_fee) $order->percentage_fee = $percentage_fee;
		    	
          	   		return view('backoffice.order-list', compact('page_title','errors', 'order', 'orders'));
          	   	}

		    	$order = new Order();
		    	$order->status = $status;
		    	$order->link = $link;
		    	$order->notes = $notes;
		    	$order->price = $price;
		    	$order->fee  = $fee; 
		    	$order->customer_id = $customer->id;
		    	$order->real_price =$real_price;
		    	$order->fixed_fee = $fixed_fee;
		    	$order->percentage_fee = $percentage_fee;
		    	$order->tracking_number = $tracking_number;   	
		    	$order->freight_price = $freight_price;
		    	if($status === 'Paid') {
		    		$order->paid_date = date('Y-m-d');
		    	}
		    	$order->save();
	    		$sql = "SELECT * FROM orders ORDER BY CASE status
				           WHEN 'Paid' THEN 1
				           WHEN 'Pending' THEN 2
				           WHEN 'Priced' THEN 3
				           WHEN 'Awaiting Payment' THEN 4
				           WHEN 'Accepted' THEN 5
				           ELSE 6
				         END";
				$orders = \DB::select($sql);
				$sql = "SELECT orders.*, CONCAT(customers.first_name,' ', customers.last_name) as customer_name FROM orders LEFT JOIN customers ON orders.customer_id=customers.id ORDER BY CASE status
			           WHEN 'Paid' THEN 1
			           WHEN 'Pending' THEN 2
			           WHEN 'Priced' THEN 3
			           WHEN 'Awaiting Payment' THEN 4
			           WHEN 'Accepted' THEN 5
			           ELSE 6
			         END";
	      		return redirect(route('admin-order-list'));   	

		    }
			$order = new \stdClass();
      		$order->fixed_fee = $fixed_fee;
      		$order->percentage_fee = $percentage_fee;
		    //$fixed_fee = 
		    if($order === null) {
		    	return redirect(route('admin-order-list'));
		    }
			    $page_title = 'Order';
			   

		    	return view('backoffice.order-list', compact('page_title','orders', 'order'));
  		}

  		 public function addOrder(iRequest $request){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			    $page_title = 'Order';
			    $orders = Order::get();

		    	return view('backoffice.order-list', compact('page_title','orders'));
  		}

  		public function setPaid(iRequest $request, $id) {
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    $order = Order::find($id);
		    if($order == null){
	    		return redirect(route('admin-order-list'));	
		    }
		    $order->status = 'Paid';
		    $order->paid_date = date('Y-m-d');
		    $order->save();
		    return redirect(route('admin-order-list'));
  		}

  		public function setOrdered(iRequest $request, $id) {
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    $order = Order::find($id);
		    if($order == null){
	    		return redirect(route('admin-order-list'));	
		    }
		    $order->status = 'Ordered';
		    $order->paid_date = date('Y-m-d');
		    $order->save();
		    return redirect(route('admin-order-list'));
  		}
  		
  		public function testCleanup(iRequest $request) {
		 	$orders = Order::get();
		 	foreach ($orders as $key => $order) {
		 		    	
		 		    	$startDate = strtotime($order.updated_at);
		 		    	$currentDate = time();
		 		    	if($currentDate - $startDate > 604800 ) {
		 		    		$order->delete();
		 		    	}

 		 		    }	
			return json_encode($orders);    

  		}

  		public function decline(iRequest $request, $id) {
  			if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    $order = Order::find($id);
		    if($order == null){
	    		return redirect(route('admin-order-list'));	
		    }
		    $order->status = 'Declined';
		    $order->save();
		    return redirect(route('admin-order-list'));
  		}

  		public function setPrice(iRequest $request, $id) {
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));

		    $contents = array();
      		$result = \DB::table('cms_settings')->where('name','order_fixed_fee')->first();
      		$fixed_fee = $result->content;
      		$result = \DB::table('cms_settings')->where('name','order_fee_percentage')->first();
      		$percentage_fee = $result->content;
      		
		    if($request->isMethod('post')){
		    	$price = $request->input('price');
		    	$fee = $request->input('fee');
		    	$tracking_number = $request->input('tracking_number');
		    	$real_price = $request->input('real_price');
		    	$freight_price = $request->input('freight_price');
		    	$fixed_price = $request->input('fixed_price');



		    	$errors = array();
		    	if(!isset($price) || sizeof($price) <1){
		    		 $errors[]='Vul een gebruikersnaam of prijs in.';         			
		    	}
		    	if(!isset($fee) || sizeof($fee) <1){
		    		 $errors[]= 'Vul een gebruikersnaam of honorarium in.';
          
		    	}
		    	if(!isset($tracking_number) || sizeof($tracking_number) < 1) {
		    		$errors[]= 'Vul een gebruikersnaam of Volg Nummer in.';
          	   	}

		    	if(!isset($freight_price) || sizeof($freight_price) < 1) {
		    		$errors[]= 'Vul een gebruikersnaam of freight prijs in.';
          	   	}

          	   	if(sizeof($errors) > 0) {
					$order = new \stdClass();
					if($id) $order->id = $id;
					if($price) $order->price = $price;
					if($freight_price) $order->freight_price = $freight_price;
					if($fee) $order->fee = $fee;
					if($tracking_number) $order->tracking_number = $tracking_number;
					if($real_price) $order->real_price = $real_price;
					if($fixed_fee) $order->fixed_fee = $fixed_fee;
					if($percentage_fee) $order->percentage_fee = $percentage_fee;
		    	
          	   		return view('backoffice.order-set-price', compact('page_title','errors', 'order'));
          	   	}

		    	$order = Order::find($id);
		    	if($order === null){
		    		return redirect(route('admin-order-list'));	
		    	}
		    	$order->status = 'Priced';
		    	$order->price = $price;
		    	$order->fee  = $fee; 
		    	$order->real_price =$real_price;
		    	$order->fixed_fee = $fixed_fee;
		    	$order->percentage_fee = $percentage_fee;
		    	$order->tracking_number = $tracking_number;   	
		    	$order->freight_price = $freight_price;
		    	$order->save();
		    	return redirect(route('admin-order-list'));

		    }
		    $order = Order::find($id);
		    $customer = $order->customer();
		    $page_title = 'Set price for ' .$order->package->tracking_number;


      		$order->fixed_fee = $fixed_fee;
      		$order->percentage_fee = $percentage_fee;
		    //$fixed_fee = 
		    if($order === null) {
		    	return redirect(route('admin-order-list'));
		    }
		    return view('backoffice.order-set-price', compact('page_title','order'));   	
  		}
	    public function getUpdateOrder(iRequest $request, $id){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
	      $order = Order::find($id);
	      if($order===null){
	        return redirect(url('admin/orders'));
	      }
	      $order->tracking_number = $request->input('tracking_number');
	      $order->save();
	      return redirect(route('admin-order-list'));
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
	        //Your code here

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


	}