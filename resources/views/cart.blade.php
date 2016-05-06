@extends('master')
 
@section('Digital shop', 'Page Title')
@section('content')
<div class="container">
	<div class="check-out">
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive">
	<table class="table-heading simpleCart_shelfItem">
		  @foreach($finalcart as $item)
		  <tr>
			<th class="table-grid">{{$item->image_id}}</th>
					
			<th>Prices</th>
			<th>Subtotal</th>
		  </tr>
		  <tr class="cart-header">

			<td class="ring-in"><a href="single.html" class="at-in"><img src={{url($item->path)}} class="img-responsive" alt=""></a>
			<div class="sed">
				<h5><a href="single.html">{{$item->title}}</a></h5>
				<p>{{$item->image_details}}</p>
			
			</div>
			<div class="clearfix"> </div>
			<a href="{{url('removeItem/'.$item->id)}}"<div class="close1"> </div></a></td>
			<td>${{$item->price}}</td>
		 @endforeach
<?php $item2 = 0; ?>
 @foreach($finalcart as $item)
		 <?php 
		   $item2 = $item2+$item->price; ?>
			 <td class="item_price">
				 ${{$item2}}</td>
		 @endforeach

		  </tr>
		 
		
 
	</table>
	</div>
	</div>
	<div class="produced">
	<a href="{{url('checkout/'.$item2)}}" class="hvr-skew-backward">Produced To Buy</a>
	 </div>
    </div>
</div>
@endsection