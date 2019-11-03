<?php
	require('smarti/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';
	$smarty->cache_dir = 'cache';
	$smarty->config_dir = 'configs';

	session_start();
	if(!isset($_SESSION["userinfo"])){
		$smarty->assign("redirect", ["text" => "ERROR: Login first", "color" => "red", "url" => ".","time" => "3"]);
	}else{
		include "db.php";

		$_POST["text"] = $conn->real_escape_string($_POST["text"]);

		$kuweri = $conn->query("
			INSERT INTO 
				microposts (content, created_at, user_id) 
			VALUES
				('" . $_POST["text"] . "', NOW(), ". $_SESSION["userinfo"]["id"] .")
			;
		");
		if($kuweri === true){
			$smarty->assign("redirect", ["text" => "SUCCESS: New post submitted", "color" => "green", "url" => ".","time" => "3"]);
		}else{
			$smarty->assign("redirect", ["text" => "ERROR: Could not insert in database", "color" => "red", "url" => ".","time" => "3"]);	
		}
	}

	$smarty->display("message_template.tpl");
?>