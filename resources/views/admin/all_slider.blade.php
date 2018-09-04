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
								  <th>name</th>
								
								  <th>Image</th>
								 
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($all_slider_info as $slider)
							<tr>
								
								<td  class="center"> {{$slider->id}}</td>
								<td  class="center"> {{$slider->slider_name}}</td>
								
								<td  class="center"><img src="{{$slider->slider_image}}" alt="" width="200px" height="150px"></td>
								
								<td  class="center">
									@if($slider->status=='1')
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">UnActive</span>
									@endif
								</td>
								<td class="center">
									@if($slider->status==0)
									<a class="btn btn-success" href="{{Url('active-slider/'.$slider->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{Url('unactive-slider/'.$slider->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{Url('edit-slider/'.$slider->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{Url('delete-slider/'.$slider->id)}}">
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