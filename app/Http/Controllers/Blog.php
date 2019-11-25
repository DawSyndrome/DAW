<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\BlogModel;


	class Blog extends Controller{

		private function navbar_data(){
			$r;
			if(session("username")){
				$r = [
					"welcome" => ["name" => session("username"), 	"route" => "home"],
					"menu_1" =>  ["name" => "home", 				"route" => "home"],
					"menu_2" =>  ["name" => "Post", 				"route" => "post"],
					"menu_3" =>  ["name" => "Logout",	 			"route" => "logout"]
				];
			}else{
				$r = [
					"welcome" => ["name" => "Welcome", 	"route" => "home"],
					"menu_1" =>  ["name" => "home", 	"route" => "home"],
					"menu_2" =>  ["name" => "Login", 	"route" => "login"],
					"menu_3" =>  ["name" => "Register", "route" => "register"]
				];
			}
			return $r;
		}


		public function index(){
			return view(
				"index", 
				[
					"posts" => BlogModel::get_posts(),
					"navbar" => $this->navbar_data(),
					"user_id" => ($uid = session("uid"))?$uid:null
				]
			);
		}

		public function login(){
			return view(
				"login", 
				[
					"navbar" => $this->navbar_data(),
					"error" => [
						"success" => false,
						"text" => ""
					]
				]
			);
		}

		public function login_act(Request $request){
			$this->validate(request(), [
				"email" => "required",
				"password" => "required"
			]);

			if($request->input("remember")){
				BlogModel::remember(
					$request->input("email"),
					md5(time())
				);
			}

			if($login = BlogModel::Login(
				$request->input("email"),
				$request->input("password")
			)){
				session(["username" => $login->name]);
				session(["uid" => $login->id]);
				return view("message", [
					"redirect" => [
						"time" => "3",
						"url" => "..",
						"color" => "green",
						"text" => "Success!"
					]
				]);
			}

			return back()->withErrors(["Something didn't go as planned, try again!"]);
		}

		public function logout(){
			session(['username' => '', 'uid' => '']);
			return view('message', [
				"redirect" => [
					"time" => "3",
					"url" => "..",
					"color" => "green",
					"text" => "Peace brother"
				]
			]);
		}

		public function register(){
			return view("register", [
					"navbar" => $this->navbar_data()
			]);
		}
	

		public function register_act(Request $request){
			$this->validate($request, [
				"name" => "required",
				"email" => "required|unique:users,email",
				"password" => "required|min:5",
				"passwordc" => "required|same:password"
			]);

			BlogModel::register(
				$request->input("name"), 
				$request->input("email"),
				md5($request->input("password"))
			);

			return view("message", [
				"redirect" => [
					"time" => "3",
					"url" => "..",
					"color" => "green",
					"text" => "Success!"
				]
			]);
		}

		public function post(Request $request){
			$action;
			if($pid = $request->input("post_id")){
				$post = BlogModel::getpost($pid);
				if(!$post || $post->user_id != session("uid"))
					return redirect(route('post'));
				$action = [
					"name" => "Edit Blog Post",
					"text" => $post->content,
					"pid" => $pid
				];
			}else{
				$action = [
					"name" => "Create Blog Post",
					"text" => ""
				];
			}

			return view("post", [
				"navbar" => $this->navbar_data(),
				"action" => $action
			]);
		}

		public function post_act(Request $request){
			$pid = $request->input("pid");
			if($pid){
				$post = BlogModel::getpost($pid);
				if($post && $post->user_id == session("uid")){
					BlogModel::updatepost($request->input("text"), $pid);
				}else{
					return back();
				}
			}else{
				BlogModel::post($request->input("text"), session("uid"));
			}

			return view("message", [
				"redirect" => [
					"time" => "3",
					"url" => "..",
					"color" => "green",
					"text" => "Success!"
				]
			]); 
		}
	}
?>