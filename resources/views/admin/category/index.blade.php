@extends('admin.layouts.app')

@section('main-content')

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
                            <h5 class="text-white op-7 mb-2">Plus de {{ $categorys->count() }} offre d'emplois</h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addRowModal"> <i class="fa fa-plus"> </i> Ajouter une categorie</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">DataTables.Net</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tables</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Datatables</a>
							</li>
						</ul>
					</div>
					

						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Title</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Title</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												@foreach($categorys as $category)
												<tr>
                                                    <td>{{ $category->name }}</td>
													<td>
														@if($category->status == 1)
															<span class="btn btn-xs btn-primary">Publique</span>
														@else
														<span class="btn btn-xs btn-info">Non publique</span>
														@endif
													</td>
													<td>
														<div class="form-button-action">
															<button type="button" title="" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#addRowModalEdit-{{ $category->id }}">
																<i class="fa fa-edit"></i>
															</button>

															<div class="modal fade" id="addRowModalEdit-{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold text-center">
																				Modifier le category de {{$category->name}}</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form method="POST" action="{{ route('admin.category.update',$category->id) }}">
																			{{ csrf_field() }}
																			 {{ method_field('PUT') }}
																			<div class="modal-body">
																				<div class="row">
																					<div class="col-sm-12">
																						<div class="form-group form-group-default">
																							<label>Nom Complet</label>
																							<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $category->name}}" required autocomplete="title" autofocus placeholder="Nom Complet">
																							@error('title')
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
                                                                                                <input id="status" class="form-radio-input" type="radio" name="status"
                                                                                                    value="1" class="@error('status') is-invalid @enderror" @if($category->status == 1) checked @endif>
                                                                                                <span class="form-radio-sign">Publier</span>
                                                                                            </label>
                                                                                            <label class="form-radio-label ml-3">
                                                                                                <input id="status" class="form-radio-input" type="radio" name="status"
                                                                                                    value="0" class="@error('status') is-invalid @enderror" @if($category->status == 0) checked @endif>
                                                                                                <span class="form-radio-sign">Plus tard</span>
                                                                                            </label>
                                                                                            @error('status')
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


															<button type="button"  title="" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="modal" data-target="#addRowModalDestroy-{{ $category->id }}">
																<i class="fa fa-times"></i>
															</button>

															<div class="modal fade" id="addRowModalDestroy-{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header no-bd">
																			<h5 class="modal-title">
																				<span class="fw-mediumbold text-center">
																				Suppression de  {{$category->name}}</span>
																			</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<form method="POST" action="{{ route('admin.category.destroy',$category->id) }}">
																			{{ csrf_field() }}
																			 {{ method_field('DELETE') }}
																			 <input type="hidden" name="option" value="1">
																			<div class="modal-body text-center">
																				<div class="row">
																					<div class="col-md-12 text-center">
																						<p>
																							Etes vous sure de bien voiloire supprimer la categorie {{$category->name}}
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


    <!-- la partie insertion des offres d'emplois -->
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Ajouter une nouvelle categorie</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Titre de l'article</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Titre de l'article">
                                    @error('title')
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
                                        <input id="status" class="form-radio-input" type="radio" name="status"
                                            value="1" class="@error('status') is-invalid @enderror">
                                        <span class="form-radio-sign">Publier</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input id="status" class="form-radio-input" type="radio" name="status"
                                            value="0" class="@error('status') is-invalid @enderror">
                                        <span class="form-radio-sign">Plus tard</span>
                                    </label>
                                    @error('status')
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
    <!-- Fin des insertions des offres d'emplois -->

   

@endsection