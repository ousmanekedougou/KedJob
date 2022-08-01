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
							<h2>{{$companyfirst->user->name}} vous offres Plus de {{$companys->count()}} offres @if($companyfirst->type == 0) d'emplois @else se stages @endif pour vous servire</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li> <span>Préparer votre succès
F                                       ournir les meilleures solutions informatiques.</span></li>
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
	<!----- Start Techno Flipbox Area ----->
	<!--==================================================-->

	<!--==================================================-->
	<!----- Start Techno Service Area ----->
	<!--==================================================-->
	<div class="service_area bg_color2 pt-85 pb-75">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title text_center mb-55">
						<div class="section_sub_title uppercase mb-3">
							<h6>SERVICES</h6>
						</div>
						<div class="section_main_title">
							<h1>Service We Provide</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
						<div class="section_content_text pt-4">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim advis minim veniam, quis nostrud exercitat</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($companys as $company)
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="service_style_one text_center pt-40 pb-40 pl-3 pr-3 mb-4">
						<div class="service_style_one_icon mb-30">
							<img src="{{ $company->image }}" class="avatar-img rounded-circle" alt="" srcset="">
						</div>
						<div class="service_style_one_title mb-30">
							<h4> <a href="{{ route('company.detail',$company->slug) }}"> {{$company->title}} </a></h4>
						</div>
						<div class="service_style_one_text">
							<p>{{$company->resume}}</p>
						</div>
						<div class="service_style_one_button pt-3">
							<a href="{{ route('company.detail',$company->slug) }}">Voire <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Service Area ----->
	<!--==================================================-->

@endsection

@section('js')

@endsection