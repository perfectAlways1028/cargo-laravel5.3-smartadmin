<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public function packages(){
        return $this->hasMany('App\Package');
    }

    public function transaction(){
        return $this->hasOne('App\Transaction');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
