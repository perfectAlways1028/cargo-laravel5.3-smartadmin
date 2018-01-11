<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function package(){
        return $this->belongsTo('App\Package');
    }
}
