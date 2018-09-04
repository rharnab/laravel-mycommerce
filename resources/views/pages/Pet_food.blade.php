@extends('welcome')
@section('content')
<div class="w3l_banner_nav_right">
	<?php $all_fruits=DB::table('tbl_product')->where('cat_id',$cat_id)->where('status',1)->limit(4)->get() ?>
			<div class="w3l_banner_nav_right_banner5">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			
			<div class="w3l_banner_nav_right_banner3_btm">
				
				<?php $zoom_image=DB::table('tbl_product')->where('cat_id',$cat_id)->limit(3)->get() ?>
				@foreach($zoom_image as $single_image)
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="{{url($single_image->image)}}" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Fruits & Vegetables</h4>
					<ol>
						<li>{{$single_image->title}}</li>
						<li>commodo consequat</li>
						<li>sed do eiusmod tempor incididunt</li>
					</ol>
				</div>
				@endforeach
			
				
				
				<div class="clearfix"> </div>
			</div>
			
			
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">
				<h3 class="w3l_fruit">Fruits & Vegetables</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					
					
					
					<div class="clearfix"> </div>
				</div>
				
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					@foreach($all_fruits as $fruits)
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="{{url('front/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="{{url($fruits->image)}}" alt=" " class="img-responsive" /></a>
											<p>{{$fruits->title}} (1 kg)</p>
											<h4>{{$fruits->price}}<span>$7.00</span></h4>
										</div>
										<div class="snipcart-details">
											{{-- <form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="fresh basket onion" />
													<input type="hidden" name="amount" value="5.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form> --}}
											<a  href="{{url('single/'.$fruits->id)}}"   class="btn btn-danger">Add to cart</a>
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