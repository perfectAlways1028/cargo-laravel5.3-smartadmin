<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Giftcard;
	use App\Provider;
	use App\Customer;

	use Illuminate\Http\Request as iRequest;
	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Foundation\Validation\ValidatesRequests;

	class AdminGiftcardsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "created_at,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "giftcards";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Customer Id","name"=>"customer_id","join"=>"roopcom_cms.customers,id"];
			$this->col[] = ["label"=>"Value","name"=>"value"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Value','name'=>'value','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Code','name'=>'code','type'=>'text','validation'=>'required|min:3|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Customer Id','name'=>'customer_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = array (
			//'help' => NULL,
			//'style' => NULL,
			//'placeholder' => NULL,
			//'readonly' => NULL,
			//'disabled' => NULL,
			//'label' => 'Value',
			//'name' => 'value',
			//'type' => 'money',
			//'validation' => 'required|min:1|max:255',
			//'width' => 'col-sm-10',
			//);
			//$this->form[] = array (
			//'label' => 'Code',
			//'name' => 'code',
			//'type' => 'text',
			//'validation' => 'required|min:3|max:255',
			//'width' => 'col-sm-10',
			//);
			//$this->form[] = array (
			//'style' => NULL,
			//'help' => 'File types support : JPG, JPEG, PNG, GIF, BMP',
			//'placeholder' => NULL,
			//'readonly' => NULL,
			//'disabled' => NULL,
			//'label' => 'Photo',
			//'name' => 'photo',
			//'type' => 'upload',
			//'validation' => 'required|image|max:3000',
			//'width' => 'col-sm-10',
			//);
			//$this->form[] = array (
			//'dataenum' => NULL,
			//'datatable' => 'customers,id',
			//'style' => NULL,
			//'help' => NULL,
			//'datatable_where' => NULL,
			//'datatable_format' => NULL,
			//'datatable_exception' => NULL,
			//'label' => 'Customer Id',
			//'name' => 'customer_id',
			//'type' => 'select2',
			//'validation' => 'required|min:1|max:255',
			//'width' => 'col-sm-10',
			//);
			# OLD END FORM

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

		 public function getGiftcardsList(iRequest $request){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			    $page_title = 'Giftcards';
			    $sql = "SELECT giftcards.*, CONCAT(customers.first_name,' ', customers.last_name) as customer_name FROM giftcards LEFT JOIN customers ON giftcards.customer_id=customers.id ORDER BY CASE status
			           WHEN 'paid' THEN 1
			           WHEN 'pending' THEN 2
			           WHEN 'delivered' THEN 3
			           ELSE 4
			         END";
			    $giftcards = \DB::select($sql);
       			$providers = Provider::get();

       			if($request->isMethod('post')){
       				$value = $request->input('value');
       				$cost = $request->input('cost');
       				$code = $request->input('code');
       				$status = $request->input('status');
			    	$providerData = $request->input('provider');
			    	$provider = json_decode($providerData);
			    	$provider_id = $provider->id;
			    	$customer_id = $request->input('customer_id');
			    	$customer_name = explode(' ',$request->input('customer_name'));

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
			   	            /*$customer = new Customer();
			            	$customer->first_name = $fname;
				            $customer->last_name = $lname;
				            $customer->save();*/

			            }
			          }
		          

		          if($customer===null){
		            $errors[] = 'Vul aub een naam of ID in.';
		          }
            	   	if(sizeof($errors) > 0) {
						$giftcard = new \stdClass();
						if($value) $giftcard->value = $value;
						if($provider) $giftcard->provider = $provider;	   
						if($status) $giftcard->status = $status;	
						if($customer_id) $giftcard->customer_id = $customer_id;
						if($customer_name) $giftcard->customer_name = $request->input('customer_name');
	          	   		return view('backoffice.giftcard-list', compact('page_title','errors', 'giftcard', 'giftcards','providers'));
	          	   	}

	             	$giftcard = new Giftcard();
			    	$giftcard->value = $value;
			    	$giftcard->cost = $cost;
			    	$giftcard->provider_id = $provider_id;
			    	$giftcard->customer_id = $customer->id;
			    	$giftcard->code = $code;
			    	$giftcard->status = $status;
			    	if($status === 'paid' || $status === 'delivered') {
			    		$giftcard->paid_date = date('Y-m-d');
			    	}
			    	$giftcard->save();
			   		$sql = "SELECT giftcards.*, CONCAT(customers.first_name,' ', customers.last_name) as customer_name FROM giftcards LEFT JOIN customers ON giftcards.customer_id=customers.id ORDER BY CASE status
			           WHEN 'paid' THEN 1
			           WHEN 'pending' THEN 2
			           WHEN 'delivered' THEN 3
			           ELSE 4
			         END";
			    	$giftcards = \DB::select($sql);
			    	return redirect(route('admin-giftcard-list'));  	
       			}


		    	return view('backoffice.giftcard-list', compact('page_title','giftcards', 'providers'));
  		}

  		public function setPaid(iRequest $request, $id) {
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    $giftcard = Giftcard::find($id);
		    if($giftcard == null){
	    		return redirect(route('admin-giftcard-list'));	
		    }
		    $giftcard->status = 'paid';
		    $giftcard->paid_date = date('Y-m-d');
		    $giftcard->save();
		    return redirect(route('admin-giftcard-list'));
  		}

  		public function setDelivered(iRequest $request, $id) {
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    $giftcard = Giftcard::find($id);
		    if($giftcard == null){
	    		return redirect(route('admin-giftcard-list'));	
		    }
		    $giftcard->status = 'delivered';
		    $giftcard->save();
		    return redirect(route('admin-giftcard-list'));
  		}
	    public function getJsonGiftcards(iRequest $request){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		    if(CRUDBooster::isUpdate()){
				$sql = "SELECT giftcards.*, CONCAT(customers.first_name,' ', customers.last_name) as customer_name FROM giftcards LEFT JOIN customers ON giftcards.customer_id=customers.id ORDER BY CASE status
			           WHEN 'paid' THEN 1
			           WHEN 'pending' THEN 2
			           WHEN 'delivered' THEN 3
			           ELSE 4
			         END";
			    	$giftcards = \DB::select($sql);

			}else{
				$sql = "SELECT giftcards.*, CONCAT(customers.first_name,' ', customers.last_name) as customer_name FROM giftcards LEFT JOIN customers ON giftcards.customer_id=customers.id WHERE status <> 'paid' ORDER BY CASE status
			           WHEN 'paid' THEN 1
			           WHEN 'pending' THEN 2
			           WHEN 'delivered' THEN 3
			           ELSE 4
			         END";
			    	$giftcards = \DB::select($sql);

			}
	        return response()->json($giftcards);
		
	    }
	    
	    public function updateGiftcard(iRequest $request){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			$giftcard = \DB::table('giftcards')->whereId($request->get('id'));
			
			$status = $request->get('status');
			if($status === "paid"){
				$date = date('Y-m-d');

				if($giftcard!=null){
					$giftcard->update([
						'status'=>$request->get('status'),
						'code'=>$request->get('code'),
						'paid_date'=> $date
					]);    		
				}
			}else{
				if($giftcard!=null){
					$giftcard->update([
						'status'=>$request->get('status'),
						'code'=>$request->get('code')
					]);    		
				}
			}
			

	    	
	    }

	    public function delete(iRequest $request) {
	    	$id = $request->get('id');
	    	\DB::table('giftcards')->where('id',$id)->delete();	
	 		return redirect(route('admin-giftcard-list'));
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