<?php

	include "db.php";

	$error = ["success" => false, "text" => ""];

	if(isset($_POST["email"])){
		$kweri = $conn->query("
			SELECT id, name, email, admin, activated 
			FROM users 
			WHERE 
				email='" . $_POST["email"] . "' 
				AND 
				password_digest='".md5($_POST["pass"])."'
			;
		");
		if($kweri->num_rows == 0){
			$error = ["success" => false, "text" => "Nenhum utilizador com esta combinação de email/password"];
		}else{
			$error = ["success" => true, "text" => "Login concluido, redirecionando..."];
			session_start();
			$_SESSION["userinfo"] = $kweri->fetch_assoc();
			$cookie = md5(time());
			if(isset($_POST["remember"])){
				setcookie("RememberMe", $cookie, time() + (3600 * 24 * 30));
				$conn->query("
					UPDATE 
						users 
					SET 
						remember_digest='".$cookie."' 
					WHERE
						id=".$_SESSION["userinfo"]["id"]."
					;
				");
			}
		}
	}


	require('smarti/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';
	$smarty->cache_dir = 'cache';
	$smarty->config_dir = 'configs';

	//$smarty->assign('posts', $obj);
	$smarty->assign('error', $error);
	$smarty->assign('input', $_POST);
	$smarty->assign('welcome', ["url" => ".", "name" => "MatrixForum"]);
	$smarty->assign('menu_1',  ["url" => ".", "name" => "Home"]);
	$smarty->assign('menu_2',  ["url" => "login.php", "name" => "Log In"]);
	$smarty->assign('menu_3',  ["url" => "register.php", "name" => "Register"]);


	$smarty->display('login_template.tpl');

	if($error["success"]){
		header("refresh:3;url=.");
	}

?>