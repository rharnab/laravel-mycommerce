@extends('deshboard_layouts')

@section('content')
<div class="admin-profile">
	<h2>{{$admin_info->name}}</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque reprehenderit, iure veritatis possimus recusandae rerum! Architecto voluptatum, accusantium similique rerum, obcaecati aliquid sed unde aut qui quia fugiat temporibus itaque.</p>
	<textarea name="" id="" cols="30" rows="10">{{$admin_info->address}}</textarea>
	Mobile:<input type="text" value="{{$admin_info->phone}}">
	Email<input type="text" value="{{$admin_info->email}}">

</div>

@endsection