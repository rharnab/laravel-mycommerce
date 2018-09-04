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

						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="{{route('update.product')}}"  enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							

							<div class="control-group">
							  <label class="control-label" for="typeahead">Title </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="title" value="{{$product_info->title}}"><br>
								<span class="alert-danger">@foreach($errors->get('title') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  
							  <div class="controls">
								<select name="cat_id" id="">
					
									{{$all_category=DB::table('tbl_category')->get()}}
									@foreach($all_category as $category)
									<option 

								<?php
								if($product_info->cat_id == $category->id)
									echo 'selected';

								 ?>
									value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
							  </div>
							</div>

							
							<div class="control-group">
								 <img  src="{{url($product_info->image)}}" alt="" width="100px" height="100px">
							  <label class="control-label" for="fileInput">File input</label>

							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="image" ><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div> 

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="short_description">{{$product_info->short_description}}</textarea><br>

								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="long_description">{{$product_info->long_description}}</textarea><br>

								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="price" value="{{$product_info->price}}"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Size</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="size" value="{{$product_info->size}}"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Color</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="color" value="{{$product_info->color}}"><br>
								<span class="alert-danger">@foreach($errors->get('image') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tags</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="tags" value="{{$product_info->tags}}"><br>
								<span class="alert-danger">@foreach($errors->get('tags') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>
							
							<div class="form-actions">
								<input type="hidden" name="product_id" value="{{$product_info->id}}">
							  <button type="submit" class="btn btn-primary">Save Product</button>
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection