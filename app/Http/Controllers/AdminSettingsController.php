<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\Excel;
use Illuminate\Routing\Redirector;
use CRUDBooster;

class AdminSettingsController extends BaseController
{
    #use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(Request $request, Redirector $redirect){
    }

    public function indexAction(Request $request){
      $page_title = 'Instellingen';
      $settings_group = 'shipping settings';
      return View('backoffice.settings',compact('page_title', 'settings_group'));
    }

    public function saveSettings(Request $request){
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
}
