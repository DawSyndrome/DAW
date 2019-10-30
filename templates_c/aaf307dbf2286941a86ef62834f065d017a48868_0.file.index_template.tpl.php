<?php
/* Smarty version 3.1.33, created on 2019-10-30 11:42:33
  from 'C:\Users\TrisT\Documents\Cadeiras\DAW\daw\templates\index_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db969192fdde8_46624075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aaf307dbf2286941a86ef62834f065d017a48868' => 
    array (
      0 => 'C:\\Users\\TrisT\\Documents\\Cadeiras\\DAW\\daw\\templates\\index_template.tpl',
      1 => 1572390329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db969192fdde8_46624075 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>

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

  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
	  	<div class="card">
	      <?php if (isset($_smarty_tpl->tpl_vars['post']->value['title'])) {?>
	      	<h2><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
	      <?php }?>
	      <h5> 
	      	<span style="color: <?php if ($_smarty_tpl->tpl_vars['post']->value['admin']) {?>red<?php } elseif ($_smarty_tpl->tpl_vars['post']->value['activated']) {?>blue<?php } else { ?>gray<?php }?>"><?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
</span>
	      	<div class="post-date"><?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>
</div>
	      	<?php if (isset($_smarty_tpl->tpl_vars['post']->value['updated_at'])) {?>(edited last: <div class="post-date"><?php echo $_smarty_tpl->tpl_vars['post']->value['updated_at'];?>
</div>)<?php }?>
	      </h5>
	      <?php if (isset($_smarty_tpl->tpl_vars['post']->value['image'])) {?>
	      	<img class="post-image" src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
">
	      <?php }?>
	      <?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>

	    </div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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
</html><?php }
}
