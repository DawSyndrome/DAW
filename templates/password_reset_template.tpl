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
				<a class="navbar-brand" href="{$welcome.url}">{$welcome.name}</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active">   <a href="{$menu_1.url}">{$menu_1.name}</a>    </li>
					<!--<li>          <a href="#">Page 1</a>    </li>
					<li>          <a href="#">Page 2</a>    </li> 
					<li>          <a href="#">Page 3</a>    </li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="{$menu_2.url}">
							<span class="glyphicon glyphicon-user">
							</span> {$menu_2.name}
						</a>    
					</li>
					<li>
						<a href="{$menu_3.url}">
							<span class="glyphicon glyphicon-log-in">
							</span> {$menu_3.name}
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<h2>Forgot password</h2>
		<form action="password_reset_action.php" method="post">
			<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" {if isset($input.email)}value="{$input.email}"{/if}>
				</div>
			<button type="submit" class="btn btn-default">Submit</button>     <span style="color: red;">{$error.text}</span>
		</form>
	</div>

</body>
</html>