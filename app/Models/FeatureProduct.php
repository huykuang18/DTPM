<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureProduct extends Model
{
    protected $table = 'feature_product';

    public function product()
    {
    	return $this->hasMany('App\Models\Product','product_id','product_id');
    }

    public function feature()
    {
    	return $this->hasMany('App\Models\Feature','feature_id','feature_id');
    }
}
