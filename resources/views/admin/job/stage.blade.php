@extends('admin.layouts.app')

@section('main-content')

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
                            <h5 class="text-white op-7 mb-2">Plus de {{ $stages->count() }} offre de stages</h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addRowModal"> <i class="fa fa-plus"> </i> Ajouter une offre</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner">
                <!-- Customized Card -->
                <h4 class="page-title">Offres de stages</h4>
                <div class="row">
                    @foreach($stages as $stage)
                    <div class="col-md-4">
                        <div class="card card-post card-round">
                            {{--<img class="card-img-top" src="{{Storage::url($stage->image)}}" alt="Image Stage">--}}
                            <img class="card-img-top" src="{{$stage->image}}" alt="Image Stage">
                            <div class="card-body">
                                <div class="d-flex">
                                    
                                    <div class="info-post mr-4">
                                        <p class="username">Date de creation</p>
                                        <p class="date text-muted">{{$stage->created_at}}</p>
                                    </div>
                                     <div class="info-post ml-4">
                                        <p class="username">Date d'expiration</p>
                                        <p class="date text-muted">{{$stage->expiration_at}}</p>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <p class="text-info mb-1" style="width: 100%;display:flex;flex-direction:row;">
                                    <span style="float:left;">
                                        @if($stage->status == 1)
                                            Publique
                                        @else
                                            Non publique
                                        @endif
                                    </span>
                                    <a href="{{ route('admin.job.annonce',$stage->id) }}" style="float:right;margin-left:45%;" class="btn btn-success btn-rounded btn-xs text-white"><i class="fa fa-eye"></i> Annonces</a>
                                </p>
                                <h4 class="">
                                    <a href="">
                                        {{$stage->title}}
                                    </a>
                                </h4>
                                <p class="card-text">{{$stage->resume}}</p>
                                <div class="text-center">
                                    <a href="#" class="btn btn-success btn-rounded btn-xs" data-toggle="modal" data-target="#addRowModalEye-{{$stage->id}}"><i class="fa fa-eye"></i> Details</a>
                                    <a href="#" class="btn btn-primary btn-rounded btn-xs" data-toggle="modal" data-target="#addRowModalUpdate-{{$stage->id}}"><i class="fa fa-edit"></i> Modifier</a>
                                    <a href="#" class="btn btn-danger btn-rounded btn-xs" data-toggle="modal" data-target="#addRowModalDestroy-{{ $stage->id }}"><i class="fa fa-times"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- La partie des modification des offres d'emplois -->
                        <div class="modal fade" id="addRowModalUpdate-{{$stage->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Modifier cette offre</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.job.update',$stage->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
										{{ method_field('PUT') }}
                                        <input type="hidden" name="typeOffre" value="1">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Titre de l'offre</label>
                                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $stage->title }}" required autocomplete="title" autofocus placeholder="Titre de l'offre">
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="date">Date d'expiration de l'offre ( {{$stage->expiration_at}} )</label>
                                                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') ?? $stage->expiration_at}}" autocomplete="date" placeholder="Adresse date">

                                                            @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="image">Image de l'offre</label>
                                                        <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" placeholder="Adresse image">

                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Resume de l'offre (maximum 150 carractere)</label>
                                                        <textarea id="resume" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') ?? $stage->resumer }}" required autocomplete="resume" placeholder="Resume de l'offre (maximum 150 carractere)">
                                                            {{$stage->resume}}
                                                        </textarea>
                                                        @error('resume')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Details de l'offre</label>
                                                        <textarea id="body"  rows="10"  class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') ?? $stage->detail }}" required autocomplete="body" placeholder="Detail de l'offre">
                                                            {{$stage->detail}}
                                                        </textarea>
                                                        @error('body')
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
                                                                value="1" class="@error('status') is-invalid @enderror" @if($stage->status == 1) checked @endif>
                                                            <span class="form-radio-sign">Publier</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input id="status" class="form-radio-input" type="radio" name="status"
                                                                value="0" class="@error('status') is-invalid @enderror" @if($stage->status == 0) checked @endif>
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
                    <!-- Fin de la partie  des modificatins des offres d'emplois -->


                    <!-- la partie de suppression des offres -->
                    <div class="modal fade" id="addRowModalDestroy-{{ $stage->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold text-center">
                                        Suppression de  {{$stage->title}}</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('admin.job.destroy',$stage->id) }}">
                                    {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    <div class="modal-body text-center">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p>
                                                    Etes vous sure de bien voiloire supprimer cette offre : <br> {{$stage->title}}
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
                    <!-- Fin de la partie des modifications des offres -->


                       <!-- la partie d'affichage des details des offres -->
                    <div class="modal fade" id="addRowModalEye-{{$stage->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold text-center">
                                        Detail de  {{$stage->title}}</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="row">
                                        <div class="col-md-12 text-justify">
                                            <p>
                                                {{$stage->detail}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de la partie des affichage desdetatils des offres -->
                    @endforeach

                   

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
                        Ajouter une nouvelle offre d'emploi</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.job.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="typeOffre" value="1">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Titre de l'offre</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Titre de l'offre">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label for="date">Date d'expiration de l'offre</label>
                                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" placeholder="Adresse date">

                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label for="image">Image de l'offre</label>
                                    <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" placeholder="Adresse image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Resume de l'offre (maximum 150 carractere)</label>
                                    <textarea id="resume" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" required autocomplete="resume" placeholder="Resume de l'offre (maximum 150 carractere)">
                                    </textarea>
                                    @error('resume')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Details de l'offre</label>
                                    <textarea id="body"  rows="10"  class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" placeholder="Detail de l'offre">
                                    </textarea>
                                    @error('body')
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