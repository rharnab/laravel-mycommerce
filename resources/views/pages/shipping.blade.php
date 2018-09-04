@extends('welcome')
@section('content')
<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			
	      
			<div class="checkout-left">	
				
				<div class="col-md-12 address_form_agile">
					  <h4>Shipping Details</h4>
				<form action="{{route('save.shipping')}}" method="post" class="creditly-card-form agileinfo_form">
					{{csrf_field()}}
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												@foreach($errors->get('name') as $message) {{ $message}} @endforeach
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
												</div>
												<div class="w3_agileits_card_number_grids">
													@foreach($errors->get('phone') as $message) {{ $message}} @endforeach
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Phone number:</label>
														    <input class="form-control" name="phone" type="text" placeholder="Mobile number">
														</div>
													</div>
													
													<div class="clear"> </div>
												</div>
												@foreach($errors->get('address') as $message) {{ $message}} @endforeach
												<div class="controls">
													<label class="control-label">Address </label>
												 <input class="form-control" name="address" type="text" placeholder="Town/City">
												</div>
							
													<div class="controls">
															<label class="control-label">Address type: </label>
												     <select class="form-control option-w3ls" name="type">
																							<option value="office">Office</option>
																							<option value="home">Home</option>
																							<option value="commercial">Commercial</option>
							
																					</select>
													</div>
											</div>
											<button class="submit check_out">Delivery to this Address</button>
										</div>
									</section>
								</form>
									<div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
				
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>

@endsection