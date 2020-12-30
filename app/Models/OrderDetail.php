<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = 'orderdetail';

	public function order()
	{
		return $this->belongsTo('App\Models\Order','order_id','order_id');
	}

	public function product()
	{
		return $this->belongsToMany('App\Models\Product','product_id','product_id');
	}
}
