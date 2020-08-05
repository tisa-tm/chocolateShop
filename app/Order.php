<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = array('userId','amount');   

    public function chocolate(){
        return $this->hasMany(Chocolate::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
?>