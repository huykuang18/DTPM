<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipt';

    public function receipt_detail()
    {
    	return $this->hasMany('App\Models\ReceiptDetail','receipt_id','receipt_id');
    }
    public function account()
    {
    	return $this->belongsTo('App\Models\Account','account_id','account_id');
    }
}
