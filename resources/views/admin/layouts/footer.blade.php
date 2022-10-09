
<div class="modal fade" id="addRowModal-{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Modifier vos information personnelle</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ route('admin.profile.info') }}">
				@csrf
				 {{ method_field('PUT') }}
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Nom Complet</label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? Auth::user()->name }}"  autocomplete="name" autofocus placeholder="Nom Complet">
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="email">Adresse Email</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::user()->email }}"  autocomplete="email" placeholder="Adresse Email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
							</div>
						</div>
						<div class="col-md-6 pr-0">
							<div class="form-group form-group-default">
								<label>Numero de telephone</label>
								<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? Auth::user()->phone }}"  autocomplete="phone" placeholder="Numero de telephone">
								@error('phone')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Adresse</label>
								<input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') ?? Auth::user()->adress }}"  autocomplete="adress" placeholder="Adresse">
								@error('adress')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<h6 class="text-center btn-block">Votre mot de passe</h6>
						<div class="col-md-6 pr-0">
							<div class="form-group form-group-default">
								<label>Modifier le mot de passe</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="new-password" placeholder="Votre mot de passe">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Confirmer le mot de passe</label>
								<input id="password-confirm" type="password" class="form-control " name="password_confirmation"  autocomplete="new-password" placeholder="Confirmer le mot de passe">
								
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						{{ __('Modifier') }}
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="addRowModalImage-{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Modifier votre image de profile</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ route('admin.profile.image') }}" enctype="multipart/form-data">
				@csrf
				 {{ method_field('PUT') }}
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-3 text-center">
							<div class="avatar-lg text-center">
								<img class="avatar-img rounded-circle" src="{{ Auth::user()->image }}" alt="" srcset="">
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group form-group-default">
								<label>Modifier votre image de profile</label>
								<input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') ?? Auth::user()->image }}"  autocomplete="image" autofocus placeholder="Nom Complet">
								@error('image')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						@if(Auth::user()->is_admin == 1 )
							<div class="col-sm-3 text-center">
								<div class="avatar-lg text-center">
									<img class="avatar-img rounded-circle" src="{{ Auth::user()->companyLogo }}" alt="" srcset="">
								</div>
							</div>
							<div class="col-sm-9">
								<div class="form-group form-group-default">
									<label>Modifier le logo de votre entreprise</label>
									<input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') ?? Auth::user()->companyLogo }}"  autocomplete="logo" autofocus placeholder="Nom Complet">
									@error('logo')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="modal-footer text-center">
					<button type="submit" class="btn btn-primary">
						{{ __('Modifier Image') }}
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!--   Core JS Files   -->
	<script src="{{('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{('assets/js/core/popper.min.js')}}"></script>
	<script src="{{('assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{('assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{('assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{('assets/js/atlantis.min.js')}}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{('assets/js/setting-demo.js')}}"></script>
	<script src="{{('assets/js/demo.js')}}"></script>
	<script>
		Circles.create({
			id: 'circles-1',
			radius: 45,
			value: 60,
			maxValue: 100,
			width: 7,
			text: 5,
			colors: ['#f1f1f1', '#FF9E27'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-2',
			radius: 45,
			value: 70,
			maxValue: 100,
			width: 7,
			text: 36,
			colors: ['#f1f1f1', '#2BB930'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-3',
			radius: 45,
			value: 40,
			maxValue: 100,
			width: 7,
			text: 12,
			colors: ['#f1f1f1', '#F25961'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets: [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines: {
							drawBorder: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							drawBorder: false,
							display: false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<script src="{{ asset ( 'admin/assets/js/toastr-jquery.min.js ') }}"></script>
	<script src="{{ asset ( 'admin/assets/js/toastr.min.js ') }}"></script>
  	{!! Toastr::message() !!}

@section('footersection')
 
 @show