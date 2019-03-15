@extends('layouts.app')
@section('content')
<h1>Upload Image</h1>
<div>
	<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<label>Upload Image</label>
		<input type="file" name="images[]" multiple>
		<button type="submit">Upload</button>
	</form>
</div>
@endsection