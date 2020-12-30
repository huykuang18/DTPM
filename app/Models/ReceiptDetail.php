<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
	protected $table = 'receiptdetail';

	public function receipt()
	{
		return $this->belongsTo('App\Models\Receipt','receipt_id','receipt_id');
	}

	public function product()
	{
		return $this->belongsToMany('App\Models\Product','product_id','product_id');
	}
}
