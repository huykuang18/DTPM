<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';

	public function brand(){
		return $this->belongsTo('App\Models\Brand','brand_id','brand_id');
	}

	public function order_detail(){
		return $this->belongsToMany('App\Models\OrderDetail','product_id','product_id');
	}

	public function receipt_detail(){
		return $this->belongsToMany('App\Models\ReceiptDetail','product_id','product_id');
	}

	public function product_detail()
	{
		return $this->hasOne('App\Models\ProductDetail','product_id','product_id');
	}

	public function feature_product()
    {
    	return $this->belongsTo('App\Models\FeatureProduct','product_id','product_id');
    }
}
