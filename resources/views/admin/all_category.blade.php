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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($all_category_info as $category)
							<tr>
								
								<td> {{$category->id}}</td>

								@if($category->childs->count() > 0)
								<td class="center">{{$category->name}}
									@foreach($category->childs as $sub_cat)
									<ul>
										<li>{{$sub_cat->name}}</li>
									</ul>
									@endforeach
									

								</td>
								@else
								<td class="center">{{$category->name}}</td>
								@endif
								
								<td class="center">
									@if($category->status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-debger">UnActive</span>
									@endif	
									
								</td>
								<td class="center">
									@if($category->status==0)
									<a class="btn btn-success" href="{{Url('active-category/'.$category->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{Url('unactive-category/'.$category->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>

									@endif

									<a class="btn btn-info" href="{{Url('edit-category/'.$category->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{Url('delete-category/'.$category->id)}}">
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