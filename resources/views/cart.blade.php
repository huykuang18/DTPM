@extends('master')
<link rel="stylesheet" href="/css/app.css">
<style>
  .vertical-menu {
    width: 200px;
    height: 45px;
    overflow-y: auto;
  }

  .vertical-menu a {
    background-color: white;
    color: black;
    display: block;
    padding: 10px;
    text-decoration: none;
  }

  .vertical-menu a:hover {
    background-color: #e8faec;
  }

  .vertical-menu a.active {
    background-color: #4CAF50;
    color: white;
  }
</style>
@section('title','Giỏ hàng')
@section('content')
@if(session('alert'))
<script>
  alert("Lưu hóa đơn thành công!");
  location = '/cart';
</script>
@endif
<hr>
<table>
  <tr>
    <th>Chọn sản phẩm:</th>
    <td>
      <div class="vertical-menu">
        @foreach($productDetails as $productDetail)
        <a href="{{url('cart/add/'.$productDetail->iMei)}}">{{$productDetail->iMei}}</a>
        @endforeach
      </div>
    </tr>
  </table>
  <hr>
  @if(session('cart'))
  <?php
  $total=0;
  ?>
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
    @foreach($pDs as $productDetail)
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
    <tr>
      <td>
        <a onclick="return confirm('Bạn muốn hủy bỏ?')" href="{{url('cart/deleteall')}}" class="btn btn-danger">Hủy bỏ</a>
      </td>
      <td><a href="{{asset('order')}}" class="btn btn-success">Xác nhận</a></td>
      <td></td>
      <td><h3>Tổng tiền:&nbsp;&nbsp;</h3></td>
      <td>{{$total}}</td>
    </tr>
  </table>

  <!--================End Cart Area =================-->
  @else
  <section class="alert alert-danger" style="text-align: center; margin:10%;"><b>Nothing</b></section>
  @endif
  @endsection