@extends('admin.layouts.app')

@section('main-content')


		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
								<h5 class="text-white op-7 mb-2">Toutes les commune de la region kedougou</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a data-toggle="modal" data-target="#addRowModal" class="btn btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i>
								Ajouter</a>
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
														Ajouter un nouvelle commune</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="{{ route('admin.localite.store') }}">
													@csrf
													<input type="hidden" name="option" value="2">
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
															<div class="col-md-12 text-center">
																<div class="form-check">
																	<label>Departements</label><br />
																	@foreach($departements as $departement)
																	<label class="form-radio-label">
																		<input id="departement" class="form-radio-input" type="radio" name="departement"
																			value="{{ $departement->id }}" class="@error('departement') is-invalid @enderror">
																		<span class="form-radio-sign">{{$departement->name}}</span>
																	</label>
																	@endforeach
																	@error('departement')
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
													<th>Nom Complet</th>
													<th>Departements</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Nom Complet</th>
													<th>Departements</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												@foreach($communes as $commune)
												<tr>
													<td>{{$commune->name}}</td>
													<td>{{$commune->departement->name}}</td>
													<td>
														<div class="form-button-action">
															<button type="button" title="" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#addRowModalEdit-{{ $commune->id }}">
																<i class="fa fa-edit"></i>
															</button>

															<div class="modal fade" id="addRowModalEdit-{{ $commune->id }}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold text-center">
																				Modifier le commune de {{$commune->name}}</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form method="POST" action="{{ route('admin.localite.update',$commune->id) }}">
																			{{ csrf_field() }}
																			 {{ method_field('PUT') }}
																			 <input type="hidden" name="option" value="2">
																			<div class="modal-body">
																				<div class="row">
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Nom Complet</label>
																							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $commune->name}}" required autocomplete="name" autofocus placeholder="Nom Complet">
																							@error('name')
																								<span class="invalid-feedback" role="alert">
																									<strong>{{ $message }}</strong>
																								</span>
																							@enderror
																						</div>
																					</div>
																					<div class="col-md-12 text-center">
																						<div class="form-check">
																							<label>Departements</label><br />
																							@foreach($departements as $departement)
																							<label class="form-radio-label">
																								<input id="departement" class="form-radio-input" type="radio" name="departement"
																									value="{{ $departement->id }}" class="@error('departement') is-invalid @enderror"
																										@if($departement->id == $commune->departement->id) checked @endif
																									>
																								<span class="form-radio-sign">{{$departement->name}}</span>
																							</label>
																							@endforeach
																							@error('departement')
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


															<button type="button"  title="" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="modal" data-target="#addRowModalDestroy-{{ $commune->id }}">
																<i class="fa fa-times"></i>
															</button>

															<div class="modal fade" id="addRowModalDestroy-{{ $commune->id }}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold text-center">
																				Suppression de  {{$commune->name}}</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form method="POST" action="{{ route('admin.localite.destroy',$commune->id) }}">
																			{{ csrf_field() }}
																			 {{ method_field('DELETE') }}
																			<input type="hidden" name="option" value="2">
																			<div class="modal-body text-center">
																				<div class="row">
																					<div class="col-md-12 text-center">
																						<p>
																							Etes vous sure de bien voiloire supprimer le commune {{$commune->name}}
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