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

						<h2><i class="halflings-icon edit"></i><span class="break"></span>edit Brand</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="{{URL('update.brand')}}"  enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							

							<div class="control-group">
							  <label class="control-label" for="typeahead">Brand Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="brand_name" value="{{$edit_brand->brand_name}}"><br>
								<span class="alert-danger">@foreach($errors->get('brand_name') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							
							
							<div class="form-actions">
								<input type="hidden" name="brand_id" value="{{$edit_brand->id}}">
							  <button type="submit" class="btn btn-primary">update Brand</button>

							
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection