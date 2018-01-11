<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    
    public function getFullname(){
    	return $this->first_name.' '.$this->last_name;
    }
    
    public function packages(){
    	return \DB::table('packages')->where('customer_id',$this->id)->orderBy('created_at','desc')->get();
    }
    
    public function giftcards(){
    	return \DB::table('giftcards')->where('customer_id',$this->id)->orderBy('created_at','desc')->get();
    }

}
