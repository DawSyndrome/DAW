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
			<a class="navbar-brand" href="home.html">MatixForum</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active">   <a href="home.html">Home</a>    </li>
				<!--<li>          <a href="#">Page 1</a>    </li>
				<li>          <a href="#">Page 2</a>    </li> 
				<li>          <a href="#">Page 3</a>    </li> -->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="register.html">
						<span class="glyphicon glyphicon-user">
						</span> Sign Up
					</a>    
				</li>
				<li>
					<a href="login.html">
						<span class="glyphicon glyphicon-log-in">
						</span> Login
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>






<div class="row">
  <div class="leftcolumn">

  	{foreach item=post from=$posts}
	  	<div class="card">
	      {if isset($post.title)}
	      	<h2>{$post.title}</h2>
	      {/if}
	      <h5> 
	      	<span style="color: {if $post.admin}red{elseif $post.activated}blue{else}gray{/if}">{$post.author}</span>
	      	<div class="post-date">{$post.created_at}</div>
	      	{if isset($post.updated_at)}(edited last: <div class="post-date">{$post.updated_at}</div>){/if}
	      </h5>
	      {if isset($post.image)}
	      	<img class="post-image" src="{$post.image}">
	      {/if}
	      {$post.content}
	    </div>
	{/foreach}

    <!--<div class="card">
      <h2>Road Rage</h2>
      <h5>I'm sorry if you see my face  <div class="post-date">Dec 7, 2017</div></h5>
      <img class="post-image" src="https://mcdn.wallpapersafari.com/medium/16/93/pzcw2B.jpg">
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    <div class="card">
      <h2>Yeet</h2>
      <h5>Epah ya eu já comia  <div class="post-date">Sep 2, 2017</div></h5>
      <img class="post-image" src="https://p.bigstockphoto.com/GeFvQkBbSLaMdpKXF1Zv_bigstock-Aerial-View-Of-Blue-Lakes-And--227291596.jpg">
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>-->
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About MatrixForum</h2>
      <img class="post-image rightcol-image" src="https://i.pinimg.com/originals/01/61/fb/0161fb2fde82513ff9b0510b930ff578.jpg">
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Posts</h3>
      <!--<div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>-->
      not much to show here yet
    </div>
  </div>
</div>

<!--<div class="footer">
  <h2>Footer</h2>
</div>-->

</body>
</html>