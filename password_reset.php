<?php
	require('smarti/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';
	$smarty->cache_dir = 'cache';
	$smarty->config_dir = 'configs';

	//$smarty->assign('posts', $obj);
	//$smarty->assign('error', $error);
	$smarty->assign('input', $_POST);
	$smarty->assign('welcome', ["url" => ".", "name" => "MatrixForum"]);
	$smarty->assign('menu_1',  ["url" => ".", "name" => "Home"]);
	$smarty->assign('menu_2',  ["url" => "login.php", "name" => "Log In"]);
	$smarty->assign('menu_3',  ["url" => "register.php", "name" => "Register"]);

	$smarty->assign("error", ["text" => isset($_GET["err"])?"the provided email does not exist":""]);

	$smarty->display('password_reset_template.tpl');


?>