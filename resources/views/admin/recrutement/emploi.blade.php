@extends('admin.layouts.app')

@section('main-content')


		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Tableau de board</h2>
								<h5 class="text-white op-7 mb-2">Vous Comptez {{ $emplois->count() }} demandes d'emplois dont 30 non consulter</h5>
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
												<th>Image</th>
												<th>Nom Complet</th>
												<th>Email</th>
												<th>Telephone</th>
												<th>Adresse</th>
												<th>Demande</th>
												<th>Status</th>
												<th style="width: 10%">Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Image</th>
												<th>Nom Complet</th>
												<th>Email</th>
												<th>Telephone</th>
												<th>Adresse</th>
												<th>Demande</th>
												<th>Status</th>
												<th style="width: 10%">Action</th>
											</tr>
										</tfoot>
										<tbody>
											@foreach($emplois as $emploi)
											<tr>
												<td>
													@if($emploi->image != NULL)
													<img src="{{ Storage::url($emploi->image) }}" alt="..." class="avatar-img rounded-circle" style="width: 50px;height:50px;">
													@else
													<img src="{{asset('admin/assets/img/profil.jpg')}}" alt="..." class="avatar-img rounded-circle" style="width: 50px;height:50px;">
													@endif
												</td>
												<td>{{$emploi->name}}</td>
												<td>{{$emploi->email}}</td>
												<td>{{$emploi->phone}}</td>
												<td>{{$emploi->adress}}</td>
												<td>
													@if($emploi->type == 0)
														<span class="btn btn-xs btn-primary">Emploi</span>
													@else
													<span class="btn btn-xs btn-info">Stage</span>
													@endif
												</td>
												<td>
													@if($emploi->view == 0)
														<span class="btn btn-xs btn-primary">Non vue</span>
													@else
														<span class="btn btn-xs btn-success">Vue</span>
													@endif
												</td>
												<td>
													<div class="form-button-action">
														<button type="button" title="" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#addRowModalEdit-{{ $emploi->id }}">
															<i class="fa fa-eye"></i>
														</button>

														<div class="modal fade" id="addRowModalEdit-{{ $emploi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog modal-lg" role="document">
																<div class="modal-content">
																	<div class="modal-header no-bd">
																		<h3 class="modal-title text-center">
																			<span class="fw-mediumbold">
																			Le profile  de {{$emploi->name}}</span>
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
																								<a class="nav-link active" id="pills-home-tab-nobd-{{$emploi->id}}" data-toggle="pill" href="#pills-home-nobd-{{$emploi->id}}" role="tab" aria-controls="pills-home-nobd-{{$emploi->id}}" aria-selected="true">Profile</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-profile-tab-nobd-{{$emploi->id}}" data-toggle="pill" href="#pills-profile-nobd-{{$emploi->id}}" role="tab" aria-controls="pills-profile-nobd-{{$emploi->id}}" aria-selected="false">curriculum vitae</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-cni-{{$emploi->id}}" data-toggle="pill" href="#pills-contact-cni-{{$emploi->id}}" role="tab" aria-controls="pills-contact-cni-{{$emploi->id}}" aria-selected="false">CNI</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-motivation-{{$emploi->id}}" data-toggle="pill" href="#pills-contact-motivation-{{$emploi->id}}" role="tab" aria-controls="pills-contact-motivation-{{$emploi->id}}" aria-selected="false">motivation</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-extrait-{{$emploi->id}}" data-toggle="pill" href="#pills-contact-extrait-{{$emploi->id}}" role="tab" aria-controls="pills-contact-extrait-{{$emploi->id}}" aria-selected="false">Extrait</a>
																							</li>

																							<li class="nav-item">
																								<a class="nav-link" id="pills-contact-tab-message-{{$emploi->id}}" data-toggle="pill" href="#pills-contact-message-{{$emploi->id}}" role="tab" aria-controls="pills-contact-message-{{$emploi->id}}" aria-selected="false">Message</a>
																							</li>
																						</ul>
																						<div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">

																							<div class="tab-pane fade show active" id="pills-home-nobd-{{$emploi->id}}" role="tabpanel" aria-labelledby="pills-home-tab-nobd-{{$emploi->id}}">
																								<div class="card-body">
																									<div class="d-flex">
																										<div class="avatar">
																											<img src="{{Storage::url($emploi->image)}}" alt="..." class="avatar-img rounded-circle">
																										</div>
																										<div class="info-post ml-2">
																											<p class="username">Prenom et Nom</p>
																											<p class="date text-muted" style="margin-top:-15px;">{{$emploi->name}}</p>
																										</div>

																										<div class="info-post ml-4 ">
																											<p class="username"><i class="fa fa-envelope"></i> Email</p>
																											<p class="date text-muted" style="margin-top:-15px;">{{ $emploi->email }}</p>
																										</div>

																										<div class="info-post ml-4 ">
																											<p class="username"><i class="fa fa-mobile"></i> Telephone</p>
																											<p class="date text-muted" style="margin-top:-15px;">{{ $emploi->phone }}</p>
																										</div>

																										<div class="info-post ml-4 ">
																											<p class="username"><i class="fa fa-location-check"></i> Commune</p>
																											<p class="date text-muted" style="margin-top:-15px;"> {{$emploi->commune->name}} </p>
																										</div>

																										<div class="info-post ml-4 ">
																											<p class="username"><i class="fas fa-location-check"></i> Adress</p>
																											<p class="date text-muted" style="margin-top:-15px;">{{ $emploi->adress }}</p>
																										</div>

																										<div class="info-post ml-4 ">
																											<p class="username"><i class="fa fa-location-check"></i> Demande</p>
																											<p class="date text-muted" style="margin-top:-15px;"> @if($emploi->type == 0) Emploi @else Stage @endif </p>
																										</div>
																									</div>
																									<h6 class="card-title text-left">
																										<a href="#">
																											Presentation
																										</a>
																									</h6>
																									<p class="card-text">
																										@if($emploi->profil != Null)
																											{{$emploi->profil}}
																										@else
																											Pas de profile pour {{$emploi->name}}
																										@endif
																									</p>
																								</div>
																							</div>

																							<div class="tab-pane fade" id="pills-profile-nobd-{{$emploi->id}}" role="tabpanel" aria-labelledby="pills-profile-tab-nobd-{{$emploi->id}}">
																								<embed src="{{ Storage::url($emploi->cv) }}" style="width:100%; height:900px;" frameborder="0">	
																							</div>

																							<div class="tab-pane fade" id="pills-contact-cni-{{$emploi->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-cni-{{$emploi->id}}">
																								<embed src="{{ Storage::url($emploi->cni) }}" style="width:100%; height:900px;" frameborder="0">	
																							</div>

																							<div class="tab-pane fade" id="pills-contact-motivation-{{$emploi->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-motivation-{{$emploi->id}}">
																								<embed src="{{ Storage::url($emploi->motivation) }}" style="width:100%; height:900px;" frameborder="0">	
																							</div>

																							<div class="tab-pane fade" id="pills-contact-extrait-{{$emploi->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-extrait-{{$emploi->id}}">
																								<embed src="{{ Storage::url($emploi->extrait) }}" style="width:100%; height:900px;" frameborder="0">	
																							</div>
																							<div class="tab-pane fade" id="pills-contact-message-{{$emploi->id}}" role="tabpanel" aria-labelledby="pills-contact-tab-message-{{$emploi->id}}">
																								<form method="POST" action="{{ route('admin.admin.update',$emploi->id) }}">
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
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>

																	
																		<div class="modal-footer">
																			<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
																		</div>
																</div>
															</div>
														</div>


														<button type="button"  title="" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="modal" data-target="#addRowModalDestroy-{{ $emploi->id }}">
															<i class="fa fa-times"></i>
														</button>

														<div class="modal fade" id="addRowModalDestroy-{{ $emploi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header no-bd">
																		<h5 class="modal-title">
																			<span class="fw-mediumbold text-center">
																			Suppression de  {{$emploi->name}}</span>
																		</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<form method="POST" action="{{ route('admin.job.destroy',$emploi->id) }}">
																		{{ csrf_field() }}
																			{{ method_field('DELETE') }}
																			<input type="hidden" name="option" value="1">
																		<div class="modal-body text-center">
																			<div class="row">
																				<div class="col-md-12 text-center">
																					<p>
																						Etes vous sure de bien voiloire supprimer {{$emploi->name}}
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