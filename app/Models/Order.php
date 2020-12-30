<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function order_detail()
    {
    	return $this->hasMany('App\Models\OrderDetail','order_id','order_id');
    }
    public function account()
    {
    	return $this->belongsTo('App\Models\Account','account_id','account_id');
    }
}
