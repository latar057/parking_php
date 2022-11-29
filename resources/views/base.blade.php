<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<!-- CSS only -->
	<style>
		* {
			font-family: sans-serif;
			box-sizing: border-box;
		}

		th,
		td {
			font-size: 18px;
			padding: 10px;
		}

		th {
			background: #555;
			color: #fff;
		}

		td {
			background: #eee;
		}

		a {
			text-decoration: none;
			transition: 0.2s ease;
			color: #3f75c5;
		}

		td:nth-child(6)>a {
			color: #c22a2a;
		}

		a:hover {
			opacity: 0.7;
		}

		p {
			font-size: italic;
		}

		input,
		textarea,
		button {
			padding: 10px;
			display: block;
			min-height: 30px;
			width: 250px;
			margin-bottom: 10px;
		}

		textarea {
			resize: vertical;
			height: 80px;
		}

		button {
			text-transform: uppercase;
			font-weight: bold;
			cursor: pointer;
		}
	</style>
</head>

<body>
	@yield('content')
</body>

</html>