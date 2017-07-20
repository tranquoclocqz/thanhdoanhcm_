@extends('frontend/layout/layout')
@section('content')
	<div class="main">
		<div class="error-404 text-center">
				<h1>404</h1>
				<p>oops! something goes wrong</p>
				<a class="b-home" href="{{route('trangchu')}}">Back to Home</a>
			</div>
	</div>
@endsection