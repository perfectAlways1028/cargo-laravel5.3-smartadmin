<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Product;
	use App\Transaction;
	use App\Customer;
	use Illuminate\Http\Request as iRequest;
	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Foundation\Validation\ValidatesRequests;
	class AdminProductsController extends \crocodicstudio\crudbooster\controllers\CBController {
    use DispatchesJobs, ValidatesRequests;
	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "title";
			$this->limit = "20";
			$this->orderby = "created_at,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon_text";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "products";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Image","name"=>"image","image"=>true];
			$this->col[] = ["label"=>"Title","name"=>"title"];
			$this->col[] = ["label"=>"Stock","name"=>"stock"];
			$this->col[] = ["label"=>"Buy Price","name"=>"buy_price"];
			$this->col[] = ["label"=>"Price","name"=>"price"];
			$this->col[] = ["label"=>"In Webshop?","name"=>"webshop"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Image','name'=>'image','type'=>'upload','validation'=>'required|image|max:3000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Title','name'=>'title','type'=>'text','validation'=>'required|min:3|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Buy Price','name'=>'buy_price','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Price','name'=>'price','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Description','name'=>'description','type'=>'wysiwyg','validation'=>'required|min:3','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Stock','name'=>'stock','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Visible in webshop?','name'=>'webshop','type'=>'select','width'=>'col-sm-10','dataenum'=>'1|Yes;0|No'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Image','name'=>'image','type'=>'upload','validation'=>'required|image|max:3000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Title','name'=>'title','type'=>'text','validation'=>'required|min:3|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Buy Price','name'=>'buy_price','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Price','name'=>'price','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Description','name'=>'description','type'=>'wysiwyg','validation'=>'required|min:3','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Stock','name'=>'stock','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Visible in webshop?','name'=>'webshop','type'=>'select','width'=>'col-sm-10','dataenum'=>'1;0'];
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
	       	$this->addaction[] = [
	        	'label'=>'Create Invoice',
	        	'url'=>CRUDBooster::mainpath('create-invoice/[id]'),
	        	'color'=>'success',
	        	'showIf'=>'[stock] > 0'
	        ];
	        $this->addaction[] = [
	        	'label'=>'Stock',
	        	'url'=>CRUDBooster::mainpath('set-stock/add/[id]'),
	        	'icon'=>'fa fa-plus',
	        	'color'=>'warning'
	        ];
	        $this->addaction[] = [
	        	'label'=>'Stock',
	        	'url'=>CRUDBooster::mainpath('set-stock/substract/[id]'),
	        	'icon'=>'fa fa-minus',
	        	'color'=>'warning',
	        	'showIf'=>'[stock] > 0'
	        ];


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
	    
	    public function getSetStock($type,$id){
	    	if(CRUDBooster::isUpdate()){
	    	$packages = DB::table('products')->where('id',$id);
	    			if($type=='add'){
	    				$packages->update(['stock'=>DB::raw('stock+1')]);
	    			}
	    			if($type=='substract'){
	    				$packages->where('stock','>',0)->update(['stock'=>DB::raw('stock-1')]);
	    			}
   					CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Product with ID:".$id." updated","success");
   					} else {
   					CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"You do not have the authority to update this product","danger");
   					}
	    }

	    public function getCreateInvoice(iRequest $request,$id) {
			  if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			      $product = Product::find($id);
			      $page_title='Create invoice';
			      if($product===null){
			        return redirect(url('admin/products'));
			      }
			      $settings_group = 'shipping settings';
			      $rates['srd'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','us_su_rate')->first();
			      $rates['eur'] = \DB::table('cms_settings')->where('group_setting',$settings_group)->where('name','us_nl_rate')->first();

			      if($request->isMethod('post')){
		    	 	  $customer_id = $request->input('customer_id');
		    	      $customer_name = explode(' ',$request->input('customer'));
		    	      $additional_fee = $request->input('additional_fee');
			      	  $product_count = $request->input('product_count');
			      	  $comment = $request->input('comment');
				      if(isset($customer_id)){
			         	 $customer = Customer::find($customer_id);
			         	 if($customer===null){
			         	   $errors[] = 'Gebruiker met ID: '.$customerId.' niet gevonden.';
			           
			         	 }
			          }	


			          if($customer===null && sizeof($customer_name)>1){

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
					  if(sizeof($errors) > 0) {
							if($comment) $product->comment = $comment;
							if($customer_id) $product->customer_id = $customer_id;
							if($customer_name) $product->customer_name = $request->input('customer_name');
							if($additional_fee) $product->additional_fee = $additional_fee;		    	
		          	   		return view('backoffice.product-create-invoice', compact('page_title','errors', 'product', 'rates'));
	          	      }
			          $this->validate($request, [
			              'srd' => 'required|numeric',
			              'usd' => 'required|numeric',
			              'eur' => 'required|numeric',
			          ]);
			          if(!$comment)
			          	$comment = "";
			          //Create transaction
			          $tx = new Transaction();
			          $tx->customer_id = $customer->id;
			          $tx->product_id = $product->id;
			          $tx->comment = $comment;
			          $tx->invoice_number = $this->generateTransactionNumber();
			          $tx->srd = $request->input('srd');
			          $tx->usd = $request->input('usd');
			          $tx->eur = $request->input('eur');
			          $tx->total = round($product->price * $product_count,2);
			          $paid = round(
			          	$tx->usd + 
			          	($tx->srd * (1/$rates['srd']->content)) + 
			          	($tx->eur * (1/$rates['eur']->content))
			          	,2);
			          $tx->paid = $paid;
			          $tx->change = round(($paid - $tx->total)*-1,2);
			          $tx->signature = $request->get('signature');
			          $tx->save();
			          //Update shipment
			          $packages = DB::table('products')->where('id',$id);
			          $packages->where('stock','>',0)->update(['stock'=>DB::raw('stock-1')]);

			      	   //$pdf = \PDF::loadView('backoffice.product-print-invoice',compact('tx'));
			      	   //return $pdf->stream();
			           //echo '<script>window.open('.route('admin-product-print-invoice',['id'=>$tx->id]).');</script>';
			           //return \Redirect::away(route('admin-product-print-invoice',['id'=>$tx->id]));
	  	 	           return redirect(url('admin/products'));         
     			 }
     		 return view('backoffice.product-create-invoice', compact('page_title','product','rates'));
	    }


	    public function getPrintInvoice(iRequest $request, $id){
		    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
	      $tx = Transaction::find($id);
	      if($tx===null){
	        return redirect(url('admin/products'));
	      }
	      $pdf = \PDF::loadView('backoffice.product-print-invoice',compact('tx'));
	      return $pdf->stream();
	      //return view('backoffice.print-invoice',compact('tx'));

	    }

	    public function getInvoiceList(iRequest $request) {
	        if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
	        $page_title = "Product Invoice List";
	        $transactions = Transaction::where("product_id",">", 0)->orderBy('id','DESC')->get();
	         return view('backoffice.product-invoice-list', compact('page_title','transactions'));
	    }

	    public function generateTransactionNumber(){
	      $next = \DB::table('transactions')->max('id');
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
	        $postdata['employee_id'] = CRUDBooster::myId();
	        $postdata['price']= str_replace(',','.',$postdata['price']);
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