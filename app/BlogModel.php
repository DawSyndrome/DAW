<?php
	namespace App;
	use Illuminate\Support\Facades\DB;

	class BlogModel{

		public static function get_posts(){
			return DB::select("
				SELECT id, users.author_id, author, admin, activated, content, created_at, updated_at FROM 
					(SELECT id, content, created_at, updated_at, user_id AS author_id FROM microposts) posts
				JOIN
					(SELECT id AS author_id, name AS author, admin, activated FROM users) users
				ON
					posts.author_id = users.author_id
				ORDER BY 
					created_at DESC
			");
		}

		public static function login($email, $password){
			return collect(DB::select(
				"
					SELECT id, name 
					FROM users 
					WHERE 
						email=? 
						AND 
						password_digest=?
				"
				, 
				[
					$email, 
					md5($password)
				]
			)) -> first();
		}

		public static function register($name, $email, $pw){
			DB::insert(
				"
					INSERT INTO users (
						name, 
						email, 
						password_digest, 
						created_at,
						updated_at
					) VALUES (
						?,
						?,
						?, 
						NOW(),
						NOW()
					)
				"
				,
				[
					$name, 
					$email, 
					$pw
				]
			);
			return true;
		}

		public static function remember($email, $digest){
			DB::update(
				"
					UPDATE users 
					SET remember_digest=?
					WHERE id=?
				"
				, 
				[
					$digest, 
					$email
				]
			);
		}

		public static function getpost($postid){
			$select = DB::select(
				"
					SELECT content, user_id
					FROM microposts 
					WHERE id=?
				"
				,
				[
					$postid
				]
			);

			if(!$select)return false;

			return collect($select)->first();
		}

		public static function post($content, $uid){
			DB::insert(
				"
					INSERT INTO microposts (
						user_id, 
						content, 
						created_at, 
						updated_at
					) VALUES (
						?, 
						?, 
						NOW(),
						NOW()
					)
				"
				,
				[
					$uid, 
					$content
				]
			);
        	return true;
		}

		public static function updatepost($content, $pid){
			DB::update(
				"
					UPDATE microposts 
					SET content=?, updated_at=NOW()
					WHERE id=?
				"
				,
				[
					$content,
					$pid
				]
			);
        	return true;
		}
	}
?>