@extends('admin.layouts.app')

@section('main-content')

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
                            <h5 class="text-white op-7 mb-2">Plus de {{ $blogs->count() }} offre d'emplois</h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addRowModal"> <i class="fa fa-plus"> </i> Ajouter un article</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner">
                <!-- Customized Card -->
                <h4 class="page-title">Tous vos articles</h4>
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card card-post card-round">
                            {{--<img class="card-img-top" src="{{Storage::url($blog->image)}}" alt="Image Stage">--}}
                            <img class="card-img-top" src="{{Storage::url($blog->image)}}" alt="Image Stage">
                            <div class="card-body">
                                <div class="d-flex">
                                    
                                    <div class="info-post mr-4">
                                        <p class="username">Date de creation</p>
                                        <p class="date text-muted">{{$blog->created_at}}</p>
                                    </div>
                                     <div class="info-post ml-4">
                                        <p class="username">Date d'expiration</p>
                                        <p class="date text-muted">{{$blog->expiration_at}}</p>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <p class="text-info mb-1" style="width: 100%;display:flex;flex-direction:row;">
                                    <span style="float:left;">
                                        @if($blog->status == 1)
                                            Publique
                                        @else
                                            Non publique
                                        @endif
                                    </span>
                                </p>
                                <h4 class="">
                                    <a href="">
                                        {{$blog->title}}
                                    </a>
                                </h4>
                                <p class="card-text">{{$blog->resume}}</p>
                                <div class="text-center">
                                    <a href="#" class="btn btn-success btn-rounded btn-xs" data-toggle="modal" data-target="#addRowModalEye-{{$blog->id}}"><i class="fa fa-eye"></i> Details</a>
                                    <a href="#" class="btn btn-primary btn-rounded btn-xs" data-toggle="modal" data-target="#addRowModalUpdate-{{$blog->id}}"><i class="fa fa-edit"></i> Modifier</a>
                                    <a href="#" class="btn btn-danger btn-rounded btn-xs" data-toggle="modal" data-target="#addRowModalDestroy-{{ $blog->id }}"><i class="fa fa-times"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- La partie des modification des offres d'emplois -->
                        <div class="modal fade" id="addRowModalUpdate-{{$blog->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <form method="POST" action="{{ route('admin.blog.update',$blog->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
										{{ method_field('PUT') }}
                                        <input type="hidden" name="typeOffre" value="0">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Titre de l'offre</label>
                                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $blog->title }}" required autocomplete="title" autofocus placeholder="Titre de l'offre">
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="date">Date d'expiration de l'offre ( {{$blog->expiration_at}} )</label>
                                                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') ?? $blog->expiration_at}}" autocomplete="date" placeholder="Adresse date">

                                                            @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form_box form-group form-group-default">
                                                        <label class="">Selectioner vos categories <span style="color:red;">*</span> </label>
                                                        <select multiple id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">
                                                            @foreach($blog->categorys as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if($category->id == $blog->id) selected @endif
                                                                >{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form_box form-group form-group-default">
                                                        <label class="">Selectioner vos ettiquetes <span style="color:red;">*</span> </label>
                                                        <select multiple id="tag" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" required autocomplete="tag">
                                                            @foreach($tags as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('tag')
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
                                                        <textarea id="resume" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') ?? $blog->resumer }}" required autocomplete="resume" placeholder="Resume de l'offre (maximum 150 carractere)">
                                                            {{$blog->resume}}
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
                                                        <textarea id="body"  rows="10"  class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') ?? $blog->detail }}" required autocomplete="body" placeholder="Detail de l'offre">
                                                            {{$blog->detail}}
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
                                                                value="1" class="@error('status') is-invalid @enderror" @if($blog->status == 1) checked @endif>
                                                            <span class="form-radio-sign">Publier</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input id="status" class="form-radio-input" type="radio" name="status"
                                                                value="0" class="@error('status') is-invalid @enderror" @if($blog->status == 0) checked @endif>
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
                    <div class="modal fade" id="addRowModalDestroy-{{ $blog->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold text-center">
                                        Suppression de  {{$blog->title}}</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('admin.blog.destroy',$blog->id) }}">
                                    {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    <div class="modal-body text-center">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p>
                                                    Etes vous sure de bien voiloire supprimer cette article : <br> {{$blog->title}}
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
                    <div class="modal fade" id="addRowModalEye-{{$blog->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold text-center">
                                        Detail de  {{$blog->title}}</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="row">
                                        <div class="col-md-12 text-justify">
                                            <p>
                                                {{$blog->detail}}
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
                        Ajouter un nouveau article</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="typeOffre" value="0">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Titre de l'article</label>
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
                                    <label for="date">Date d'expiration de l'article</label>
                                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" placeholder="La date d'expiration de l'article">

                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box form-group form-group-default">
                                    <label class="">Selectioner vos categories <span style="color:red;">*</span> </label>
                                    <select multiple id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">
                                        @foreach($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="col-lg-6">
                                <div class="form_box form-group form-group-default">
                                    <label class="">Selectioner vos ettiquetes <span style="color:red;">*</span> </label>
                                    <select multiple id="tag" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" required autocomplete="tag">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label for="image">Image de l'article</label>
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
                                    <label>Resume de l'article (maximum 150 carractere)</label>
                                    <textarea id="resume" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" required autocomplete="resume" placeholder="Resume de l'article (maximum 150 carractere)">
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
                                    <label>Details de l'article</label>
                                    <textarea id="body"  rows="10"  class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" placeholder="Detail de l'article">
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