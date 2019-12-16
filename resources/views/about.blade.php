<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>BinaryWoanderer :: About</title>
		<!--meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);
			
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!--//meta tags ends here-->
		<!--booststrap-->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
		<!--//booststrap end-->
		<!-- font-awesome icons -->
		<link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css" media="all">
		<!-- //font-awesome icons -->
		<!--Shoping cart-->
		<link rel="stylesheet" href="{{asset('css/shop.css')}}" type="text/css" />
		<!--//Shoping cart-->
		<!--stylesheets-->
		<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' media="all">
		<!--login and register-->
		<script src="{{asset('js/login_register.js')}}"></script>
		<!--//login and register-->
	</head>
<body>
		<!--headder-->
		

		<div id="staplesbmincart">
			
			<form method="get" action="{{route('checkout')}}" onsubmit="return confirm('Do you want to place the order?');">

				<button type="button" class="sbmincart-closer" onclick="clickCartIcon()">×</button>
				
				<ul id="cart_list">
					@foreach($cart["products"] as $product_id => $product)

						<li class="sbmincart-item" id="cart_product_{{$product_id}}">
							<div class="sbmincart-details-name"> {{$product["name"]}}
								<ul class="sbmincart-attributes"> </ul>
							</div>
							<div class="sbmincart-details-quantity">
								<!--<input class="sbmincart-quantity" data-sbmincart-idx="0" name="quantity_1" type="text" pattern="[0-9]*" value="{{$product['amount']}}" autocomplete="off"> -->{{$product['amount']}}
							</div>

							<div class="sbmincart-details-remove">
								<a href="{{route('cart_wipe')}}?id={{$product_id}}">
									<button type="button" class="sbmincart-remove" data-sbmincart-idx="0">×</button>
								</a>
							</div>
							<div class="sbmincart-details-price"> 
								<span class="sbmincart-price">
									${{number_format((float)$product["price"], 2, '.', '')}}
								</span> 
							</div>
						</li>
					@endforeach
				</ul>
	
				<div class="sbmincart-footer">
					<div class="sbmincart-subtotal"> Subtotal: $<span id="cart_subtotal">{{number_format((float)$cart["subtotal"], 2, '.', '')}}</span> </div>
					@if($logged)<button type="submit" class="sbmincart-submit" data-sbmincart-alt="undefined">Check Out</button>@endif
				</div>
			</form>
		</div>



		<div class="header-outs" id="home">
		<div class="header-bar">
			<div class="container-fluid">
					<div class="hedder-up row">
						<div class="col-lg-3 col-md-3 logo-head">
							<h1><a class="navbar-brand" href="{{route('main')}}">BinaryWoanderer</a></h1>
						</div>
						<div class="col-lg-5 col-md-6 search-right" style="background-image: url({{asset('images/abs.jpg')}}); opacity: 0.2;">
						</div>
						<div class="col-lg-4 col-md-3 right-side-cart">
							<div class="cart-icons">
								<ul>
									@if(!$logged)
									<li>
										<!--<span class="far fa-user"></span>-->
										<button type="button" data-toggle="modal" data-target="#registerModal"> <span class="far fa-user"></span></button>
									</li>
									<li>
										<button type="button" data-toggle="modal" data-target="#loginModal"> <span class="fas fa-user"></span></button>
									</li>
									@else
									<li>
										{{$username}}
									</li>
									<li>
										<a href="{{route('logout')}}">
											<span class="fas fa-sign-out-alt"></span>
										</a>
									</li>
									<li>
										<a href="{{route('orders')}}">
											<span class="fa fa-truck"></span>
										</a>
									</li>
									@endif
									<li class="toyscart toyscart2 cart cart box_1">
										<button class="top_toys_cart" onclick="clickCartIcon()">
											<span class="fas fa-cart-arrow-down"></span>
										</button>
									</li>
									<li>
										${{number_format((float)$cart["subtotal"], 2, '.', '')}}
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<nav class="navbar navbar-expand-lg navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
						<ul class="navbar-nav ">
							<li class="nav-item">
								<a class="nav-link" href="{{route('main')}}">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item active">
								<a href="{{route('about')}}" class="nav-link">About</a>
							</li>
							<li class="nav-item">
								<a href="{{route('shop')}}" class="nav-link">Shop Now</a>
							</li>
						</ul>
					</div>
				</nav>
		</div>
		 </div>
		<!--//headder-->
		<!-- banner -->
		<div class="inner_page-banner one-img">
		</div>
		<!--//banner -->
		<!-- short -->
		<div class="using-border py-3">
			<div class="inner_breadcrumb  ml-4">
				<ul class="short_ls">
					<li>
						<a href="{{route('main')}}">Home</a>
						<span>/ /</span>
					</li>
					<li>About</li>
				</ul>
			</div>
		</div>
		<!-- //short-->
		<!--About -->
		<section class="about py-lg-4 py-md-3 py-sm-3 py-3">
			<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
				<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">About Us</h3>
				<div class="about-innergrid-agile text-center">
					<h4>Welcome To Our Store</h4>
					<p class="mb-3">
						Quality cheats design to own all the kids in the servers, have a good time, and leave you completely sick of the game for the next few months to come because there is no real joy in having it this easy. You will have no challenge and you will still suck. If you're not cheating cuz you're bad then we salute you, but you're still a pleb cuz you aint coding these godlike cheetos.
					</p>
					<div class=" img-gottem-top">
					</div>
				</div>
				<div class="about-sub-inner text-center mt-lg-4 mt-3">
					<h4>A faster and better way to cheat</h4>
					<div class="row">
						<div class="col-lg-4 col-md-4 abut-gride">
							<span class="fas fa-truck"></span>
							<h5>Shipping</h5>
							<p class="mt-3"> is online, no shipping
							</p>
						</div>
						<div class="col-lg-4 col-md-4 abut-gride">
							<span class="fas fa-phone-volume"></span>  
							<h5>Support</h5>
							<p class="mt-3"> we have a report system for when cheat-breaking patches come out and a forum for all the memes
							</p>
						</div>
						<div class="col-lg-4 col-md-4 abut-gride">
							<span class="fas fa-undo"></span>
							<h5> Return</h5>
							<p class="mt-3"> you can return, but keep in mind we have information about your ingame activities while using the cheat, and logs for anytime the cheat crashes or doesn't work, so returns will be only in the conditions where the service isn't perfect, and we can prove it
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--//about -->
		<!-- footer -->
		<footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
			<div class="copy-agile-right">
				<p> 
					61237  <h6>matrix</h6></a>
				</p>
			</div>
		</footer>
		<!-- //footer -->
		<!-- login dropdown -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="loginModalLabel">Login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="register-form">
							<form action="store/login" method="post" onsubmit="return attemptLogin(this);">
								<div class="fields-grid">
									<div class="styled-input">
										<input type="email" placeholder="Your Email" name="email" required="">
									</div>
									<div class="styled-input">
										<input type="password" placeholder="password" name="password" required="">
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn subscrib-btnn">Login</button>
									<br>
									<span id="errorcode"></span>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- //login dropdown -->
		<!-- register dropdown -->
		<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="registerModalLabel">Register</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="register-form">
							<form action="store/register" method="post" onsubmit="return attemptRegister(this);">
								<div class="fields-grid">
									<div class="styled-input">
										<input type="text" placeholder="Your Username" name="username" required="">
									</div>
									<div class="styled-input">
										<input type="email" placeholder="Your Email" name="email" required="">
									</div>
									<div class="styled-input">
										<input type="password" placeholder="password" name="password" required="">
									</div>
									<div class="styled-input">
										<input type="password" placeholder="repeat password" name="passwordr" required="">
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn subscrib-btnn">Register</button>
									<br>
									<span id="errorcode"></span>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- //register dropdown -->
		<!--js working-->
		<script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
		<!--//js working-->
		<!-- cart-js -->
		<script src="{{asset('js/minicart.js')}}"></script>
		<script>
			toys.render();
			
			toys.cart.on('toys_checkout', function (evt) {
				var items, len, i;
			
				if (this.subtotal() > 0) {
					items = this.items();
			
					for (i = 0, len = items.length; i < len; i++) {}
				}
			});
		</script>
		<!-- //cart-js -->
		<!-- start-smoth-scrolling -->
		<script src="{{asset('js/move-top.js')}}"></script>
		<script src="{{asset('js/easing.js')}}"></script>
		<script>
			jQuery(document).ready(function ($) {
				$(".scroll").click(function (event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 900);
				});
			});
		</script>
		<!-- start-smoth-scrolling -->
		<!-- here stars scrolling icon -->
		<script>
			$(document).ready(function () {
			
				var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear'
				};
			
			
				$().UItoTop({
					easingType: 'easeOutQuart'
				});
			
			});
		</script>
		<!-- //here ends scrolling icon -->
		<!--bootstrap working-->
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
	</body>
</html>