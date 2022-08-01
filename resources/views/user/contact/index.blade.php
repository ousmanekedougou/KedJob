@extends('user.layouts.app',['title' => 'acceuil'])
@section('head')
@endsection
@section('main-content')

<!-- ============================================================== -->
	<!-- Start Techno Breatcome Area -->
	<!-- ============================================================== -->
	<div class="breatcome_area d-flex align-items-center" style="height: 250px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Contact Style Three </h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> <a href="#">
										Pages</a> <i class="fa fa-angle-right"></i> <span>Contact Three</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Techno Breatcome Area -->
	<!-- ============================================================== -->

	<!--==================================================-->
	<!----- Start Techno Contact Area ----->
	<!--==================================================-->
	<div class="main_contact_area style_three pt-80 pb-90">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="section_title text_left mb-50 mt-3">
						<div class="section_sub_title uppercase mb-3">
							<h6>Contact Info</h6>
						</div>
						<div class="section_main_title">
							<h1>Entrer en contact</h1>
						</div>
						<div class="section_title_text pt-2">
							<p>
								Lorem ipsum dolor sit amet cotetur adipi sicing elit, sed do mod tempor incid idunt ut
								labore etdolore emu some the and one baldbe dear sod ales justo sit amet urna auctor
								scele risqu.
							</p>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
					</div>
					<div class="contact_address">
						<div class="contact_address_company mb-3">
							<ul>
								<li><i class="fa fa-envelope-o"></i><span><a href="#">Contact@examplesite.com</a></span>
								</li>
								<li><i class="fa fa-mobile"></i><span> +088 01314 183818</span></li>
								<li><i class="fa fa-map-marker"></i> <span> 245, King Street, New York - 65432
										NY.</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact_from">
						<div class="contact_from_box">
							<div class="contact_title pb-4">
								<h3>Nous Contacter </h3>
							</div>
							<form action="{{ route('contact.store') }}" method="POST">
								@csrf
								<input type="hidden" name="option" value="1">
								<div class="row">
									<div class="col-lg-12">
										<div class="form_box mb-30">
											<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Votre prenom et nom">
											@error('name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form_box mb-30">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Votre adress email">

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form_box mb-30">
											<textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" cols="30" rows="10" placeholder="Votre message"></textarea>
											@error('text')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="quote_btn">
											<button class="btn" type="submit">Envoyer</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Contact Area ----->
	<!--==================================================-->

@endsection

@section('js')

@endsection