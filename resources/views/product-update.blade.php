@extends('master')
<link rel="stylesheet" href="/css/app.css">
@section('title','Cập nhật sản phẩm')
@section('content')
<form method="post" enctype="multipart/form-data">
	@csrf
	<table class="table table-bordered table-striped mb-0">
		<thead>
			<tr>
				<th colspan="6"><h2>CHI TIẾT SẢN PHẨM</h2><br>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Mã sản phẩm:</td>
				<td>{{$product->product_id}}</td>
			</tr>
			<tr>
				<td>Hãng: </td>
				<td>
					<select name="brand_id">
						@foreach($brands as $brand)
						<option value="{{$brand->brand_id}}"<?=$brand->brand_id!=$product->brand_id?:'selected'?>>{{$brand->brand_name}}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>Tên sản phẩm:</td>
				<td><input name="productName" type="text" value="{{$product->product_name}}" class="form-control" required=""></td>
			</tr>
			<tr>
				<td>Giá sản phẩm:</td>
				<td><input name="price" type="number" value="{{$product->price}}" class="form-control" required="">
				</td>
			</tr>
			<tr>
				<td>Mô tả:</td>
				<td>
					<textarea name="description" class="form-control" rows="15">{{$product->description}}</textarea>
					<script>CKEDITOR.replace('description');</script>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="submit" class="btn btn-success">
					&nbsp;
					<input type="reset" class="btn btn-warning"></td>
				</tr>
			</tbody>	
		</table>
	</form>
	@endsection