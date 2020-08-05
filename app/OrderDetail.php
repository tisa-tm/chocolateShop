<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = 'orderdetails';
    // protected $fillable = array('orderId','chocolateId'); 
    public function chocolate(){
        return $this->hasOne(Chocolate::class);
    }

    public function user(){
    	return $this->hasOne(Order::class);
    }
}
