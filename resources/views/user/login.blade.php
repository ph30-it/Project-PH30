@extends('layouts.app')
@section('content')
<h1>Login</h1>
<div>
	<form action="{{route('login')}}" method="POST">
		@csrf
		<label>Email</label>
		<input type="text" name="email">
		<label>Password</label>
		<input type="password" name="password">
		<button type="submit">Login</button>
	</form>
</div>
@endsection