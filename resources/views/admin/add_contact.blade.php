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

						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Contact</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="{{URL('save.contact')}}"  enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							

							

							<div class="control-group">
							  <label class="control-label" for="typeahead">Facebook LInk</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="facebook"><br>
								<span class="alert-danger">@foreach($errors->get('facebook') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Twiteer LInk</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="twiteer"><br>
								<span class="alert-danger">@foreach($errors->get('twiteer') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Goolge LInk</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="google"><br>
								<span class="alert-danger">@foreach($errors->get('google') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Instagram LInk</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="instagram"><br>
								<span class="alert-danger">@foreach($errors->get('instagram') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Dribbble LInk</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name="dribble"><br>
								<span class="alert-danger">@foreach($errors->get('dribble') as $message) {{$message}} @endforeach</span>
							  </div>
							</div>

							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Contact</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection