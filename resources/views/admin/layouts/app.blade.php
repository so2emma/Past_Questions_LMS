<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title  --}}
    <title>Admin @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>


    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        @auth('admin')
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="{{ route('admin.dashboard') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('dashboard')">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span></a>
                        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action py-4 fw-bold @yield('user')"><i
                                class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                        <a href="{{ route('admin.sessions.index') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('session')"><i
                            class="fa-solid fa-calendar-days me-3"></i><span>Sessions</span></a>
                        <a href="{{ route('admin.courses.index') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('course')"><i
                                class="fa-solid fa-graduation-cap me-3"></i><span>Courses</span></a>
                        <a href="{{ route('admin.questions.index') }}"
                            class="list-group-item list-group-item-action py-4 fw-bold @yield('question')">
                            <i class="fa-solid fa-scroll me-3"></i><span>Questions</span></a>
                        <a href="#" class="list-group-item list-group-item-action py-4 fw-bold "><i
                                class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
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
                <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                    TESLAS
                </a>

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    @guest('admin')
                        {{-- Login  --}}
                        <li class="nav-item">
                            <a class="nav-link @yield('login')" aria-current="page"
                                href="{{ route('admin.login') }}">Login</a>
                        </li>
                    @endguest

                    <!-- Icon -->
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    @auth('admin')
                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        class="d-none">
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
</body>

</html>
