<?php
/* Smarty version 3.1.33, created on 2019-10-30 19:02:46
  from 'C:\Users\TrisT\Documents\Cadeiras\DAW\daw\templates\login_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db9d0462efc63_20016043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ffa74d2c054ff84b4cd93c16de8c4d2a04f8e84' => 
    array (
      0 => 'C:\\Users\\TrisT\\Documents\\Cadeiras\\DAW\\daw\\templates\\login_template.tpl',
      1 => 1572458563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db9d0462efc63_20016043 (Smarty_Internal_Template $_smarty_tpl) {
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
				<a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['welcome']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['welcome']->value['name'];?>
</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active">   <a href="<?php echo $_smarty_tpl->tpl_vars['menu_1']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_1']->value['name'];?>
</a>    </li>
					<!--<li>          <a href="#">Page 1</a>    </li>
					<li>          <a href="#">Page 2</a>    </li> 
					<li>          <a href="#">Page 3</a>    </li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['menu_2']->value['url'];?>
">
							<span class="glyphicon glyphicon-user">
							</span> <?php echo $_smarty_tpl->tpl_vars['menu_2']->value['name'];?>

						</a>    
					</li>
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['menu_3']->value['url'];?>
">
							<span class="glyphicon glyphicon-log-in">
							</span> <?php echo $_smarty_tpl->tpl_vars['menu_3']->value['name'];?>

						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php if ($_smarty_tpl->tpl_vars['error']->value['success']) {?>
		<div class="container">
			<h2><?php echo $_smarty_tpl->tpl_vars['error']->value['text'];?>
</h2>
		</div>
	<?php } else { ?>
		<div class="container">
			<h2>Login</h2>
			<form action="login.php" method="post">
				<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['email'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['input']->value['email'];?>
"<?php }?>>
					</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="remember" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['remember'])) {?>checked<?php }?>>Remember me</label>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>     <span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['error']->value['text'];?>
</span>
			</form>
		</div>
	<?php }?>

</body>
</html><?php }
}
