@extends('layouts.main')
@section('content')

<main>
    <div class="m-5 gap-2 ">
        <img src="{{ asset('img/img1.jpg') }}" alt="Image" class="rounded-3 float-end" style=" height: 50%; width: 50%;">
        <div class=" " style="margin-top: 100px;">
            <h1>Meetup : La plate-forme des relations humaines. L'endroit où les centres d'intérêt donnent naissance à des </h1>
            <p>Votre nouvelle communauté vous attend. Depuis plus de 20 ans, des millions de personnes ont choisi Meetup pour nouer des liens solides en rapport avec leurs centres d'intérêt. Créez un groupe dès aujourd'hui.</p>
            <a class="d-grid gap-2 d-md-flex justify-content-md-center" href="#">
                <button class=" btn btn-primary " taype="submit">creer event</button>
            </a>
        </div>

    </div>
</main>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h3 class="mb-5">Événements à proximité de </h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($data['events'] as $event)
            <div class="col mb-5">
                <div class="card h-100">
                    <img src="{{ $event->image ? asset('storage/' . $event->image) : 'https://c8.alamy.com/compfr/2g7ft6h/parametre-fictif-de-photo-d-avatar-par-defaut-icone-d-image-de-profil-grise-homme-en-t-shirt-2g7ft6h.jpg' }}" alt="{{ $event->title }}">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{$event->title}}</h5>
                            <p>{{$event->description}}</p>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                détail
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="event">
                                                <h2>{{ $event->title }}</h2>
                                                <img src="{{ $event->image_path }}" alt="{{ $event->title }}">
                                                <p>Date: {{ $event->date }}</p>
                                                <p>{{ $event->content }}</p>
                                                @if ($event->categorie)
                                                <p>categorie: {{ $event->location->name }}</p>
                                                @else
                                                <p>categorie: N/A</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<section class="pt-4">
    <div class="container row px-lg-5">
        <h3 class="mb-5">Découvrir les catégories les plus populaires</h3>
        @foreach($data['categories'] as $categorie)
        <div class=" col-md-3  mb-5">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0 ">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-life-preserver" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m6.43-5.228a7.03 7.03 0 0 1-3.658 3.658l-1.115-2.788a4 4 0 0 0 1.985-1.985zM5.228 14.43a7.03 7.03 0 0 1-3.658-3.658l2.788-1.115a4 4 0 0 0 1.985 1.985zm9.202-9.202-2.788 1.115a4 4 0 0 0-1.985-1.985l1.115-2.788a7.03 7.03 0 0 1 3.658 3.658m-8.087-.87a4 4 0 0 0-1.985 1.985L1.57 5.228A7.03 7.03 0 0 1 5.228 1.57zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                    </div>
                    <h5 class="fs-4 fw-bold">{{$categorie->name}}</h5>
                    <p class="mb-0">The h hero header!</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection