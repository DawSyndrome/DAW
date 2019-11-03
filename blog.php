<?php
	session_start();

	include "db.php";
	if(isset($_GET["post_id"])){
		if(
			($kuweri = $conn->query("
				SELECT content FROM microposts WHERE id=".$_GET["post_id"]." AND user_id=".$_SESSION["userinfo"]["id"].";
			"))->num_rows != 0
		){
			$action = [
				"name" => "Update Post", 
				"url"  => "updateblog_action.php?post_id=".$_GET["post_id"], 
				"text" => $kuweri->fetch_assoc()["content"]
			];
		}else{
			header("Location: blog.php");
			exit;
		}
	}else{
		$action = ["name" => "Create Post", "url" => "newblog_action.php", "text" => ""];
	}
	



	require('smarti/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';
	$smarty->cache_dir = 'cache';
	$smarty->config_dir = 'configs';

	$smarty->assign('action', $action);

	if(isset($_SESSION["userinfo"])){
		$smarty->assign('user_id', $_SESSION["userinfo"]["id"]);
		$smarty->assign('welcome', ["url" => ".", "name" => $_SESSION["userinfo"]["name"]]);
		$smarty->assign('menu_2', ["url" => "logout_action.php", "name" => "Log Out"]);
		$smarty->assign('menu_3', ["url" => "blog.php", "name" => "Make Post"]);
	}else{
		$smarty->assign('welcome', ["url" => ".", "name" => "MatrixForum"]);
		$smarty->assign('menu_2', ["url" => "login.php", "name" => "Log In"]);
		$smarty->assign('menu_3', ["url" => "register.php", "name" => "Register"]);
	}
	$smarty->assign('menu_1', ["url" => ".", "name" => "Home"]);

	$smarty->display('blog_template.tpl');
?>