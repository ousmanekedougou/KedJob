@extends('admin.layouts.app')

@section('main-content')

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
                            <h5 class="text-white op-7 mb-2">Plus de  offre d'emplois</h5>
                        </div>
                      
                    </div>
                </div>
            </div>

            <div class="page-inner">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Modal -->
                            

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Nom Complet</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom Complet</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary text-white" data-toggle="modal" data-target="#addRowModal">Message</a>
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                </form>

                                                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header no-bd">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <p class="pl-5 pr-5">
                                                                {{$contact->text}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </td>
                                            <td>
                                                @if($contact->status == 1)
                                                    <span class="btn btn-xs btn-success">Lue</span>
                                                @else
                                                    <span class="btn btn-xs btn-primary">Non lue</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button"  title="" class="btn btn-link btn-danger" data-original-title="Remove" data-toggle="modal" data-target="#addRowModalDestroy-{{ $contact->id }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>

                                                    <div class="modal fade" id="addRowModalDestroy-{{ $contact->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-bd">
                                                                    <h5 class="modal-title">
                                                                        <span class="fw-mediumbold text-center">
                                                                        Suppression du message de  {{$contact->name}}</span>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="{{ route('admin.contact.destroy',$contact->id) }}">
                                                                    {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <input type="hidden" name="option" value="1">
                                                                    <div class="modal-body text-center">
                                                                        <div class="row">
                                                                            <div class="col-md-12 text-center">
                                                                                <p>
                                                                                    Etes vous sure de bien voiloire supprimer ce message
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