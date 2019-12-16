<?php
	namespace App;
	use Illuminate\Support\Facades\DB;
	class Store_model{
		public static function exists($email){
			return collect(DB::select("SELECT id, name FROM customers WHERE email=?", [$email]))->first() != null;
		}

		public static function login($email, $pw){
			return collect(DB::select(
				"
					SELECT id, name 
					FROM customers 
					WHERE 
						email=? 
						AND 
						password_digest=?
				"
				, 
				[
					$email, 
					md5($pw)
				]
			)) -> first();
		}

		public static function register($name, $email, $pw){
			DB::insert(
				"
					INSERT INTO customers (
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
					md5($pw)
				]
			);
			return true;
		}

		public static function getCategories(){
			return collect(DB::select(
				"
					SELECT * 
					FROM categories
				"
			));
		}

		public static function getProducts($lower_limit, $upper_limit, $category_name){
			if($category_name)
				return collect(DB::select(
					"
						SELECT products.name, products.id, products.description, products.price, products.image
						FROM products, categories
						WHERE categories.id = products.cat_id and categories.name = ?
						LIMIT ?, ?
					"
					, 
					[
						$category_name,
						$lower_limit, 
						$upper_limit
					]
				));
			else
				return collect(DB::select(
					"
						SELECT * 
						FROM products
						LIMIT ?, ?
					"
					, 
					[
						$lower_limit, 
						$upper_limit
					]
				));
		}

		public static function getProduct($product_id){
			return collect(DB::select("SELECT * FROM products WHERE id=?", [$product_id]))->first();
		}

		public static function createOrderItem($order_id, $product_id, $quantity){
			DB::insert(
				"
					INSERT INTO order_items (
						order_id,
						product_id,
						quantity
					) VALUES (
						?,
						?,
						?
					)
				"
				,
				[
					$order_id, 
					$product_id, 
					$quantity
				]
			);

			return true;
		}

		public static function createOrder($user_id, $cost){
			DB::insert(
				"
					INSERT INTO orders (
						customer_id,
						created_at,
						status,
						total
					) VALUES (
						?,
						NOW(),
						0,
						?
					);
				"
				,
				[
					$user_id, 
					$cost
				]
			);
			return collect(DB::select("SELECT LAST_INSERT_ID() as id"))->first()->id;
		}


		public static function getOrders($user_id){
			return collect(DB::select(
				"
					SELECT *
					FROM orders
					WHERE customer_id = ?
					ORDER BY created_at DESC
				",
				[
					$user_id
				]
			));
		}

		public static function getOrderItems($order_id){
			return collect(DB::select(
				"
					SELECT *
					FROM order_items, products
					WHERE products.id = order_items.product_id and order_id = ?
					ORDER BY name
				",
				[
					$order_id
				]
			));
		}
	}
?>