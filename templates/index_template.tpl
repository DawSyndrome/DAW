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






<div class="row">
  <div class="leftcolumn">

	{foreach item=post from=$posts}
		<div class="card">
			{if isset($post.title)}
				<h2>{$post.title}</h2>
			{/if}
			<h5>
			<span style="color: {if $post.admin}red{elseif $post.activated}blue{else}gray{/if}">{$post.author}</span>
			{if isset($user_id) && $user_id == $post.author_id}
				<a class="edit_button" href="blog.php?post_id={$post.id}">
					edit
				</a>
			{/if}    
			<div class="post-date">{$post.created_at}</div>
			{if isset($post.updated_at)}(edited last: <div class="post-date">{$post.updated_at}</div>){/if}
			</h5>
			{if isset($post.image)}
				<img class="post-image" src="{$post.image}">
			{/if}
			{$post.content}
		</div>
	{/foreach}
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