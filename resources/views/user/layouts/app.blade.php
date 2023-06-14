<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title  --}}
    <title>User @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom CSS --}}
    @yield('css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>


    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        @auth('web')
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="{{ route('user.dashboard') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('dashboard')">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                        </a>
                        <a href="{{ route('user.available.course') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('enrol')"><i
                                class="fas fa-users fa-fw me-3"></i><span>Enrollement</span>
                        </a>
                        <a href="{{ route('user.enrolled.course') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('courses')"><i
                                class="fa-solid fa-calendar-days me-3"></i><span>Courses</span>
                        </a>
                        <a href="{{ route('user.submissions.index', ['user' => Auth::guard('web')->user()->id]) }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('submissions')"><i
                                class="fa-solid fa-calendar-days me-3"></i><span>Submissions</span>
                        </a>

                        <a href="{{ route('user.submission.grade.index') }}" class="list-group-item list-group-item-action py-4 fw-bold @yield('gradings')"><i
                                class="fa-solid fa-calendar-days me-3"></i><span>Gradings</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-4 fw-bold "><i
                                class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                    </div>
                </div>
            </nav>
        @endauth
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Toggle button -->
                <button class="navbar-toggler m-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Brand -->
                <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">
                    TESLAS
                </a>

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    @guest('web')
                        {{-- Login  --}}
                        <li class="nav-item">
                            <a class="nav-link @yield('login')" aria-current="page" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest

                    <!-- Icon -->
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    @auth('web')
                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('web')->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failure'))
                <div class="alert alert-danger">
                    {{ session('failure') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>

        {{-- Custom js --}}
        @yield('js')
</body>

</html>
