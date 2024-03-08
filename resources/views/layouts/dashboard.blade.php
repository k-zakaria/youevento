        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
            <title>YouWiki</title>

        </head>

        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                <div class="container-fluid py-1 px-3 col-11">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        You<span style="font-family: 'Allerta Stencil';">Evento</span>
                    </a>
                    <div class="d-flex gap-3">
                        <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row gap-3">
                            <li class="nav-item navbar__link d-flex justify-content-center align-items-center">
                                <a class="nav-link active" href="/">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                                            <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown d-flex align-items-center dropdown__menu">
                            <button class="bg-white d-flex align-items-center gap-2 rounded-pill px-4 py-2" type="button" data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>

                                <a href="route('events.index')" class="d-flex align-items-center text-decoration-none">
                                    <h6></h6>
                                </a>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow dropdown__list" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="../dashAuteur">myWiki</a></li>
                                <li><a class="dropdown-item" href="dashboard">dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <main class="d-flex w-100 min-vh-100" style="height: auto; color:lightcyan">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 ms-5 me-md-auto link-light text-decoration-none">
                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span class="fs-4 ms-2 ">
                            <span>Menu</span>
                        </span>
                    </a>
                    <hr>
                    <aside class="text-light aside">
                        <ul class="list-unstyled ">
                            <li class="nav-item">
                                <a href="../dashboard" class="nav-link text-white" aria-current="page">Statistique</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link text-white" aria-current="page">Categories</a>
                            </li>
                            <li>
                                <a href="{{route('events.show')}}" class="nav-link text-white">Events</a>
                            </li>
                            <li class="nav-item">
                                <a href="../dashCategory" class="nav-link text-white" aria-current="page">Category</a>
                            </li>
                        </ul>
                    </aside>
                </div>

                <div class="m-3"></div>
                <section class="col-md-9">
                    @yield('dash')
                </section>


                <script src="./assets/validation.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                <!-- Bootstrap JS -->

        </body>

        </html>