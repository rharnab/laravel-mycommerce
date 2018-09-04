@extends('deshboard_layouts')
@section('content')
<style>
	.parent_cat{
		color: red;
	}
	.sub_cat{
		background-color: orange;
		color: green;
		margin-left: 20px;
		
	}
	
</style>
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

						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="{{URL('save.product')}}"  enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							

							<div class="control-group">
							  <label class="control-label" for="typeahead">Title </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="title"><br>
								<span class="alert-danger">@foreach($errors->get('title') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  
							  <div class="controls">
								<select name="cat_id" id="">
									<option value="">Select Category</option>
									
									@foreach($all_category as $category)

									@if($category->childs->count() >0)

									<option class="parent_cat" value="{{$category->id}}"><span>{{$category->name}}</span></option>
										
											
										
											@foreach($category->childs as $sub_cat)
											
											
											 <option class="sub_cat" value="{{$sub_cat->id}}"><span>{{$sub_cat->name}}</span></option>
											
										
											@endforeach

									

									@else
									<option value="{{$category->id}}">{{$category->name}}</option>


									@endif

									




									
									@endforeach
								</select>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="image"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div> 

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="short_description"></textarea><br>

								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="long_description"></textarea><br>

								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="price"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Size</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="size"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Color</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="color"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tags</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="tags"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection