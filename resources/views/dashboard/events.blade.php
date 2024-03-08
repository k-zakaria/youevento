@extends('layouts.dashboard')
@section('dash')

<div style="margin-top: 100px;"></div>
<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter
</button>
<!-- Modal pour Ajouter -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: darkslategrey;" id="addModalLabel">Ajouter un élément</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu du formulaire pour l'ajout -->
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" style="color: #000;">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea name="content" id="content" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location_id">Location:</label>
                        <select name="location_id" id="location_id" class="form-control" required>
                            @foreach($data['locations'] as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="categorie_id">Category:</label>
                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                            @foreach($data['categories'] as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <input type="file" name="image" id="image" class="form-control-file">
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
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['events'] as $event)
        <tr class="">
            <td>@if($event->image)
                <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image" style="max-width: 50px;">
                @endif
            </td>
            <td>{{$event->title}}</td>
            <td>{{$event->description}}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$event->id}}">
                    Delete
                </button>
                <!-- Modal pour Supprimer -->
                <div class="modal fade" id="deleteModal{{$event->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                <form id="deleteForm{{$event->id}}" class="delete-event-form" action="{{ route('events.destroy', $event) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{$event->id}}">
                    Update
                </button>
                <!-- Modal pour Mettre à jour -->
                <div class="modal fade" id="updateModal{{$event->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: darkslategrey;" id="updateModalLabel">Mettre à jour l'élément</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenu du formulaire pour la mise à jour -->
                                <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data" style="color: #000;">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <textarea name="content" id="content" class="form-control" required>{{ $event->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="location_id">Location:</label>
                                        <select name="location_id" id="location_id" class="form-control" required>
                                            @foreach($data['locations'] as $location)
                                            <option value="{{ $location->id }}" {{ $event->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="categorie_id">Category:</label>
                                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                                            @foreach($data['categories'] as $category)
                                            <option value="{{ $category->id }}" {{ $event->categorie_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 mb-3">
                                        <label for="image">Image:</label>
                                        <input type="file" name="image" id="image" class="form-control-file">
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

                    <a href="{{route('tickets.index', $event->id)}}" class="btn btn-primary btn-sm">Ticket</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection