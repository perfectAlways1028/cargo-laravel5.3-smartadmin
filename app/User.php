<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'password', 'country', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
    
    public function orders() {
       // return $this->hasMany('App\Order','id', 'customer_id');
         return \DB::table('orders')->where('customer_id',$this->id)->orderBy('created_at','desc')->get();
    }
}