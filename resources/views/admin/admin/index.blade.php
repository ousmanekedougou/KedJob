@extends('admin.layouts.app')

@section('main-content')


		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
								<h5 class="text-white op-7 mb-2">Tous les administrateurs et entreprise</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a data-toggle="modal" data-target="#addRowModal" class="btn btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i> Ajouter</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					

						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Ajouter un nouvelle administrateur</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="{{ route('register') }}">
													@csrf
													<div class="modal-body">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nom Complet</label>
																	<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom Complet">
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
																		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse Email">

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
																	<input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Numero de telephone">
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
																	<input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" placeholder="Adresse">
																	@error('adress')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-check">
																	<label>Status</label><br />
																	<label class="form-radio-label">
																		<input id="is_admin" class="form-radio-input" type="radio" name="is_admin"
																			value="0" class="@error('is_admin') is-invalid @enderror">
																		<span class="form-radio-sign">Admin</span>
																	</label>
																	<label class="form-radio-label ml-3">
																		<input id="is_admin" class="form-radio-input" type="radio" name="is_admin"
																			value="1" class="@error('is_admin') is-invalid @enderror">
																		<span class="form-radio-sign">Entreprise</span>
																	</label>
																	@error('is_admin')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">
															{{ __('Ajouter') }}
														</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
													</div>
												</form>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Image</th>
													<th>Nom Complet</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Adresse</th>
													<th>Status</th>
													<th>Compte</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Image</th>
													<th>Nom Complet</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Adresse</th>
													<th>Status</th>
													<th>Compte</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												@foreach($admins as $admin)
												<tr>
													<td>
														@if($admin->image != NULL)
														<img src="{{ $admin->image }}" alt="..." class="avatar-img rounded-circle" style="width: 50px;height:50px;">
														@else
														<img src="{{asset('admin/assets/img/profil.jpg')}}" alt="..." class="avatar-img rounded-circle" style="width: 50px;height:50px;">
														@endif
													</td>
													<td>{{$admin->name}}</td>
													<td>{{$admin->email}}</td>
													<td>{{$admin->phone}}</td>
													<td>{{$admin->adress}}</td>
													<td>
														@if($admin->is_admin == 0)
															<span class="btn btn-xs btn-primary">Admin</span>
														@else
														<span class="btn btn-xs btn-info">Entreprise</span>
														@endif
													</td>
													<td>
														@if($admin->is_active == 1)
															<span class="btn btn-xs btn-success">Actif</span>
														@else
															<span class="btn btn-xs btn-danger">Deactive</span>
														@endif
													</td>
													<td>
														<div class="form-button-action">
															<button type="button" title="" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#addRowModalEdit-{{ $admin->id }}">
																<i class="fa fa-edit"></i>
															</button>

															<div class="modal fade" id="addRowModalEdit-{{ $admin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold text-center">
																				Modifier le status de {{$admin->name}}</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form method="POST" action="{{ route('admin.admin.update',$admin->id) }}">
																			{{ csrf_field() }}
																			 {{ method_field('PUT') }}
																			<div class="modal-body">
																				<div class="row">
																					<div class="col-md-12 text-center">
																						<div class="form-check">
																							<label>Status</label><br />
																							<label class="form-radio-label">
																								<input id="is_active" class="form-radio-input" type="radio" name="is_active"
																									value="1" class="@error('is_active') is-invalid @enderror"
																									@if($admin->is_active == 1) checked @endif
																								>
																								<span class="form-radio-sign">Activer</span>
																							</label>
																							<label class="form-radio-label ml-3">
																								<input id="is_active" class="form-radio-input" type="radio" name="is_active"
																									value="0" class="@error('is_active') is-invalid @enderror" @if($admin->is_active == 0) checked @endif>
																								<span class="form-radio-sign">Desactiver</span>
																							</label>
																							@error('is_active')
																								<span class="invalid-feedback" role="alert">
																									<strong>{{ $message }}</strong>
																								</span>
																							@enderror
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


															<button type="button"  title="" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="modal" data-target="#addRowModalDestroy-{{ $admin->id }}">
																<i class="fa fa-times"></i>
															</button>

															<div class="modal fade" id="addRowModalDestroy-{{ $admin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold text-center">
																				Suppression de  {{$admin->name}}</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form method="POST" action="{{ route('admin.admin.destroy',$admin->id) }}">
																			{{ csrf_field() }}
																			 {{ method_field('DELETE') }}
																			<div class="modal-body text-center">
																				<div class="row">
																					<div class="col-md-12 text-center">
																						<p>
																							Etes vous sure de bien voiloire supprimer {{$admin->name}}
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