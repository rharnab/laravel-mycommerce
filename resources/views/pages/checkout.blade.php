@extends('welcome')
@section('content')
<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			<?php $content=Cart::content();
				
			?>
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span>3 Products</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
					@foreach($content as $v_content)	
					<tr class="rem1">
						<td class="invert">{{ $v_content->id}}</td>
						<td class="invert-image"><a href="single.html"><img src=" {{$v_content->options->image}}" alt=" " class="img-responsive"></a></td>
						<td class="invert">
						<div class="myform">
								<form action="{{url('/update-quentity')}}" method="POST">
									{{csrf_field()}}
								  <div class="form-group">
								   {{--  <label for="exampleInputEmail1"> update Product </label> --}}
								    <input type="text" name="qty" value="{{ $v_content->qty}}" style="width: 84px;">
								    <input type="hidden" name="row_id" value="{{$v_content->rowId}}">
								  </div>
								  
								  
								  <button type="submit" class="btn btn-primary">Update</button>
								</form>
							</div>
						</td>
						<td class="invert">{{ $v_content->name}}</td>
						
						<td class="invert">{{ $v_content->price}}</td>
						<td class="invert">
							<div class="rem">
								<!-- <div class="close1"> </div> -->
								<a href="{{('remove-product/'.$v_content->rowId)}}" class="close1"></a>
							</div>

						</td>
					</tr>
					
					@endforeach
				</tbody></table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					
					<ul>
						<li>totall product item <i>-</i> <span>{{Cart::count()}} </span></li>
						<li>totall product cost <i>-</i> <span>{{Cart::subtotal()}} </span></li>
						{{-- <li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li> --}}
						<li>Total Service Charges <i>-</i> <span>{{Cart::tax()}}</span></li>
						<li>Total <i>-</i> <span>{{Cart::total()}}</span></li>
					</ul>
					{{-- <a href="{{url('shipping-address')}}"><h4>Continue to basket</h4></a> --}}
					<a href="{{route('customer.login')}}"><h4>Continue to basket</h4></a>
				</div>
				
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>

@endsection