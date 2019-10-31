<?php
	include "db.php";

	$error = false;

	if(isset($_POST["name"])){
		if(
			!empty($_POST["name"]) 
			&& 
			!empty($_POST["email"]) 
			&& 
			!empty($_POST["pass"])
			&&
			!empty($_POST["pasc"])
		){
			if($kweri = $conn->query("
						SELECT id FROM users WHERE email='" . $_POST["email"] . "';
			")->num_rows != 0){
				$error = "Email já existe na base de dados";
			}else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				$error = "Email tem formato incorrecto";
			}else if(ctype_space($_POST["pass"])){
				$error = "Password em branco";
			}else if($_POST["pass"] != $_POST["pasc"]){
				$error = "Passwords não coincidem";
			}else{
				if(!$conn->query("
							INSERT INTO users (
								name, email, created_at, updated_at, password_digest
							) VALUES (
								'".$_POST["name"]."', '".$_POST["email"]."', NOW(), NOW(), '".md5($_POST['pass'])."'
							)
				"))	 $error = "Database insertion failed";
				else $error = true;
			}
		}else{
			$error = "Todos os campos devem ser preenchidos";
		}
	}

	if($error === true){
		$_POST = null;
		$error = ["success" => true, "text" => "Sucesso em criar uma conta, redirecionando.."];
	}else{
		$error = ["success" => false, "text" => $error];
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
	$smarty->assign('welcome', ["url" => "/", "name" => "MatrixForum"]);
	$smarty->assign('menu_1',  ["url" => "/", "name" => "Home"]);
	$smarty->assign('menu_2',  ["url" => "login.php", "name" => "Log In"]);
	$smarty->assign('menu_3',  ["url" => "register.php", "name" => "Register"]);

	$smarty->display('register_template.tpl');

	if($error["success"] === true){
		header("refresh:3;url=.");
	}
?>