@extends('layouts.app')
@section('content')
<div class="container">
	<h1>Send Mail</h1>
	<!-- <div class="row"> -->
		<form action="{{route('send-mail')}}" method="POST" >
			@csrf
			<div class="row form-group">
				<label class="col-md-3">Name</label>
				<input type="text" name="name" class="col-md-9 form-control"  >
			</div>
			<div class="row form-group">
				<lable class="col-md-3">Content</lable>
				<textarea type="text" name="content" class="col-md-9 form-control" ></textarea>
			</div>
			<div class="row form-group">
			<button type="submit" class="btn btn-primary col-md-offset-3">Send</button>
			</div>
		</form>
	<!-- </div> -->
</div>
@endsection