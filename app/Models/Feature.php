<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'feature';

    public function feature_product()
    {
    	return $this->belongsTo('App\Models\FeatureProduct','feature_id','feature_id');
    }
}
