<?php
/* Smarty version 3.1.33, created on 2019-11-03 13:50:53
  from 'C:\Users\TrisT\Documents\Cadeiras\DAW\daw\templates\blog_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbecd2d76dcf5_12491437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a08c3c7034feb32bd54e3aae6e366555793203df' => 
    array (
      0 => 'C:\\Users\\TrisT\\Documents\\Cadeiras\\DAW\\daw\\templates\\blog_template.tpl',
      1 => 1572785451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dbecd2d76dcf5_12491437 (Smarty_Internal_Template $_smarty_tpl) {
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

	<div class="container">
		<h2><?php echo $_smarty_tpl->tpl_vars['action']->value['name'];?>
</h2>
		<form action="<?php echo $_smarty_tpl->tpl_vars['action']->value['url'];?>
" method="post">
			<div class="form-group">
					<textarea name="text" class="form-control" style="height: 400px;"><?php echo $_smarty_tpl->tpl_vars['action']->value['text'];?>
</textarea>
				</div>
			
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	

</body>
</html><?php }
}
