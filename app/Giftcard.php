<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giftcard extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
