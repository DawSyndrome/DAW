<?php

	
	///require('/usr/share/php/smarty/libs/Smarty.class.php');
	
	session_start();
	include "db.php";

	if(!isset($_SESSION["userinfo"]) && isset($_COOKIE["RememberMe"])){
		$kuweri = $conn->query("
			SELECT id, name, email, admin, activated FROM users WHERE remember_digest='".$_COOKIE["RememberMe"]."';
		");
		if($kuweri->num_rows != 0){
			$_SESSION["userinfo"] = $kuweri->fetch_assoc();
		}
	}

	$kuweri = $conn->query("
		SELECT id, users.author_id, author, admin, activated, content, created_at, updated_at FROM 
			(SELECT id, content, created_at, updated_at, user_id AS author_id FROM microposts) posts
		JOIN
			(SELECT id AS author_id, name AS author, admin, activated FROM users) users
		ON
			posts.author_id = users.author_id
		ORDER BY 
			created_at DESC
		;
	");


	$obj = [];
	$i = 0;
	while ($row = $kuweri->fetch_assoc()) {
		
		$post_lines = explode("\n", $row["content"]);

		$meta_len = 0;
		foreach ($post_lines as &$line) {
			if(strlen($line) && $line[0] == '$'){
				if(($tag_end = strpos($line, "\\", 1)) === false)break;
				$tag = substr($line, 1, $tag_end-1);
				$obj[$i][$tag] = substr($line, $tag_end+1);
			}else break;
			$meta_len += strlen($line);
		}

		if(isset($obj[$i])){
			$obj[$i] = array_merge($obj[$i], $row);
			$obj[$i]["content"] = substr($obj[$i]["content"], $meta_len);
		}else $obj[$i] = $row;

		$i++;
	}

	//print_r($obj);

	require('smarti/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';
	$smarty->cache_dir = 'cache';
	$smarty->config_dir = 'configs';

	$smarty->assign('posts', $obj);

	if(isset($_SESSION["userinfo"])){
		$smarty->assign('user_id', $_SESSION["userinfo"]["id"]);
		$smarty->assign('welcome', ["url" => "/", "name" => $_SESSION["userinfo"]["name"]]);
		$smarty->assign('menu_2', ["url" => "logout_action.php", "name" => "Log Out"]);
		$smarty->assign('menu_3', ["url" => "blog.php", "name" => "Make Post"]);
	}else{
		$smarty->assign('welcome', ["url" => "/", "name" => "MatrixForum"]);
		$smarty->assign('menu_2', ["url" => "login.php", "name" => "Log In"]);
		$smarty->assign('menu_3', ["url" => "register.php", "name" => "Register"]);
	}
	$smarty->assign('menu_1', ["url" => "/", "name" => "Home"]);

	$smarty->display('index_template.tpl');
?>