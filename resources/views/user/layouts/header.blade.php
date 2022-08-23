<!--==================================================-->
	<!----- Start	Techno Header Top Menu Area Css ----->
	<!--==================================================-->
	<div class="header_top_menu pt-2 pb-2 bg_color">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-8">
					<div class="header_top_menu_address">
						<div class="header_top_menu_address_inner">
							<ul>
								<li><a href="#"><i class="fa fa-envelope-o"></i>ousmanelaravel@gmail.com</a></li>
								<li><a href="#"><i class="fa fa-map-marker"></i>Kedougou - Dalaba</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+221 77 000 00 00</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-4">
					<div class="header_top_menu_icon">
						<div class="header_top_menu_icon_inner">
							<ul>
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-pinterest"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End	Techno Header Top Menu Area Css ----->
	<!--===================================================-->







	<!--==================================================-->
	<!----- Start Techno Main Menu Area ----->
	<!--==================================================-->
	<div id="sticky-header" class="techno_nav_manu d-md-none d-lg-block d-sm-none d-none">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo mt-4">
						<a class="logo_img" href="{{ url('/') }}" title="KedJobs">
							{{--<img src="{{asset('user/assets/images/1.png')}}" alt="" />--}}
							<h1 class="text-primary active dtbtn">KedJobs</h1>
						</a>
						<a class="main_sticky" href="{{ url('/') }}" title="techno">
							{{--<img src="{{asset('user/assets/images/logo.png')}}" alt="KedJobs" />--}}
							<h1 class="text-white">KedJobs</h1>
						</a>
					</div>
				</div>
				<div class="col-md-9">
					<nav class="techno_menu">
						<ul class="nav_scroll">
							<li><a href="{{ url('/') }}">  Acceuil</a></li>
							<li><a href="{{ route('company.index') }}">  Entreprise</a></li>
							<li><a href="">  Anonces</a></li>
							<li><a href=""> Nos Services</a></li>
							{{--<li><a href="{{ route('blog.index') }}">  Blog</a></li>--}}
							<li><a href="{{ route('contact.index') }}">  Contact</a></li>
							{{--
								<li><a href="#contact">Contact</a>
									<ul class="sub-menu">
										<li><a href="contact.html">Contact One</a></li>
										<li><a href="contact-2.html">Contact Two New</a></li>
										<li><a href="contact-3.html">Contact Three New</a></li>
										<li><a href="contact-4.html">Contact Four New</a></li>
										<li><a href="contact-5.html">Contact Five New</a></li>
										<li><a href="contact-6.html">Contact Six New</a></li>
									</ul>
								</li>
							--}}
						</ul>
						<div class="donate-btn-header">
							@guest
							<a class="dtbtn" href="{{ route('login') }}">Se Connecter</a>
							@else
							<a class="btn btn-danger" href="{{ route('logout') }}"
								onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
							>Se Deconnecter</a>
							 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
							@endguest
						</div>
					</nav>

				</div>
			</div>
		</div>
	</div>

	<!----- Techno Mobile Menu Area ----->
	<div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
		<div class="mobile-menu">
			<nav class="techno_menu">
				<ul class="nav_scroll">
					<li><a href="{{ url('/') }}">   Acceuil</a></li>
					<li><a href="{{ route('company.index') }}">  Entreprise</a></li>
					<li><a href="{{ route('company.annonce') }}"> Anonces</a></li>
					{{--<li><a href=""> Nos Services</a></li>--}}
					{{--<li><a href="{{ route('blog.index') }}"> Blog</a></li>--}}
					<li><a href="{{ route('contact.index') }}"> Contact</a></li>
					{{--
					<li><a href="#contact">Contact</a>
						<ul class="sub-menu">
							<li><a href="contact.html">Contact One</a></li>
							<li><a href="contact-2.html">Contact Two New</a></li>
							<li><a href="contact-3.html">Contact Three New</a></li>
							<li><a href="contact-4.html">Contact Four New</a></li>
							<li><a href="contact-5.html">Contact Five New</a></li>
							<li><a href="contact-6.html">Contact Six New</a></li>
						</ul>
					</li>
					--}}
					<li class="">
						@guest
						<a class="" href="{{ route('login') }}"> <i class="fa fa-login"></i> Se Connecter</a>
						@else
						<a class="text-danger" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"
						>Se Deconnecter</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
						@endguest
					</li>
				</ul>
				
			</nav>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Main Menu Area ----->
	<!--==================================================-->