<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="home.css">

</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="{{route($navbar['welcome']['route'])}}">{{$navbar['welcome']['name']}}</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active">   <a href="{{route($navbar['menu_1']['route'])}}">{{$navbar['menu_1']['name']}}</a>    </li>
					<!--<li>          <a href="#">Page 1</a>    </li>
					<li>          <a href="#">Page 2</a>    </li> 
					<li>          <a href="#">Page 3</a>    </li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="{{route($navbar['menu_2']['route'])}}">
							<span class="glyphicon glyphicon-user">
							</span> {{$navbar['menu_2']['name']}}
						</a>    
					</li>
					<li>
						<a href="{{route($navbar['menu_3']['route'])}}">
							<span class="glyphicon glyphicon-log-in">
							</span> {{$navbar['menu_3']['name']}}
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<h2>Login</h2>
		<form action="{{route('login_act')}}" method="post">
			<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" 
					@if (isset($input['email']))
						value="{{$input['email']}}"
					@endif
					>
				</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="remember" {if isset($input.remember)}checked{/if}>Remember me</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="password_reset.php">Forgot password?</a>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>     
			@if (count($errors))
				<span style="color: red;">
					{{$errors->first()}}
				</span>
			@endif
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>


</body>
</html>