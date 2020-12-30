<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use App\Models\Account;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;

class AdController extends Controller
{
	public function getIndex() {
		return view('home');
	}

	public function getProduct() {
		$brands = Brand::all();
		$products = Product::get();
		return view('product',compact('brands','products'));
	}
	public function getProductUpdate($id) {
		$brands = Brand::all();
		$product = Product::Where('product_id',$id)->first();
		return view('product-update',compact('brands','product'));
	}
	public function postProductUpdate($id, Request $request)
	{
		$product = Product::Where('product_id',$id)->first();
		$brand_id = $request->brand_id;
		$product_name = $request->productName;
		$price = $request->price;
		$description = $request->description;
		Product::where('product_id',$id)->update([
			'brand_id' => $brand_id,
			'product_name' => $product_name,
			'price' => $price,
			'description' => $description
		]);
		return redirect('/product');
	}

	public function cart($action=null, $id=null){
		switch ($action) {
			case 'add':
			if (session("cart.$id.number")){
				session(["cart.$id.number"=>session("cart.$id.number")+1]);
			}else{
				session(["cart.$id.number"=>1]);
			}
			return redirect('cart');
			break;

			case 'delete':
			session()->forget("cart.$id");
			return redirect('cart');
			break;
			case 'deleteall':
			session()->forget("cart");
			return redirect('cart');
			break;
			default:
			$productDetails = ProductDetail::Where('order_id',null)->get();
			if (session('cart')) {
				$pDs=ProductDetail::whereIn('iMei',array_keys(session('cart')))->get();
			}else{
				$pDs=$productDetails;
			}
			return view('cart',compact('productDetails','pDs'));
			break;
		} 
	}

	public function getOrder() {
		$accounts = Account::Where('role','<>','1')->get();
		$product = Product::get();
		$productDetails=ProductDetail::whereIn('iMei',array_keys(session('cart')))->get();
		return view('order',compact('accounts','productDetails'));
	}
	public function postOrder(Request $request)
	{
		$account_id=$request->account;
		$fullname=$request->fullname;
		$mobile=$request->mobile;
		$address=$request->address;
		$note=$request->note;
		$total=$request->total;
		Order::insert([
			'account_id'=>$account_id,
			'buyer_mobile'=>$mobile,
			'buyer_name'=>$fullname,
			'buyer_address'=>$address,
			'total'=>$total
		]);
		$order = Order::orderBy('order_id','desc')->first();
		$order_id = $order->order_id;
		foreach (array_keys(session('cart')) as $iMei):
				$productDetail = ProductDetail::where('iMei',$iMei)->first();
				$product_id = $productDetail->product_id;
				$product = Product::Where('product_id',$product_id)->first();
				$quantity = session("cart.$iMei.number");
				$price = $product->price;
				OrderDetail::insert([
					'order_id'=>$order_id,
					'product_id'=>$product_id,
					'quantity'=>$quantity,
					'price'=>$price
				]);
				ProductDetail::where('iMei',$iMei)->update(['order_id'=>$order_id]);
			endforeach;
			session()->forget("cart");
			return redirect('cart')->with('alert','success');
	}
}
