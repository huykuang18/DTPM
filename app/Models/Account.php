<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $table = 'account';
	public function order(){
		return $this->hasMany('App\Models\Order','account_id','account_id');
	}
	public function receipt(){
		return $this->hasMany('App\Models\Order','account_id','account_id');
	}
}
