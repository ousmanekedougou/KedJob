@extends('admin.layouts.app')
<style>
	
</style>
@section('main-content')


		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Tableau de board</h2>
								<h5 class="text-white mb-2 text-center">Vous Comptez {{ $domaine->candidats->count() }} demande(s) de candidature pour <strong class="fw-bold">{{ $domaine->name }}</strong></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="add-row" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Prenom et nom</th>
												<th>Email</th>
												<th>Telephone</th>
												<th>Naissance</th>
												<th>Lieu Naissance</th>
												<th>Adresse</th>
												<th>Type</th>
												<th class="text-center" style="width: 10%">Actions</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Prenom et nom</th>
												<th>Email</th>
												<th>Telephone</th>
												<th>Naissance</th>
												<th>Lieu Naissance</th>
												<th>Adresse</th>
												<th>Type</th>
												<th class="text-center" style="width: 10%">Actions</th>
											</tr>
										</tfoot>
										<tbody>
											@foreach($domaine->candidats as $candidat)
											<tr>
												<td>{{$candidat->name}}</td>
												<td>{{$candidat->email}}</td>
												<td>{{$candidat->phone}}</td>
												<td>{{$candidat->date}}</td>
												<td>{{$candidat->lieu}}</td>
												<td>{{$candidat->adress}}</td>
												<td>
													@if($candidat->type == 0)
														<span class="badge bg-success text-white">Emploi</span>
													@else
														<span class="badge bg-primary text-white">Stage</span>
													@endif
												</td>
												<td>
													<div class="form-button-action">
														<button type="button" title="" class="btn btn-link btn-primary" data-toggle="modal" data-target="#addRowModalEdit-{{ $candidat->id }}">
															<i class="fa fa-eye"></i>
														</button>

														<div class="modal fade" id="addRowModalEdit-{{ $candidat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog modal-lg" role="document">
																<div class="modal-content">
																	<div class="modal-header no-bd">
																		<h3 class="modal-title text-center">
																			<span class="fw-mediumbold">
																			Le candidat {{$candidat->name}}</span>
																		</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-md-12 text-center">
																				<div class="form-check">
																					<ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
																						<li class="nav-item">
																							<a class="nav-link active" id="pills-home-tab-nobd-{{$candidat->id}}" data-toggle="pill" href="#pills-home-nobd-{{$candidat->id}}" role="tab" aria-controls="pills-home-nobd-{{$candidat->id}}" aria-selected="true">Profile</a>
																						</li>

																						<li class="nav-item">
																							<a class="nav-link" id="pills-profile-tab-nobd-{{$candidat->id}}" data-toggle="pill" href="#pills-profile-nobd-{{$candidat->id}}" role="tab" aria-controls="pills-profile-nobd-{{$candidat->id}}" aria-selected="false">curriculum vitae</a>
																						</li>

																						<li class="nav-item">
																							<a class="nav-link" id="pills-contact-tab-cni-{{$candidat->id}}" data-toggle="pill" href="#pills-contact-cni-{{$candidat->id}}" role="tab" aria-controls="pills-contact-cni-{{$candidat->id}}" aria-selected="false">CNI</a>
																						</li>
																						{{--
																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-motivation-{{$candidat->id}}" data-toggle="pill" href="#pills-contact-motivation-{{$candidat->id}}" role="tab" aria-controls="pills-contact-motivation-{{$candidat->id}}" aria-selected="false">motivation</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-extrait-{{$candidat->id}}" data-toggle="pill" href="#pills-contact-extrait-{{$candidat->id}}" role="tab" aria-controls="pills-contact-extrait-{{$candidat->id}}" aria-selected="false">Extrait</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-message-{{$candidat->id}}" data-toggle="pill" href="#pills-contact-message-{{$candidat->id}}" role="tab" aria-controls="pills-contact-message-{{$candidat->id}}" aria-selected="false">Message</a>
																							</li>
																						--}}

																						<li class="nav-item" style="float: right;">
																							<a class="nav-link" id="pills-contact-tab-sendEmail-{{$candidat->id}}" data-toggle="pill" href="#pills-contact-sendEmail-{{$candidat->id}}" role="tab" aria-controls="pills-contact-sendEmail-{{$candidat->id}}" aria-selected="false">Envoyer les fichier</a>
																						</li>
																					</ul>
																					<div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">

																						<div class="tab-pane fade show active" id="pills-home-nobd-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-home-tab-nobd-{{$candidat->id}}">
																							<div class="card-body">
																								<div class="d-flex">
																									<div class="info-post ml-2">
																										<p class="username">Prenom et Nom</p>
																										<p class="date text-muted" style="margin-top:-15px;">{{$candidat->name}}</p>
																									</div>

																									<div class="info-post ml-4 ">
																										<p class="username"><i class="fa fa-envelope"></i> Email</p>
																										<p class="date text-muted" style="margin-top:-15px;">{{ $candidat->email }}</p>
																									</div>

																									<div class="info-post ml-4 ">
																										<p class="username"><i class="fa fa-mobile"></i> Telephone</p>
																										<p class="date text-muted" style="margin-top:-15px;">{{ $candidat->phone }}</p>
																									</div>

																									<div class="info-post ml-4 ">
																										<p class="username"><i class="fa fa-location-check"></i> Date de naissance</p>
																										<p class="date text-muted" style="margin-top:-15px;"> {{ $candidat->date }} </p>
																									</div>

																									<div class="info-post ml-4 ">
																										<p class="username"><i class="fa fa-location-check"></i> Lieu de naissance</p>
																										<p class="date text-muted" style="margin-top:-15px;"> {{ $candidat->lieu }} </p>
																									</div>

																									<div class="info-post ml-4 ">
																										<p class="username"><i class="fas fa-location-check"></i> Adress</p>
																										<p class="date text-muted" style="margin-top:-15px;">{{ $candidat->adress }}</p>
																									</div>

																									
																								</div>
																								<h6 class="card-title text-left">
																									<a href="#">
																										Presentation
																									</a>
																								</h6>
																								<p class="card-text">
																									@if($candidat->profil != Null)
																										{{$candidat->profil}}
																									@else
																										Pas de profile pour {{$candidat->name}}
																									@endif
																								</p>
																							</div>
																						</div>

																						<div class="tab-pane fade" id="pills-profile-nobd-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-profile-tab-nobd-{{$candidat->id}}">
																							<embed src="{{ Storage::url($candidat->cv) }}" style="width:100%; height:900px;" frameborder="0">	
																						</div>

																						<div class="tab-pane fade" id="pills-contact-cni-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-contact-cni-{{$candidat->id}}">
																							<embed src="{{ Storage::url($candidat->cni) }}" style="width:100%; height:900px;" frameborder="0">	
																						</div>
																						{{--
																							<div class="tab-pane fade" id="pills-contact-motivation-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-motivation-{{$candidat->id}}">
																								<embed src="{{ Storage::url($candidat->motivation) }}" style="width:100%; height:900px;" frameborder="0">	
																							</div>

																							<div class="tab-pane fade" id="pills-contact-extrait-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-extrait-{{$candidat->id}}">
																								<embed src="{{ Storage::url($candidat->extrait) }}" style="width:100%; height:900px;" frameborder="0">	
																							</div>
																							<div class="tab-pane fade" id="pills-contact-message-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-message-{{$candidat->id}}">
																								<form method="POST" action="{{ route('admin.admin.update',$candidat->id) }}">
																									{{ csrf_field() }}
																									{{ method_field('PUT') }}
																									<textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="10" placeholder="Envoyer un message de recrutement"></textarea>
																									@error('message')
																										<span class="invalid-feedback" role="alert">
																											<strong>{{ $message }}</strong>
																										</span>
																									@enderror
																								</form>
																							</div>
																						--}}

																						<div class="tab-pane fade" id="pills-contact-sendEmail-{{$candidat->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-sendEmail-{{$candidat->id}}">
																							<form method="POST" action="{{ route('admin.sendemailpropostition',$candidat->id) }}">
																								@csrf
																								<div class="modal-body">
																									<div class="row">
																										
																										<div class="col-sm-12">
																											<div class="form-group form-group-default">
																												<label for="name" class="text-left">Nom complet du recipiendaire</label>
																													<input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nom complet du recipiendaire">

																													@error('name')
																														<span class="invalid-feedback" role="alert">
																															<strong>{{ $message }}</strong>
																														</span>
																													@enderror
																											</div>
																										</div>

																										<div class="col-sm-12">
																											<div class="form-group form-group-default">
																												<label for="email" class="text-left">Adresse Email du recipiendaire</label>
																													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse Email">

																													@error('email')
																														<span class="invalid-feedback" role="alert">
																															<strong>{{ $message }}</strong>
																														</span>
																													@enderror
																											</div>
																										</div>

																										<div class="col-sm-12">
																											<div class="form-group form-group-default">
																												<label class="text-left">Objet du message</label>
																												<input id="objet" type="text" class="form-control @error('objet') is-invalid @enderror" name="objet" value="{{ old('objet') }}" required autocomplete="objet" autofocus placeholder="Objet de votre message">
																												@error('objet')
																													<span class="invalid-feedback" role="alert">
																														<strong>{{ $message }}</strong>
																													</span>
																												@enderror
																											</div>
																										</div>

																										<div class="col-md-12">
																											<div class="form-group form-group-default">
																												<label class="text-left">Message</label>
																												<textarea name="msg" id="msg" class="form-control @error('msg') is-invalid @enderror" cols="30" rows="4" placeholder=""></textarea>
																												@error('msg')
																													<span class="invalid-feedback" role="alert">
																														<strong>{{ $msg }}</strong>
																													</span>
																												@enderror
																											</div>
																										</div>

																										<div class="col-md-12">
																											<div class="form-group form-group-default text-left">
																												<label class="form-label text-left">Les fichiers a envoyer</label>
																												<div class="form-group">
																													<div class="selectgroup selectgroup-pills">
																														@if($candidat->cv != null)
																														<label class="selectgroup-item">
																															<input type="checkbox" @if($candidat->cv != '') checked @endif name="cv" value="{{ Storage::url($candidat->cv) }}"
																																class="selectgroup-input">
																															<span class="selectgroup-button">curriculum vitae <i class="fa fa-file-pdf"></i> </span>
																														</label>
																														@endif
																														@if($candidat->cni != null)
																														<label class="selectgroup-item">
																															<input type="checkbox" @if($candidat->cni != '') checked @endif name="cni" value="{{ Storage::url($candidat->cni) }}"
																																class="selectgroup-input">
																															<span class="selectgroup-button">CNI <i class="fa fa-file-pdf"></i> </span>
																														</label>
																														@endif
																														{{--
																														<label class="selectgroup-item">
																															<input type="checkbox" name="value" value="PHP"
																																class="selectgroup-input">
																															<span class="selectgroup-button">PHP</span>
																														</label>
																														<label class="selectgroup-item">
																															<input type="checkbox" name="value" value="JavaScript"
																																class="selectgroup-input">
																															<span class="selectgroup-button">JavaScript</span>
																														</label>
																														<label class="selectgroup-item">
																															<input type="checkbox" name="value" value="Ruby"
																																class="selectgroup-input">
																															<span class="selectgroup-button">Ruby</span>
																														</label>
																														<label class="selectgroup-item">
																															<input type="checkbox" name="value" value="Ruby"
																																class="selectgroup-input">
																															<span class="selectgroup-button">Ruby</span>
																														</label>
																														<label class="selectgroup-item">
																															<input type="checkbox" name="value" value="C++"
																																class="selectgroup-input">
																															<span class="selectgroup-button">C++</span>
																														</label>
																														--}}
																													</div>
																												</div>
																										</div>
																										
																									</div>
																								</div>
																								<div class="modal-footer">
																									<button type="submit" class="btn btn-primary btn-block">
																										{{ __('Envoyer le message au recipiendaire') }}
																									</button>
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

													<div class="form-button-action">
														<button type="button"  title="" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="modal" data-target="#RowModalDestroy-{{ $candidat->id }}">
															<i class="fa fa-times"></i>
														</button>

														<div class="modal fade" id="RowModalDestroy-{{ $candidat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header no-bd">
																		<h5 class="modal-title">
																			<span class="fw-mediumbold text-center">
																			Suppression de  {{$candidat->name}}</span>
																		</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<form method="POST" action="{{ route('admin.deleteCandidat',$candidat->id) }}">
																		@csrf
																		@method('DELETE')
																		<div class="modal-body text-center">
																			<div class="row">
																				<div class="col-md-12 text-center">
																					<p>
																						Etes vous sure de bien voiloire supprimer {{$candidat->name}}
																					</p>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="submit" class="btn btn-danger">
																				{{ __('Supprimer') }}
																			</button>
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
													
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection


@section('footersection')
 <script src="{{('admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{('admin/assets/js/core/popper.min.js')}}"></script>
	<script src="{{('admin/assets/js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{('admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="{{('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Datatables -->
	<script src="{{('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>
	<!-- Atlantis JS -->
	<script src="{{('admin/assets/js/atlantis.min.js')}}"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{('admin/assets/js/setting-demo2.js')}}"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
 @show