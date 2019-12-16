<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Store_model;
	
	class Store extends Controller{

		function __construct(){
			session_start();
			if(!isset($_SESSION["cart"])){
				$_SESSION["cart"] = [
					"products" => [],
					"subtotal" => 0
				];
			}
		}

		function getUserId(){
			return array_key_exists("user_id", $_SESSION)?$_SESSION["user_id"]:null;
		}

		function loggedIn(){
			return Store::getUserId() != null;
		}

		public function main(){
			$is_logged = Store::loggedIn();
			$fields = ["logged" => $is_logged];
			if($is_logged){
				$fields["username"] = $_SESSION["user_name"];
			}$fields["cart"] = $_SESSION["cart"];

			return view("main", $fields);
		}

		public function about(){
			$is_logged = Store::loggedIn();
			$fields = ["logged" => $is_logged];
			if($is_logged){
				$fields["username"] = $_SESSION["user_name"];
			}$fields["cart"] = $_SESSION["cart"];

			return view("about", $fields);
		}

		public function shop($cat = null, $page = 0){
			if($cat == "All")$cat = null;
			$is_logged = Store::loggedIn();
			$fields = ["logged" => $is_logged];
			if($is_logged){
				$fields["username"] = $_SESSION["user_name"];
			}$fields["cart"] = $_SESSION["cart"];


			$lower_limit = $page*20; 
			$upper_limit = $page*20+20;
			$fields["products"] = Store_model::getProducts($lower_limit, $upper_limit, $cat);
			$fields["categories"] = Store_model::getCategories();

			if(!count($fields["products"]))return back();

			if(count($fields["products"]) == 20)
				$fields["next_url"] = route("shop") . "/" . ($cat?$cat:"All") . "/" . ($page+1);
			if($page > 0)
				$fields["prev_url"] = route("shop") . "/" . ($cat?$cat:"All") . "/" . ($page-1);
			$fields["page"] = $page;


			return view("shop", $fields);
		}

		public function cart_add(){
			$product = Store_model::getProduct($_GET["id"]);
			if($product == null)return redirect(route("shop"));

			$sess_product = &$_SESSION["cart"]["products"][$_GET["id"]];
			if(is_null($sess_product)){
				$_SESSION["cart"]["products"][$_GET["id"]] = [
					"name" => $product->name,
					"price" => $product->price,
					"amount" => 0
				];
				$sess_product = &$_SESSION["cart"]["products"][$_GET["id"]];
			}

			$_SESSION["cart"]["subtotal"] += $product->price;
			$sess_product["amount"]++;
			return redirect(route("shop"));
		}

		public function cart_wipe(){
			if(isset($_SESSION["cart"]["products"][$_GET["id"]])){
				$_SESSION["cart"]["subtotal"] -= 
					$_SESSION["cart"]["products"][$_GET["id"]]["price"]
					*
					$_SESSION["cart"]["products"][$_GET["id"]]["amount"]
				;
				unset($_SESSION["cart"]["products"][$_GET["id"]]);
			}
			return redirect(route('shop'));
		}

		public function checkout(){
			if(!Store::loggedIn() || count($_SESSION["cart"]["products"]) == 0)return redirect(route("main"));
			$order_id = Store_model::createOrder($_SESSION["user_id"], $_SESSION["cart"]["subtotal"]);
			foreach ($_SESSION["cart"]["products"] as $product_id => $product) {
				Store_model::createOrderItem($order_id, $product_id, $product["amount"]);
			}
			$_SESSION["cart"]["products"] = [];
			$_SESSION["cart"]["subtotal"] = 0;
			return redirect(route("orders"));
		}


		public function orders(){
			$is_logged = Store::loggedIn();
			if(!$is_logged)return redirect(route("main"));
			$fields = ["logged" => $is_logged];
			if($is_logged){
				$fields["username"] = $_SESSION["user_name"];
			}$fields["cart"] = $_SESSION["cart"];


			$orders = Store_model::getOrders($_SESSION["user_id"]);
			$order_items = [];
			foreach ($orders as $index => &$order) {
				$order_items[$index] = Store_model::getOrderItems($order->id);
			}

			$fields["orders"] = $orders;
			$fields["order_items"] = $order_items;

			return view("orders", $fields);
		}


		public function login(){
			if(Store::loggedIn())
				return "You are already logged in bro what?";
			if(!($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
				return "invalid email bro, stop messin widda html";
			if(!($_POST["password"]))
				return "gotta put up a password";
			if($qr = Store_model::login($_POST["email"], $_POST["password"])){
				$_SESSION["user_id"] = $qr->id;
				$_SESSION["user_name"] = $qr->name;
			}else return "You got something wrong!";
			return "true";
		}

		public function logout(){
			unset($_SESSION["user_id"]);
			return back();
		}

		public function register(){
			if(Store::loggedIn())
				return "You are already logged in bro what?";
			if(!($_POST["username"]) && !ctype_space($_POST["username"]))
				return "Bad username";
			if(!($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
				return "invalid email bro, stop messin widda html";
			if(!($_POST["password"] && strlen($_POST["password"]) >= 5 && !ctype_space($_POST["password"])))
				return "Bad password, at least 5 decent characters.";
			if($_POST["password"] != $_POST["passwordr"])
				return "Must be similar passwords";
			if(Store_model::exists($_POST["email"]))
				return "An account with this email already exists.";
			if($qr = Store_model::register($_POST["username"], $_POST["email"], $_POST["password"])){
				$login = Store_model::login($_POST["email"], $_POST["password"]);
				$_SESSION["user_id"] = $login->id;
				$_SESSION["user_name"] = $login->name;
			}else return "Server error, failed to create user";
			return "true";
		}

	}
?>