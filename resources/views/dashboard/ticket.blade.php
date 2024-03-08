@extends('layouts.dashboard')
@section('dash')



<div style="margin-top: 100px;"></div>
<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter
</button>
<!-- Modal pour Ajouter -->
<div class="modal fade text-dark" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: darkslategrey;" id="addModalLabel">Ajouter un élément</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu du formulaire pour l'ajout -->
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type">
                            <option value="standard">Standard</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix:</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantité:</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                        <input type="hidden" id="event_id" name="event_id" value="{{ $event->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table table-hover">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
            <th scope="col">price</th>
            <th scope="col">quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
        <tr class="">
            <td>{{$ticket->title}}</td>
            <td>{{ $ticket->type }}</td>
            <td>{{$ticket->price}}</td>
            <td>{{$ticket->quantity}}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$ticket->id}}">
                    Delete
                </button>
                <!-- Modal pour Supprimer -->
                <div class="modal fade" id="deleteModal{{$ticket->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: darkslategrey;" id="deleteModalLabel">Supprimer l'élément</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p style="color: darkslategrey;">Êtes-vous sûr de vouloir supprimer cet événement ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <!-- Utilisez un formulaire pour envoyer une requête DELETE -->
                                <form id="deleteForm{{$ticket->id}}" class="delete-ticket-form" action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{$ticket->id}}">
                    Update
                </button>
                <!-- Modal pour Mettre à jour -->
                <div class="modal fade" id="updateModal{{$ticket->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: darkslategrey;" id="updateModalLabel">Mettre à jour l'élément</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenu du formulaire pour la mise à jour -->
                                <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Titre:</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type:</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="standard" {{ $ticket->type == 'standard' ? 'selected' : '' }}>Standard</option>
                                            <option value="vip" {{ $ticket->type == 'vip' ? 'selected' : '' }}>VIP</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Prix:</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ $ticket->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantité:</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $ticket->quantity }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="event_id">ID de l'événement:</label>
                                        <input type="text" class="form-control" id="event_id" name="event_id" value="{{ $ticket->event_id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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

@endsection