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
							<h2>
								{{$job->user->name}} vous offres Plus de {{$jobs->count()}} offres @if($job->type == 0) d'emplois @else de stages @endif pour vous servire
							</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li> <span>Préparer votre succès fournir les meilleures solutions informatiques.</span></li>
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
	<!----- Start Techno Service Details Area ----->
	<!--==================================================-->
	
	<div class="service-details pages pt-90 pb-50">
		<div class="container">		
			<div class="row">	
				<div class=" col-lg-4 col-md-5 col-sm-12 col-xs-12">
					<div class="service-details-pn-list">
						<ul>
							@foreach($jobs as $jobSim)
								<li><a href="{{ route('company.detail',$jobSim->slug) }}">{{$jobSim->title}} <span><i class="fa fa-angle-right"></i></span></a></li>
							@endforeach
						</ul>
					</div>
					<div class="service-details-big-button mt-40 mb-40">
						<a href="#"><span class="details-big-content">Présentation de la société <i class="fa fa-long-arrow-right"></i></span></a>
					</div>
					<div class="service-details-pn-about mb-4" style="background-image:url(assets/images/tab1.jpg)" >
						<div class="service-details-pn-about-content pt-35 pb-40 pl-4 pr-4">
							<div class="service-details-pn-about-content-title pb-3">
								<h4>{{$job->user->name}}</h4>
							</div>
							<div class="service-details-pn-about-content-text">
								<p>{{$job->user->about}}</p>
							</div>
							<div class="service-details-pn-about-content-button pt-2">
								<a href="#">Contacter maintenant</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="service-main-details">
								<div class="service-main-details-inner">
									<div class="service-main-details-inner-thumb">
										<img src="{{$job->image}}" alt="" />
									</div>
									<div class="service-main-details-content-title pt-4 pb-3">
										<h3>{{$job->title}}</h3>
									</div>
									<div class="service-main-details-content-text pb-4">
										<p>{{$job->resume}}</p>
									</div>

									<div class="service-main-details-content-text pb-4">
										<p>{{$job->detail}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
							<div class="contact_sm_area pt-8 pb-80">
								<div class="container">
									<div class="row cnt_box align-items-center">
										<div class="quote_wrapper p-3">
											<form  action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
												@csrf
												<input type="hidden" name="type" value="{{ $job->type }}">
												<input type="hidden" name="user_id" value="{{ $job->user->id }}">
												<input type="hidden" name="job_id" value="{{ $job->id }}">
												<div class="row">
													<div class="col-md-12">
														<div class="form-check mb-10">
															<label class="text-secondary text-bold" style="font-weight: bold;">Civilite<span style="color:red;">*</span></label><br />
															<label class="form-radio-label">
																<input id="genre" class="form-radio-input" type="radio" name="genre"
																	value="0" class="@error('genre') is-invalid @enderror">
																<span class="form-radio-sign text-secondary">Femme</span>
															</label>
															<label class="form-radio-label ml-3">
																<input id="genre" class="form-radio-input" type="radio" name="genre"
																	value="1" class="@error('genre') is-invalid @enderror">
																<span class="form-radio-sign text-secondary">Homme</span>
															</label>
															@error('genre')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													
													<div class="col-lg-6">
														<div class="form_box">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Nom Complet <span style="color:red;">*</span> </label>
															<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="">
															@error('name')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form_box ">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary" for="email">Adresse Email <span style="color:red;">*</span> </label>
															<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="">

															@error('email')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form_box">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Numero de telephone <span style="color:red;">*</span> </label>
															<input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="">
															@error('phone')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form_box">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Votre adresse physique <span style="color:red;">*</span> </label>
															<input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus placeholder="">
															@error('adress')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-lg-6">
														<div class="form_box">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Selection votre commune <span style="color:red;">*</span> </label>
															<select id="commune" class="form-control @error('commune') is-invalid @enderror" name="commune" value="{{ old('commune') }}" required autocomplete="commune" autofocus>
																@foreach($departements as $dep)
																	<optgroup label="{{ $dep->name }}">
																		@foreach($dep->communes as $com)
																			<option value="{{ $com->id }}">{{ $com->name }}</option>
																		@endforeach
																	</optgroup>
																@endforeach
															</select>
															@error('commune')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-lg-6">
														<div class="">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Votre image <span style="color:red;">*</span> </label>
															<input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus placeholder="">
															@error('image')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-lg-6">
														<div class="">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Votre CV <span style="color:red;">*</span> </label>
															<input id="cv" type="file" class="@error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" required autocomplete="cv" autofocus placeholder="">
															@error('cv')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-lg-6">
														<div class="">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Votre lettre de motivation <span style="color:red;">*</span> </label>
															<input id="motivation" type="file" class="@error('motivation') is-invalid @enderror" name="motivation" value="{{ old('motivation') }}" required autocomplete="motivation" autofocus placeholder="">
															@error('motivation')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-lg-6">
														<div class="mt-10">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary" >Votre extrait de naissance <span style="color:red;">*</span> </label>
															<input id="extrait" type="file" class="@error('extrait') is-invalid @enderror" name="extrait" value="{{ old('extrait') }}" required autocomplete="extrait" autofocus placeholder="">
															@error('extrait')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>

													<div class="col-lg-6">
														<div class="mt-10">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary">Votre CNI <span style="color:red;">*</span> </label>
															<input id="cni" type="file" class="@error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" required autocomplete="cni" autofocus placeholder="">
															@error('cni')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													
													<div class="col-lg-12">
														<div class="form_box mb-30 mt-30">
															<label style="font-weight: bold; margin-top:5px;margin-bottom:-5px;" class="text-secondary" >Votre profile (Facultatif)</label>
															<textarea name="profil" id="profil" class="form-control @error('profil') is-invalid @enderror" cols="30" rows="10" placeholder="Parlez nous un peut de vous si possible"></textarea>
															@error('profil')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
														<div class="quote_btn text-center">
															<button class="btn" type="submit">Postuler</button>
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
				</div>
				

			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Service Details Area ----->
	<!--==================================================-->

@endsection

@section('js')

@endsection