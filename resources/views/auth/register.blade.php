@extends('layouts.main')
@section('content')

<section class="vh-100 mt-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <form method="post" action="{{ route('user.register') }}" class="mx-1 mx-md-4">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Full Name</label>
                                            <input type="text" id="form3Example1c" class="form-control" name="name" value="{{ old('name') }}" />
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <input type="email" id="form3Example3c" class="form-control" name="email" value="{{ old('email') }}" />
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <input type="password" id="form3Example4c" name="password" class="form-control" />
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="w-8/12 lg:w-1/2 col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img alt="Image d'un événement Meetup en personne" width="379" height="269" decoding="async" data-nimg="1" style="color: transparent;" srcset="https://secure.meetupstatic.com/next/images/indexPage/irl_event.svg?w=384 1x, https://secure.meetupstatic.com/next/images/indexPage/irl_event.svg?w=828 2x" src="https://secure.meetupstatic.com/next/images/indexPage/irl_event.svg?w=828">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection