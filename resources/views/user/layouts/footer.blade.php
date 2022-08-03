
	<!--==================================================-->
	<!----- Start Techno Subscribe Area ----->
	<!--==================================================-->
	<div class="subscribe_area bg_color pt-30 pb-45">
		<div class="container">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="single_subscribe_contact">
						<div class="subscribe_content_title white text_center pb-30">
							<h2>Abonnez-vous à notre newsletter</h2>
						</div>
						<form action="{{ route('contact.store') }}" method="POST">
							@csrf
							<input type="hidden" name="option" value="2">
							<div class="subscribe_form">
								<input id="email" type="email" data-error="Please enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Votre adress email">

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<div class="help-block with-errors"></div>
							</div>
							<div class="subscribe_form_send">
								<button type="submit" class="btn">
									S'abonner
								</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Subscribe Area ----->
	<!--==================================================-->

	<!--==================================================-->
	<!----- Start Techno Footer Middle Area ----->
	<!--==================================================-->
	<div class="footer-middle pt-95" style="background-image:url(assets/images/call-bg.png)">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widgets-company-info">
						<div class="footer-bottom-logo pb-40">
							{{--<img src="{{asset('user/assets/images/logo.png')}}" alt="" />--}}
							<h1 class="text-white">KedJobs</h1>
						</div>
						<div class="company-info-desc">
							<p>Condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam
								quam nunc, blandit vel, luctus.
							</p>
						</div>
						<div class="follow-company-info pt-3">
							<div class="follow-company-text mr-3">
								<a href="#">
									<p>Suivez-nous</p>
								</a>
							</div>
							<div class="follow-company-icon">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-skype"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widget-nav-menu">
						<h4 class="widget-title pb-4">Autres liens</h4>
						<div class="menu-quick-link-container ml-4">
							<ul id="menu-quick-link" class="menu">
								<li><a href="#">Marketing Strategy</a></li>
								<li><a href="#">Interior Design</a></li>
								<li><a href="#">Digital Services</a></li>
								<li><a href="#">Product Selling</a></li>
								<li><a href="#">Product Design</a></li>
								<li><a href="#">Social Marketing</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widgets-company-info">
						<h3 class="widget-title pb-4">Adresse de la société</h3>
						<div class="company-info-desc">
							<p>Porem awesome dolor sitework amet, consetur acing elit, sed do eiusmod ligal
							</p>
						</div>
						<div class="footer-social-info">
							<p><span>Address :</span>Kedougou - Dalaba</p>
						</div>
						<div class="footer-social-info">
							<p><span>Phone :</span>+221 77 000 00 00</p>
						</div>
						<div class="footer-social-info">
							<p><span>Email:</span>ousmanelaravel@gmail.com</p>
						</div>

					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div id="em-recent-post-widget">
						<div class="single-widget-item">
							<h4 class="widget-title pb-3">Poste populaire</h4>
							<div class="recent-post-item active pb-3">
								<div class="recent-post-image mr-3">
									<a href="#">
										<img width="80" height="80" src="assets/images/recent1.jpg" alt="">
									</a>
								</div>
								<div class="recent-post-text">
									<h6><a href="#">
											Tiktok Illegally collecting data sharing
										</a>
									</h6>
									<span class="rcomment">December 12, 2022</span>
								</div>
							</div>
							<div class="recent-post-item pt-1">
								<div class="recent-post-image mr-3">
									<a href="#">
										<img width="80" height="80" src="assets/images/recent3.jpg" alt="">
									</a>
								</div>
								<div class="recent-post-text">
									<h6><a href="#">
											How can use our latest news by
										</a>
									</h6>
									<span class="rcomment">December 15, 2022</span>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<div class="row footer-bottom mt-70 pt-3 pb-1">
				<div class="col-lg-6 col-md-6">
					<div class="footer-bottom-content">
						<div class="footer-bottom-content-copy">
							<p>Copyright &copy; 2022-{{ Carbon\carbon::now()->year }} KedJobs.Tous les droits sont réservés. </p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="footer-bottom-right">
						<div class="footer-bottom-right-text">
							<a class="absod" href="#">Politique de confidentialité </a>
							<a href="#"> termes & conditions</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Footer Middle Area ----->
	<!--==================================================-->



<!-- jquery js -->
	<script type="text/javascript" src="{{asset('user/assets/js/vendor/jquery-3.2.1.min.js')}}"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>
	<!-- carousel js -->
	<script type="text/javascript" src="{{asset('user/assets/js/owl.carousel.min.js')}}"></script>
	<!-- counterup js -->
	<script type="text/javascript" src="{{asset('user/assets/js/jquery.counterup.min.js')}}"></script>
	<!-- waypoints js -->
	<script type="text/javascript" src="{{asset('user/assets/js/waypoints.min.js')}}"></script>
	<!-- wow js -->
	<script type="text/javascript" src="{{asset('user/assets/js/wow.js')}}"></script>
	<!-- imagesloaded js -->
	<script type="text/javascript" src="{{asset('user/assets/js/imagesloaded.pkgd.min.js')}}"></script>
	<!-- venobox js -->
	<script type="text/javascript" src="{{asset('user/venobox/venobox.js')}}"></script>
	<!-- ajax mail js -->
	<script type="text/javascript" src="{{asset('user/assets/js/ajax-mail.js')}}"></script>
	<!--  testimonial js -->
	<script type="text/javascript" src="{{asset('user/assets/js/testimonial.js')}}"></script>
	<!--  animated-text js -->
	<script type="text/javascript" src="{{asset('user/assets/js/animated-text.js')}}"></script>
	<!-- venobox min js -->
	<script type="text/javascript" src="{{asset('user/venobox/venobox.min.js')}}"></script>
	<!-- isotope js -->
	<script type="text/javascript" src="{{asset('user/assets/js/isotope.pkgd.min.js')}}"></script>
	<!-- jquery nivo slider pack js -->
	<script type="text/javascript" src="{{asset('user/assets/js/jquery.nivo.slider.pack.js')}}"></script>
	<!-- jquery meanmenu js -->
	<script type="text/javascript" src="{{asset('user/assets/js/jquery.meanmenu.js')}}"></script>
	<!-- jquery scrollup js -->
	<script type="text/javascript" src="{{asset('user/assets/js/jquery.scrollUp.js')}}"></script>
	<!-- theme js -->
	<script type="text/javascript" src="{{asset('user/assets/js/theme.js')}}"></script>
			
	<script src="{{ asset ( 'admin/assets/js/toastr-jquery.min.js ') }}"></script>
	<script src="{{ asset ( 'admin/assets/js/toastr.min.js ') }}"></script>
  	{!! Toastr::message() !!}
			

	@section('footersection')
	
	@show