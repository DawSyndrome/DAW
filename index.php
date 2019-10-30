<?php

	
	///require('/usr/share/php/smarty/libs/Smarty.class.php');
	

	include "db.php";

	$kuweri = $conn->query("
		SELECT author, admin, activated, content, created_at, updated_at FROM 
			(SELECT * FROM microposts) posts
		JOIN
			(SELECT id, name AS author, admin, activated FROM users) users
		ON
			posts.user_id = users.id
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
	$smarty->assign('welcome', ["url" => "/", "name" => "MatrixForum"]);
	$smarty->assign('menu_1', ["url" => "/", "name" => "Home"]);
	$smarty->assign('menu_2', ["url" => "login.html", "name" => "Log In"]);
	$smarty->assign('menu_3', ["url" => "register.php", "name" => "Register"]);

	$smarty->display('index_template.tpl');
?>