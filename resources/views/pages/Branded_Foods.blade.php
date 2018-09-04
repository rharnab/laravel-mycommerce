@extends('welcome')

@section('content')

<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
		<?php $brands_image=DB::table('tbl_product')->where('status',1)->limit(3)->get() ?>
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				@foreach($brands_image as $image)
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="{{url($image->image)}}" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>{{$image->title}}</h4>
					<ol>
						<li>sunt in culpa qui officia</li>
						<li>commodo consequat</li>
						<li>sed do eiusmod tempor incididunt</li>
					</ol>
				</div>
				@endforeach
				
				
				<div class="clearfix"> </div>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid">
				<?php $all_popular=DB::table('tbl_product')->where('status',1)->inRandomOrder()->limit(4)->get() ?>
				<h3>Popular Brands</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>food</h6>
					@foreach($all_popular as $popular )
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="{{url('front/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="{{url($popular->image)}}" alt=" " class="img-responsive" /></a>
											<p>{{$popular->title}} (100 gm)</p>
											<h4>{{$popular->price}}<span>$5.00</span></h4>
										</div>
										<div class="snipcart-details">
											{{-- <form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="knorr instant soup" />
													<input type="hidden" name="amount" value="3.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form> --}}
											<a  href="{{url('single/'.$popular->id)}}"   class="btn btn-danger">Add to cart</a>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					@endforeach()
					<div class="clearfix"> </div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1">
		<?php $all_vegetables=DB::table('tbl_product')->where('status',1)->where('tags','vegetable')->inRandomOrder()->limit(4)->get() ?>		
					<h6>vegetables & fruits</h6>
					@foreach($all_vegetables as $vegetable)
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="{{url('front/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="{{url($vegetable->image)}}" alt=" " class="img-responsive" /></a>
											<p>{{$vegetable->title}}(palak)</p>
											<h4>{{$vegetable->price}} <span>$3.00</span></h4>
										</div>
										<div class="snipcart-details">
											{{-- <form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="fresh spinach" />
													<input type="hidden" name="amount" value="2.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form> --}}
											<a  href="{{url('single/'.$vegetable->id)}}"   class="btn btn-danger">Add to cart</a>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					@endforeach
					
					<div class="clearfix"> </div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1">
		<?php $all_beverages=DB::table('tbl_product')->where('status',1)->where('tags','soft drinks')->inRandomOrder()->limit(4)->get() ?>	
					<h6>beverages</h6>
					@foreach($all_beverages as $beverages)
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="{{url('front/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="{{url($beverages->image)}}" alt=" " class="img-responsive" /></a>
											<p>{{$beverages->title}}(1 ltr)</p>
											<h4>{{$beverages->price}} <span>$4.00</span></h4>
										</div>
										<div class="snipcart-details">
											{{-- <form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="mixed fruit juice" />
													<input type="hidden" name="amount" value="3.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form> --}}
											<a  href="{{url('single/'.$beverages->id)}}"   class="btn btn-danger">Add to cart</a>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					@endforeach
					
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

@endsection