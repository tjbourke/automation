@extends('app')

@section('body')
	<html>
	<head>
		<title>LED Matrix Control</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			body {
				margin-top:10px;
			}
			.btn {
				margin-bottom:5px;
			}
		</style>
	</head>

	<body>
	<div class="container">
		<h2>LED Matrix Control</h2>
		<form action="button.php" method="POST" enctype="multipart/form-data">
			Upload 32px Height PNG:<br />
			<input type="file" class="btn" name="image" /><br />

			<select name="animation" class="form-control">
				<option value="normal">normal</option>
				<option value="scroll">scroll</option>
				<option value="flash">flash</option>
			</select>
			<br />

			<input type="submit" class="btn btn-primary col-sm-12" name="on" id="on" value="Upload & Turn On">

			<input type="submit" class="btn col-sm-12" name="off" id="off" value="Turn Off">
		</form>
		<br />

		<h3>Status: <?php echo $status; ?></h3>
		<img src="image.png" class="img-fluid" alt="Current image" />
	</div>
	</body>
	</html>
@endsection