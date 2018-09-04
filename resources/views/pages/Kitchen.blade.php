@extends('welcome')
@section('content')
<div class="w3l_banner_nav_right">
	
			<div class="w3l_banner_nav_right_banner6">
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
					<h4>Utensils</h4>
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
				<div class="w3ls_w3l_banner_nav_right_grid_head">
					<?php $all_kitchen=DB::table('tbl_product')->where('cat_id',$cat_id)->where('status',1)->limit(3)->get() ?>
					<h6>Popular Categories</h6>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid_head_grids">
					@foreach($all_kitchen as $kitchen)
					<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
						<img src="{{url($kitchen->image)}}" alt=" " class="img-responsive" />
						<h4>{{($kitchen->title)}}</h4>
						<ul>
							<li><a href="bread.html">Raising rolls</a></li>
							<li><a href="bread.html">Butter Croissants</a></li>
							<li><a href="bread.html">wheat pita</a></li>
							<li><a href="bread.html">Hot dog roll</a></li>
						</ul>
					</div>
					@endforeach
					
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Popular Products</h3>
			<?php $all_kitchen=DB::table('tbl_product')->where('cat_id',$cat_id)->where('status',1)->limit(5)->get() ?>
			<div class="agile_top_brands_grids">
				@foreach($all_kitchen as $kitchen)
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"><img src="{{url('front/images/tag.png')}}" alt=" " class="img-responsive" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="single.html"><img title=" " alt=" " src="{{url($kitchen->image)}}" /></a>		
											<p>{{$kitchen->title}}</p>
											<h4>$7.99 <span>$10.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											{{-- <form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="fortune sunflower oil" />
													<input type="hidden" name="amount" value="7.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form> --}}
										<a  href="{{url('single/'.$kitchen->id)}}"   class="btn btn-danger">Add to cart</a>
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
<!-- //top-brands -->
@endsection