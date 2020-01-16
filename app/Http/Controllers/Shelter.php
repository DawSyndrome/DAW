<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shelter_model;

class Shelter extends Controller
{

	function __construct(){
		session_start();
	}
	function getUserId(){return array_key_exists("user_id", $_SESSION)?$_SESSION["user_id"]:null;}
	function loggedIn(){return Shelter::getUserId() != null;}





    public function home(){
		return view("index");
	}

    public function pets($pet_cat = null){
    	$params = [];
    	if($pet_cat){
    		$params["animals"] = Shelter_model::getUnadoptedAnimalsByID($pet_cat);
    		$params["category_name"] = Shelter_model::getCategory($pet_cat)->name;
    	}else{
    		$params["animals"] = Shelter_model::getAllUnadoptedAnimals();
    		$params["category_name"] = "Everything";
    	}

    	$params["categories"] = Shelter_model::getCategories();

    	if($params["logged_in"] = Shelter::loggedIn())
    		$params["username"] = $_SESSION["user_name"];

		return view("pets", $params);
	}





	public function login(){
		if(Shelter::loggedIn()){
			return view("message", ["redirect_route" => "pets", "err_msg" => "You were already logged in!"]);
		}
		return view("login");

		/*if(Store::loggedIn())
			return "You are already logged in bro what?";
		if(!($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
			return "invalid email bro, stop messin widda html";
		if(!($_POST["password"]))
			return "gotta put up a password";
		if($qr = Store_model::login($_POST["email"], $_POST["password"])){
			$_SESSION["user_id"] = $qr->id;
			$_SESSION["user_name"] = $qr->name;
		}else return "You got something wrong!";
		return "true";*/
	}

	public function login_act(){
		$err_msg = "";
		$redirect_route = "login";
		if(Shelter::loggedIn())
			$err_msg = "You are already logged in bro what?";

		if(!($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
			$err_msg = "invalid email bro, stop messin widda html";
		if(!($_POST["pass"]))
			$err_msg = "gotta put up a password";
		if($qr = Shelter_model::login($_POST["email"], $_POST["pass"])){
			$_SESSION["user_id"] = $qr->id;
			$_SESSION["user_name"] = $qr->name;
			$err_msg = "Successfully logged in! Redirecting..";
			$redirect_route = "pets";
		}else $err_msg = "You got something wrong!";
		return view("message", ["redirect_route" => $redirect_route, "err_msg" => $err_msg]);
	}

	public function register(){
		if(Shelter::loggedIn()){
			return view("message", ["redirect_route" => "pets", "err_msg" => "You were already logged in!"]);
		}
		return view("register");
	}

	public function register_act(){

		$err_msg = "";
		$redirect_route = "register";

		if(Shelter::loggedIn())
			$err_msg = "You are already logged in bro what?";
		if(!($_POST["name"]) && !ctype_space($_POST["name"]))
			$err_msg = "Bad name";
		if(!($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))
			$err_msg = "invalid email bro, stop messin widda html";
		if(!($_POST["pass"] && strlen($_POST["pass"]) >= 5 && !ctype_space($_POST["pass"])))
			$err_msg = "Bad pass, at least 5 decent characters.";
		if($_POST["pass"] != $_POST["passc"])
			$err_msg = "Must be similar passwords";
		if(Shelter_model::exists($_POST["email"]))
			$err_msg = "An account with this email already exists.";
		if($qr = Shelter_model::register($_POST["name"], $_POST["email"], $_POST["pass"])){
			$login = Shelter_model::login($_POST["email"], $_POST["pass"]);
			$_SESSION["user_id"] = $login->id;
			$_SESSION["user_name"] = $login->name;
			$err_msg = "Successfully registered and logged in! Redirecting..";
			$redirect_route = "pets";
		}else $err_msg = "Server error, failed to create user";
		
		return view("message", ["redirect_route" => $redirect_route, "err_msg" => $err_msg]);	

	}

	public function logout(){
		unset($_SESSION["user_id"]);
		return view("message", ["redirect_route" => "home", "err_msg" => "Logged out Successfully! Redirecting.."]);
	}

	public function adopt($id){
		$animal = Shelter_model::getAnimalByID($id);
		return view("message", [
			"redirect_route" => "pets", 
			"err_msg" => Shelter_model::adoptAnimal($id, $_SESSION["user_id"])
				?("Successfully adopted ".$animal->name."!")
				:("Failed to adopt, already adopted.")
		]);
	}

}
