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
		<h2>{{$action['name']}}</h2>
		<form action="{{route('post_act')}}" method="post">
			<div class="form-group">
				<textarea name="text" class="form-control" style="height: 400px;">{{$action['text']}}</textarea>
			</div>
			@if (isset($action['pid']))
				<input type="hidden" name="pid" value="{{$action['pid']}}">
			@endif
			<button type="submit" class="btn btn-default">Submit</button>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
	

</body>
</html>