<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function shipment(){
        return $this->belongsTo('App\Shipment');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
