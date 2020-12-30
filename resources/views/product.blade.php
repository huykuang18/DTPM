@extends('master')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/orderdetail.css">
@section('title','Sản phẩm')
@section('content')
<hr>
<table class="table table-bordered table-striped mb-0">
	<thead>
		<tr>
			<th colspan="6"><h2>DANH SÁCH SẢN PHẨM</h2><br>
			</th>
		</tr>
		<tr>
			<!-- <th style="text-align: center;"  >Ảnh</th> -->
			<th>Sản phẩm</th>
			<th>Giá</th>
			<th>Hãng</th>
			<th>Thao tác</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<!-- <td style="text-align: center;" ><img style="width: 40% " src="{{asset('/images/'.$product->image)}}" alt=""></td> -->
			<td>{{$product->product_name}}</td>
			<td>{{number_format($product->price)}}</td>
			<td>{{$product->brand->brand_name}}</td>
			<td>
				<a href="{{asset('product-'.$product->product_id)}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
		@endforeach
		<tr>

		</tr>
	</tbody>
</table>
@endsection