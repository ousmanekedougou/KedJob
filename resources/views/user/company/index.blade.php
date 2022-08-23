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
							<h2>Plus de {{$companys->count()}} entreprises en collaboration avec notre plateforme a vos services</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li> <span>Préparer votre succès
									fournir les meilleures solutions de l'information.</span></li>
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

	<div class="flipbox_area pages pt-85 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title text_center mb-55">
						<div class="section_sub_title uppercase mb-3">
							<h6>ENTREPRISES</h6>
						</div>
						<div class="section_main_title">
							<h1>Fournir des offres exclusives</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($companys as $company)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                        <div class="techno_flipbox mb-30">
                            <div class="techno_flipbox_font">
                                <div class="techno_flipbox_inner">
                                    <div class="techno_flipbox_icon">
                                        <div class="icon">
                                            <img src="{{ $company->companyLogo }}" class="avatar-img rounded-circle" alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="flipbox_title">
                                        <h3>{{$company->name}}</h3>
                                    </div>
                                    <div class="flipbox_desc">
                                        <p>{{$company->about}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="techno_flipbox_back " style="background-image:url({{$company->logo}});">
                                <div class="techno_flipbox_inner">
                                    <div class="flipbox_title">
                                        <h3>{{$company->name}}</h3>
                                    </div>
                                    <div class="flipbox_desc">
                                        <p>{{$company->about}}</p>
                                    </div>
                                    <div class="flipbox_button">
                                        <a href="{{ route('company.show',$company->slug) }}">Emplois<i class="fa fa-angle-double-right"></i></a>
                                        <a href="{{ route('company.edit',$company->slug) }}">Stages<i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
			{{ $companys->links('user.layouts.paginate') }}
		</div>
	</div>

@endsection

@section('js')

@endsection