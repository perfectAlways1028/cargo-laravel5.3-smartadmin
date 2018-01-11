<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Package;
use App\Shipment;
use App\Transaction;
use App\Customer;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
#use Illuminate\Foundation\Auth\Access\AuthorizesRequests
use CRUDBooster;

class BackofficeController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    #use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request, Redirector $redirect){
    }




}
