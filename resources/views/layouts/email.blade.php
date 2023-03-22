<!DOCTYPE html>
<html>
<head>
	<title>Booking Confirmation</title>
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			color: #333;
			background-color: #f5f5f5;
			padding: 0;
			margin: 0;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,.1);
			text-align: center;
		}
		h1 {
			font-size: 24px;
			margin-top: 0;
			color: #333;
		}
		p {
			margin: 10px 0;
			line-height: 1.5;
		}
		a {
			color: #0078e7;
			text-decoration: none;
		}
		.btn {
			display: inline-block;
			background-color: #0078e7;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Booking Confirmation</h1>
		@yield('content')
	</div>
</body>
</html>
