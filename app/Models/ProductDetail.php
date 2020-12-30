<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'productDetail';

    public function product()
	{
		return $this->belongsTo('App\Models\Product','product_id','product_id');
	}
}
