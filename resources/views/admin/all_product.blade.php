@extends('deshboard_layouts')

@section('content')
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>

					<p class=" alert-success">
						<?php
					$message=Session::get('message');
					if($message){
						echo $message;
						Session::put('message', null);
					}
					



					  ?>
					

					</p>


						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>id</th>
								  <th>Title</th>
								  <th>Catrgory</th>
								  <th>Image</th>
								  <th>Short Description</th>
								  <th>Price</th>
								  <th>Size</th>
								  <th>Color</th>
								  <th>Tags</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($all_product_info as $product)
							<tr>
								
								<td width="2%" class="center"> {{$product->id}}</td>
								<td width="5%" class="center">{{$product->title}}</td>
								<td width="5%" class="center">{{$product->category_name}}</td>
								<td width="5%" class="center"> <img src="{{url($product->image)}}" alt=""></td>
								<td width="15%" class="center">{{$product->short_description}}</td>
							
								<td width="5%" class="center">{{$product->price}}</td>
								<td width="7%" class="center">{{$product->size}}</td>
								<td width="5%" class="center">{{$product->color}}</td>
								<td width="7%" class="center">{{$product->tags}}</td>
								<td width="10%" class="center">
									@if($product->status=='1')
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">UnActive</span>
									@endif
								</td>
								<td class="center">
									@if($product->status==0)
									<a class="btn btn-success" href="{{Url('active-product/'.$product->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{Url('unactive-product/'.$product->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{Url('edit-product/'.$product->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{Url('delete-product/'.$product->id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>

								
							</tr>
							@endforeach
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection