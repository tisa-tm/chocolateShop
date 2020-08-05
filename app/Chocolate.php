<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Chocolate extends Model
{
    protected $table = 'chocolates';
    protected $fillable = array('name','quantity','price','type','image'); 

    public function order(){
    	$this->belongsToMany(Order::class)->withPivot('quantity','price','type','name');
    }  

}
