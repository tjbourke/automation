@extends('app')

@section('body')
	<html>
	<head>
		<title>LED Matrix Control</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			.btn {
				margin-bottom:5px;
			}
		</style>
	</head>

	<body>
	<div class="container">
		<br>
		<h2>LED Matrix Control</h2>
		<form action="{{ route('led') }}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<h3>Upload Image</h3>
			32px Height PNG:<br />
			<input type="file" class="btn" name="image" /><br />

			<input type="submit" class="btn btn-primary col-sm-12" name="upload" value="Upload">
			<br>
			<br>

			<h3>Matrix Control</h3>
			<select name="animation" class="form-control">
				<option value="normal">normal</option>
				<option value="scroll">scroll</option>
				<option value="flash">flash</option>
			</select>
			<br />


			@if ($status == "ON")
				<input type="submit" class="btn btn-error col-sm-12" name="off"  value="Turn Off">
			@else
				<input type="submit" class="btn btn-success col-sm-12" name="on" value="Turn On">
			@endif
		</form>
		<br>
		<br>

		<h3>Status: {{ $status }}, {{ $animation }}</h3>
		<img src="image.png" class="img-fluid" alt="Current image" />
	</div>
	</body>
	</html>
@endsection