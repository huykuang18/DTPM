@extends('master')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/orderdetail.css">
@section('title','Hóa đơn bán')
@section('content')
<?php
$total=0;?>
<section style="border: darkblue thin solid; padding:3%;">
	<form method="post">
		@csrf
		<table class="table table-bordered table-striped">
			<thead  style="background: #99bbff;">
				<tr>
					<th colspan="6"><h2>HÓA ĐƠN BÁN HÀNG</h2><br>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<table class="table table-striped">
						<tr>
							<td colspan="2" rowspan="" headers="">
								
								<table class="table table-sm">
									<thead style="background: #99bbff;">
										<tr>
											<th colspan="6">BLACKWOLF WATCH SHOP</th>
										</tr>
									</thead>
									<tr>
										<td>Điện thoại:</td>
										<th>0394366374</th>
									</tr>
									<tr>
										<td>Địa chỉ:</td>
										<th>63 Cầu Giấy, Hà Nội</th>
									</tr>
									<tr>
										<td>STK Vietcombank:</td>
										<th>0344458779451616</th>
									</tr>
									<tr>
										<td>Người lập hóa đơn: </td>
										<td>
											<select name="account">
												@foreach($accounts as $account)
												<option value="{{$account->account_id}}">{{{$account->fullname}}}</option>
												@endforeach
											</select>
										</td>
									</tr>
								</table>
							</td>
							<td colspan="2" rowspan="" headers="">
								
								<table class="table table-sm">
									<thead style="background: #99bbff;">
										<tr>
											<th colspan="6">Thông tin người mua</th>
										</tr>
									</thead>
									<tr>
										<td>Họ tên KH:</td>
										<th><input type="text" name="fullname" value="" placeholder="" required=""></th>
									</tr>
									<tr>
										<td>Điện thoại:</td>
										<th><input type="text" name="mobile" value="" placeholder="" required=""></th>
									</tr>
									<tr>
										<td>Địa chỉ:</td>
										<th><input type="text" name="address" value="" placeholder="" required=""></th>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</tr>
				<tr>
					<table class="table">
						<thead style="background: #99bbff;">
							<tr>
								<th colspan="6">Danh sách sản phẩm</th>
							</tr>
						</thead>
						<tr>
							<th>iMei</th>		
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
						</tr>
						@foreach($productDetails as $productDetail)
						<tr>
							<td>{{$productDetail->iMei}}</td>
							<td>{{$productDetail->product->product_name}}</td>
							<td>{{session("cart.$productDetail->iMei.number")}}</td>
							<td>{{$productDetail->product->price}}</td>
							<td>{{$productDetail->product->price*session("cart.$productDetail->iMei.number")}}</td>
						</tr>
						<?php
						$total = $total + $productDetail->product->price*session("cart.$productDetail->iMei.number")
						?>
						@endforeach

					</table>
					<table>
						<tr>
							<td colspan="2"><h3>Tổng tiền:</h3></td>
							<td><input type="text" name="total" value="{{$total}}" ></td>
						</tr>
					</table>
				</tr>
			</tbody>
		</table>
		<section class="form-group" style="text-align: center;">
			<input type="submit" value="Xác nhận" class="btn btn-success">
			&nbsp;&nbsp;
			<input type="reset"  value="Đặt lại" class="btn btn-warning">
		</section>
	</form>

</section>


@stop