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
								<li><a href="#"><i class="fa fa-envelope-o"></i>example@gmail.com</a></li>
								<li><a href="#"><i class="fa fa-map-marker"></i>24/5, 1st Floor, Kurigram</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+ (1800) 456 7890</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-4">
					<div class="header_top_menu_icon">
						<div class="header_top_menu_icon_inner">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
							<img src="{{asset('user/assets/images/1.png')}}" alt="" />
						</a>
						<a class="main_sticky" href="{{ url('/') }}" title="techno">
							<img src="{{asset('user/assets/images/logo.png')}}" alt="KedJobs" />
						</a>
					</div>
				</div>
				<div class="col-md-9">
					<nav class="techno_menu">
						<ul class="nav_scroll">
							<li><a href="{{ url('/') }}"> <i class="fa fa-home"></i>  Acceuil</a></li>
							<li><a href="{{ route('company.index') }}"> <i class="fa fa-home"></i>  Entreprise</a></li>
							<li><a href="index.html"> <i class="fa fa-home"></i>  Anonces</a></li>
							<li><a href="{{ route('blog.index') }}"> <i class="fa fa-blog"></i>  Blog</a></li>
							<li><a href="{{ route('contact.index') }}"> <i class="fa fa-home"></i>  Contact</a></li>
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
					<li><a href="#home">Home</a>
						<ul class="sub-menu">
							<li><a href="index.html">Home One</a></li>
							<li><a href="#new-demo.html">Added New Demo</a>
								<ul class="sub-menu">
									<li><a href="index-11.html">Home Eleven New</a></li>
									<li><a href="index-12.html">Home Twelve New</a></li>
									<li><a href="index-13.html">Home Thirteen New</a></li>
									<li><a href="data-science.html">Data Science New</a></li>
									<li><a href="machine-learning.html">Machine Learning New</a></li>
									<li><a href="affiliate-intelligent.html">Affiliate Intelligent New</a></li>
									<li><a href="revulation-slider.html">Revulation Slider One</a></li>
									<li><a href="revulation-slider-2.html">Revulation Slider Two</a></li>
									<li><a href="home-dark.html">Dark Version New</a></li>
									<li><a href="index-14.html">Home Animation New</a></li>
									<li><a href="landing-1.html">Landing One New</a></li>
									<li><a href="landing-2.html">Landing Two New</a></li>
									<li><a href="landing-3.html">Landing Three New</a></li>
								</ul>
							</li>
							<li><a href="index-2.html">Home Two</a></li>
							<li><a href="index-3.html">Home Three</a></li>
							<li><a href="index-4.html">Home Four</a></li>
							<li><a href="index-5.html">Home Five</a></li>
							<li><a href="index-6.html">Home Six</a></li>
							<li><a href="index-7.html">Home Seven</a></li>
							<li><a href="index-8.html">Home Eight</a></li>
							<li><a href="index-9.html">Home Nine</a></li>
							<li><a href="index-10.html">Home Ten</a></li>
						</ul>
					</li>
					<li><a href="#company.html">Company</a>
						<ul class="sub-menu">
							<li><a href="about.html">About One</a></li>
							<li><a href="about-2.html">About Two</a></li>
							<li><a href="about-3.html">About Three</a></li>
							<li><a href="team.html">Our Team</a></li>
							<li><a href="team-details.html">Team Details</a></li>
							<li><a href="why-choose-us.html">Whay Choose Us</a></li>
							<li><a href="case-study.html">Case Study</a></li>
							<li><a href="case-study-details.html">Case Study Details</a></li>
							<li><a href="portfolio.html">Portfolio</a></li>
							<li><a href="pricing.html">Pricing</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="404.html">Error</a></li>
						</ul>
					</li>
					<li><a href="#service.html">Services</a>
						<ul class="sub-menu">
							<li><a href="service-1.html">Service One</a></li>
							<li><a href="service-2.html">Service Two</a></li>
							<li><a href="service-3.html">Service Three</a></li>
							<li><a href="service-4.html">Service Four</a></li>
							<li><a href="service-details.html">Service Details</a></li>
						</ul>
					</li>
					<li><a href="#solution.html">IT Solution</a>
						<ul class="sub-menu">
							<li><a href="managed-service.html">Managed IT Service</a></li>
							<li><a href="it-service.html">IT Service</a></li>
							<li><a href="industries.html">Industries</a></li>
							<li><a href="business-solution.html">Business Solution</a></li>
							<li><a href="product-design.html">Product Design</a></li>
							<li><a href="service-details.html">IT Service Details</a></li>
						</ul>
					</li>
					<li><a href="#elements.html">Element</a>
						<ul class="sub-menu">
							<li><a href="service-element.html">Service Box</a></li>
							<li><a href="info-box-element.html">Info Box</a></li>
							<li><a href="team-element.html">Teams</a></li>
							<li><a href="case-study-element.html">Case Study</a></li>
							<li><a href="process-element.html">Process</a></li>
							<li><a href="testimonial-element.html">Testimonials</a></li>
							<li><a href="pricing-element.html">Pricing</a></li>
							<li><a href="counter-element.html">Counters</a></li>
							<li><a href="call-do-action-element.html">Call Do Action</a></li>
							<li><a href="brand-element.html">Brands</a></li>
							<li><a href="blog-element.html">Blogs</a></li>
						</ul>
					</li>
					<li><a href="#blog">Blog </a>
						<ul class="sub-menu">
							<li><a href="blog-gird.html">Blog Gird</a></li>
							<li><a href="blog-list.html">Blog List</a></li>
							<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
							<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
							<li><a href="blog-details.html">Blog Details</a></li>
						</ul>
					</li>
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
				</ul>
			</nav>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Main Menu Area ----->
	<!--==================================================-->