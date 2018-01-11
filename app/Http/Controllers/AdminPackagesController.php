<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Package;
	use App\Shipment;
	use App\Customer;
	use App\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\Excel;
	use Illuminate\Http\Request as iRequest;

	class AdminPackagesController extends \crocodicstudio\crudbooster\controllers\CBController {
	

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "customer_id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon_text";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "roopcom_cms.packages";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Klantcode","name"=>"customer_id"];
			$this->col[] = ["label"=>"Voornaam","name"=>"first_name"];
			$this->col[] = ["label"=>"Achternaam","name"=>"last_name"];
			$this->col[] = ["label"=>"Barcode","name"=>"barcode"];
			$this->col[] = ["label"=>"Tracking Number","name"=>"tracking_number"];
			$this->col[] = ["label"=>"Shipment Type","name"=>"shipment_type"];
			$this->col[] = ["label"=>"Week","name"=>"week"];
			$this->col[] = ["label"=>"Weight","name"=>"weight"];
			$this->col[] = ["label"=>"Location","name"=>"location"];
			$this->col[] = ["label"=>"Scanned","name"=>"created_at"];
			
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Tracking Number',
  'name' => 'tracking_number',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Barcode',
  'name' => 'barcode',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
$this->form[] = array ( 
  'dataenum' => array('sea','air','eco'),
  'style' => NULL,
  'help' => NULL,
  'label' => 'Type',
  'name' => 'shipment_type',
  'type' => 'select',
  'validation' => 'required',
  'width' => 'col-sm-10',
);

/*
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
  'validation' => 'required|min:1|max:255|numeric',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'First Name',
  'name' => 'first_name',
  'type' => 'text',
  'validation' => 'required|min:1|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Last Name',
  'name' => 'last_name',
  'type' => 'text',
  'validation' => 'required|min:1|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => date('W'),
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Week #',
  'name' => 'week',
  'type' => 'text',
  'validation' => 'required|min:1|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'warehouses,name',
  'label' => 'Warehouse Id',
  'name' => 'warehouse_id',
  'type' => 'select2',
  'validation' => 'required|min:1|max:255',
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
	        $this->addaction[] = [
	        	'label'=>'W',
	        	'url'=>CRUDBooster::mainpath('set-week/add/[id]'),
	        	'icon'=>'fa fa-plus',
	        	'color'=>'warning'
	        	//'showIf'=>''
	        ];
	        $this->addaction[] = [
	        	'label'=>'W',
	        	'url'=>CRUDBooster::mainpath('set-week/substract/[id]'),
	        	'icon'=>'fa fa-minus',
	        	'color'=>'warning'
	        	//'showIf'=>''
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
			$this->button_selected[] = ['label'=>'Week',
			'icon'=>'fa fa-plus',
			'name'=>'add_week'];
			$this->button_selected[] = ['label'=>'Week',
			'icon'=>'fa fa-minus',
			'name'=>'substract_week'];

	                
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
	    	$packages = DB::table('packages')->where('id',$id);
	    			if($type=='add'){
	    				$packages->update(['week'=>DB::raw('week+1')]);
	    			}
	    			if($type=='substract'){
	    				$packages->update(['week'=>DB::raw('week-1')]);
	    			}
   					CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Package with ID:".$id." updated","success");
	    }



	    
	    public function getScanPackage(iRequest $request){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			
	  $contents = array();
      $result = \DB::table('cms_settings')->where('name','inhoud_content')->first();
      if($result){
	      $contentStrs = explode(",", $result->content) ;

	      foreach ($contentStrs as $value) {
	      	$contents[] = ['value' => $value, 'text' => $value ];
	      }
	      $inhund_contents = json_encode($contents);
      }
      $week =  date('W');
        $page_title = 'Paketten scannen';
        if($request->isMethod('post')){
        
        $customerId = $request->input('customer_id');
        $customerName = explode(' ',$request->input('customer'));
        $tracking_number = $request->input('tracking_number');
        $parts = $request->input('parts');
        $location = $request->input('location');
        $weight = $request->input('weight');

        $errors = array();

        if(!isset($customerId) && sizeof($customerName)<=1){
        	if(sizeof($customerName) <= 1) {
        		$error[] = "Bitte geben Sie den vollständigen Namen ein. Beispiel: Roop Com.";
        	}else {
        		$errors[] = 'Vul een gebruikersnaam of ID in.';		
        	}
          

        }
        if(!isset($location)){
          $errors[] = 'Vul alstublieft de locatie in.';
        }
        if(!isset($weight)){
          $errors[] = 'Voer alstublieft gewicht in.';
        }
        if(isset($customerId)){
          $customer = Customer::find($customerId);
          if($customer===null){
            $errors[] = 'Gebruiker met ID: '.$customerId.' niet gevonden.';
           
          }
        }


        if($customer===null && sizeof($customerName)>=1){
        	$fname = $customerName[0];
            array_shift($customerName);
        	$lname = implode(' ',$customerName);
        	
        	$customer = Customer::where('first_name','like','%'.$fname.'%')
        	->where('last_name','like','%'.$lname.'%')->first();
        	if($customer===null)
        	{
   	            $customer = new Customer();
            	$customer->first_name = $fname;
	            $customer->last_name = $lname;
	            $customer->save();
            }
          }
          
          if($customer===null){
            $errors[] = 'Vul aub een naam of ID in.';
          }

          if(!isset($tracking_number)){
            $errors[] = 'Vul aub een tracking number in.';
            
          }

          $trackingPackage = Package::where('tracking_number',$tracking_number)->first();
          if(isset($tracking_number) && $trackingPackage){
            $errors[] ='Tracking Number: '.$tracking_number.' is al gescand.';
          }

          if(sizeof($errors) > 0) {
        	$package = new \stdClass();
			if($customerId) $package->customer_id = $request->input('customer_id');
			if($customerName) $package->customer_name = $request->input('customer');
			if($tracking_number) $package->tracking_number = $tracking_number;
			if($location) $package->location = $location;
			if($weight) $package->weight = $weight;
			if($parts) $package->parts = $parts;
           	return view('backoffice.scan', compact('page_title','errors','inhund_contents', 'package', 'week'));
          }

          if($package===null){
            $package = new Package();
            $package->barcode = $this->generateBarcode();
            $package->first_name = $customer->first_name;
            $package->last_name = $customer->last_name;
            $package->warehouse_id = 1;
            $package->employee_id = CRUDBooster::myId();
            $package->tracking_number = $tracking_number;
            $package->customer_id = $customer->id;
            $package->shipment_type = $request->input('shipping_type');
            $package->location = $location;
            $package->weight = round($weight, 2);
            $package->week = date('W');
            $package->parts = $parts;
            $package->save();

            $package->fullname = $customer->first_name. " ". $customer->last_name;
            //Check if any orders have been made with this tracking_number
            \DB::table('orders')
            	->where('status','Ordered')
            	->where('tracking_number',$package->tracking_number)
            	->update(['package_id'=>$package->id, 'status'=>'Accepted']);
            }
            $json_package = json_encode($package);
  		   	return view('backoffice.scan', compact('page_title', 'inhund_contents','week','json_package'));
            //return redirect(route('admin-scan-packages'));   
        
      }

      return view('backoffice.scan', compact('page_title', 'inhund_contents','week'));
    }
    
    public function delete(iRequest $request) {
    	$id = $request->get('id');
    	\DB::table('packages')->where('id',$id)->delete();	

      $contents = array();
      $result = \DB::table('cms_settings')->where('name','inhoud_content')->first();
      if($result){
	      $contentStrs = explode(",", $result->content) ;

	      foreach ($contentStrs as $value) {
	      	$contents[] = ['value' => $value, 'text' => $value ];
	      }
	      $inhund_contents = json_encode($contents);
      }
      $week =  date('W');
      	return view('backoffice.scan', compact('page_title', 'inhund_contents','week'));
    }
    //auto fill location
    public function customerLocationComplete(iRequest $request) {
    	$customerName  =  explode(' ',$request->input('customer_name'));
    	$customerId = $request->get('customer_id');
    	$week = date('W');
    	$data = array();
        if(!isset($customerId) && sizeof($customerName)<=1){
        	$data["location"] = "";
        	$data["valid"] = "0";

	         return response()->json($data);
        }

		if(isset($customerName)&& sizeof($customerName)>1) {
			$fname = $customerName[0];
            array_shift($customerName);
        	$lname = implode(' ',$customerName);
        	
        	$customer = Customer::where('first_name','like','%'.$fname.'%')
        	->where('last_name','like','%'.$lname.'%')->first();
        	if($customer){
        		$customerId = $customer->id;
        	}
        }
        if($customerId) {
        	$package = \DB::table('packages')
        					->where('customer_id', $customerId)
        					->where('week', $week)->first();
        	if($package !== null) {
        		$data["location"] = $package->location;
        		$data["valid"] = "1";
        	}else {
              	$data["location"] = "";
        		$data["valid"] = "0";
        	}
        } else {
          	$data["location"] = "";
      		$data["valid"] = "0";
        }

         return response()->json($data);

    }


    //auto complete
    public function customerAutoComplete(iRequest $request)
    {
        $term = $request->get('term');
		 $data = \DB::table('customers')
            	->where('first_name','LIKE','%'.$term.'%')
            	->orWhere('last_name', 'LIKE', '%'.$term.'%')
            	->get();
      	$source= array();
        foreach ($data as $key => $v){
        	$source[]= ['value' =>$v->first_name." ".$v->last_name, 'label' =>$v->first_name." ".$v->last_name];
        }
        return response()->json($source);
	}
    public function getJsonPackages(iRequest $request){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
	    $week = $request->get('week');
        $packages = Package::orderBy('id', 'desc')->where('shipment_id','=',null)->whereWeek($week)->get();
        foreach($packages as $package){
          $package->fullname = $package->first_name.' '.$package->last_name;
          $package->country = $package->customer->country;
        }
        return response()->json($packages);
    }
    
    public function autoRepack(iRequest $request) {
    		$week = $request->get('week');
    	    //$week = date('W');
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
                if($shiptype === 'sea')
                	continue;
                $customer_id = $package_group->customer_id;
                $customer = Customer::find($customer_id);
                $package_rows = \DB::table('packages')
                    ->where('shipment_id','=',null)
                    ->where('customer_id','=',$customer_id)
                    ->where('shipment_type',$shiptype)
                    ->where('week',$week)->get();


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
                $weight = 0;
                $height = 0;
                $depth = 0;
                $extrafee = 0;

                foreach ($package_rows as $key => $package) {
                	$weight += $package->weight;


                }
               	$weight = ceil($weight);
                $parts = 1;
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
                      
                $packages->update(['shipment_id'=>$shipment->id, 'status' => 'shipped']);

             

            }
   	 		 return redirect(route('admin-scan-packages'));
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

    public function getUpdateShipmentType(iRequest $request){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
		$package = \DB::table('packages')->whereId($request->get('id'));
		
		if($package!=null){
			$package->update([
				'shipment_type'=>$request->get('type'),
				'tracking_number' => $request->get('tracking_number'),
				'barcode'=>$request->get('barcode'),
				'content'=>$request->get('content'),
				'parts' =>$request->get('parts'),
				'weight'=>$request->get('weight'),
				'location'=>$request->get('location')
			]);    		
		}
    	
    }

    public function generateBarcode(){
      $next = \DB::table('packages')->max('id');
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
    
    public function getSettings(iRequest $request){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			
      $page_title = 'Instellingen';
      $settings_group = 'shipping settings';
      return View('backoffice.settings',compact('page_title', 'settings_group'));
    }

    public function getSettingsSave(iRequest $request){
	    if(CRUDBooster::myId()===null) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			
      $settings_group = 'shipping settings';
      $setting = DB::table('cms_settings')->where('group_setting',$settings_group)->get();
  		foreach($setting as $set) {

  			$name = $set->name;

  			$content = Request::get($set->name);

  			if (Request::hasFile($name))
  			{

  				if($set->content_input_type == 'upload_image') {
  					CRUDBooster::valid([ $name => 'image|max:10000' ],'view');
  				}else{
  					CRUDBooster::valid([ $name => 'mimes:doc,docx,xls,xlsx,ppt,pptx,pdf,zip,rar|max:20000' ], 'view');
  				}


  				$file = Request::file($name);
  				$ext  = $file->getClientOriginalExtension();

  				//Create Directory Monthly
  				Storage::makeDirectory(date('Y-m'));

  				//Move file to storage
  				$filename = md5(str_random(5)).'.'.$ext;
  				if($file->move(storage_path('app'.DIRECTORY_SEPARATOR.date('Y-m')),$filename)) {
  					$content = 'uploads/'.date('Y-m').'/'.$filename;
  				}
  			}


  			DB::table('cms_settings')->where('name',$set->name)->update(['content'=>$content]);

  			Cache::forget('setting_'.$set->name);
  		}
  		return redirect()->back()->with(['message'=>'Your settings have been saved !','message_type'=>'success']);
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
	        $packages = DB::table('packages')->whereIn('id',$id_selected);
	        if($button_name == 'add_week') {
	        	$packages->update(['week'=>DB::raw('week+1')]);	
  			}
  			if($button_name == 'substract_week') {
	        	$packages->update(['week'=>DB::raw('week-1')]);
  			}
  			
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
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	       \DB::table('transactions')->where('shipment_id',$id)->delete();
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

	}