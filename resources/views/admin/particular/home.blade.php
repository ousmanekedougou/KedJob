@extends('admin.layouts.app')

@section('main-content')
	<div class="main-panel">
		<div class="content">
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
							<h5 class="text-white op-7 mb-2"></h5>
						</div>
						<div class="ml-md-auto py-2 py-md-0">
							<a data-toggle="modal" data-target="#addRowModal" class="btn btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i> Ajouter un domaine</a>
						</div>
					</div>
				</div>
			</div>
			<div class="page-inner mt-2">
				<!-- Modal -->
				<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header no-bd">
								<h5 class="modal-title">
									<span class="fw-mediumbold">
									Ajouter un nouveau domaine</span>
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="{{ route('admin.addDomaine') }}">
								@csrf
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group form-group-default">
												<label>Nom de la categorie</label>
												<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom Complet">
												@error('name')
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
				<div class="row">
					@foreach($domaines as $domaine)
						<div class="col-12 col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between">
										<div>
											<h5><b>{{ $domaine->name }}</b></h5>
										</div>
										<h5 class="fw-bold badge bg-primary text-white">{{$domaine->candidats->count()}} candidats</h5>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0">Qui ont recu des propositions</p>
										<p class="mb-0 badge bg-success text-white"> {{ $propositions->count() }} candidats</p>
									</div>
									<div class="d-flex mt-4 justify-content-between">
										<p class="mb-0 ml-1 mr-1">
											<a href="" data-toggle="modal" data-target="#RowModalCandidat->{{$domaine->id}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Ajouter</a>
											<div class="modal fade" id="RowModalCandidat->{{$domaine->id}}" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header no-bd">
															<h5 class="modal-title">
																<span class="fw-mediumbold">
																Ajouter un candidat</span>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form method="POST" action="{{ route('admin.addCandidat',$domaine->id) }}" enctype="multipart/form-data">
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
																	<div class="col-md-6 pr-0">
																		<div class="form-group form-group-default">
																			<label>Date de naissance</label>
																			<input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" placeholder="Numero de teledate">
																			@error('date')
																				<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																				</span>
																			@enderror
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group form-group-default">
																			<label>Lieu de naissance</label>
																			<input id="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror" name="lieu" value="{{ old('lieu') }}" required autocomplete="lieu" placeholder="lieu de naissance">
																			@error('lieu')
																				<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																				</span>
																			@enderror
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group form-group-default">
																			<label>Adresse</label>
																			<input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" placeholder="Votre adresse">
																			@error('adress')
																				<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																				</span>
																			@enderror
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group form-group-default">
																			<label>Le curriculum vitae</label>
																			<input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" required autocomplete="cv" placeholder="Votre cve">
																			@error('cv')
																				<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																				</span>
																			@enderror
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group form-group-default">
																			<label>Le CNI</label>
																			<input id="cni" type="file" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') }}" required autocomplete="cni" placeholder="Votre CNI">
																			@error('cni')
																				<span class="invalid-feedback" role="alert">
																					<strong>{{ $message }}</strong>
																				</span>
																			@enderror
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-check">
																			<label>Type de demande</label><br />
																			<label class="form-radio-label btn btn-success btn-xs text-white">
																				<input id="type" class="form-radio-input" type="radio" name="type"
																					value="0" class="@error('type') is-invalid @enderror">
																				<span class="form-radio-sign">Emploi</span>
																			</label>
																			<label class="form-radio-label ml-3 btn btn-primary btn-xs text-white">
																				<input id="type" class="form-radio-input" type="radio" name="type"
																					value="1" class="@error('type') is-invalid @enderror">
																				<span class="form-radio-sign">Stage</span>
																			</label>
																			@error('type')
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
										</p>
										<p class="mb-0 ml-1">
											<a href="{{ route('admin.showCandidat',$domaine->id) }}"
											 class="btn btn-primary btn-xs"
											><i class="fa fa-users"></i></a>
											
										</p>
										
										<p class="mb-0 ml-1 mr-1">
											<a href="" data-toggle="modal" data-target="#addRowModalEdite-{{ $domaine->id }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
											<div class="modal fade" id="addRowModalEdite-{{ $domaine->id }}" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header no-bd">
															<h5 class="modal-title">
																<span class="fw-mediumbold">
																Modifier le domaine {{ $domaine->name }}</span>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form method="POST" action="{{ route('admin.updateDomaine',$domaine->id) }}">
															@csrf
															@method('PUT')
															<div class="modal-body">
																<div class="row">
																	<div class="col-sm-12">
																		<div class="form-group form-group-default">
																			<label>Nom de la categorie</label>
																			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $domaine->name }}" required autocomplete="name" autofocus placeholder="Nom Complet">
																			@error('name')
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
										</p>
										
										<p class="mb-0 ">
											<a href="" data-toggle="modal" data-target="#RowModalDelete-{{ $domaine->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
											<div class="modal fade" id="RowModalDelete-{{ $domaine->id }}" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header no-bd">
															<h5 class="modal-title">
																<span class="fw-mediumbold text-center">
																Suppression de  {{$domaine->name}}</span>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form method="POST" action="{{ route('admin.destroyDomaine',$domaine->id) }}">
															{{ csrf_field() }}
																{{ method_field('DELETE') }}
															<div class="modal-body text-center">
																<div class="row">
																	<div class="col-md-12 text-center">
																		<p>
																			Etes vous sure de bien voiloire supprimer {{$domaine->name}}
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
										</p>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		
	</div>

	
@endsection
