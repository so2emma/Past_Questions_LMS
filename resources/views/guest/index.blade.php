<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/sass/guest.scss', 'resources/js/app.js'])

    <title>TESLAS | Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">TESLAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact Us</a>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth('web')
                        {{-- display name Here --}}
                    @else
                        <li class="m-2">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="m-2">
                            <a class="btn btn-sm btn-primary px-3" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- This is the Jumbotroon Section  --}}
    <section>
        <div id="background" class="py-5">
            <div class="container py-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 p-5 text-justify">
                        <h3 class="display-5 fw-bold">Getting <span class="text-primary">Access</span> to Past Questions
                            is
                            now More <span class="text-primary">Easy</span>.
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold lead text-center">
                            Click Here to Register <span class="text-primary">NOW</span>
                        </p>
                        <div class="text-center">
                            <a href="{{ route('register') }}" class="btn btn-lg fw-bold btn-primary">Register Now.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Next section  --}}
    <section id="intro">
        <div class="py-5">
            <div class="container">
                <div class="row my-5 align-items-center justify-content-between">
                    <div class="col-md-3 left">
                        <h3 class="display-6 fw-bold">Online Learning <span class="text-primary">Designed</span>
                            For Real Life.
                        </h3>
                    </div>
                    <div class="col-md-3">
                        <div class="heading">
                            <div class="mb-3">
                                <i class="bi bi-emoji-smile-fill h1 text-primary"></i>
                            </div>
                            <p class="lead fw-bold fs-3">User Friendly</p>
                        </div>
                        <div class="body ">
                            <p class="lead fs-4">
                                Lorem ipsum dolor sit amet consectetur Lorem, ipsum dolor..
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="heading">
                            <div class="mb-3">
                                <i class="bi bi-emoji-smile-fill h1 text-primary"></i>
                            </div>
                            <p class="lead fw-bold fs-3">User Friendly</p>
                        </div>
                        <div class="body ">
                            <p class="lead fs-4">
                                Lorem ipsum dolor sit amet consectetur Lorem, ipsum dolor..
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>

    <footer class=" text-light bg-primary py-5">
        <div class="container text-center">
            <p>copyright &copy; <span id="year"></span> TESLAS.co</p>
        </div>
    </footer>
    <script>
        //Get the currnt yer for the copyright
        $('#year').text(new Date().getFullYear());
    </script>
</body>

</html>
