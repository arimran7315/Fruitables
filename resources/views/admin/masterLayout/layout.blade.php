<!doctype html>
<html lang="en" data-bs-theme="dark">
{{-- headerLinks --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('admin//assets/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/92f6898643.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">

</head>

<body>
    <div class="wrapper">
        {{-- sideBar --}}
        <div id="sidebar">
            <div class="sidebar h-100">
                <div class="sidebar-logo text-center">
                    <a href="{{ route('admin.index') }}" style="letter-spacing:5px;">FRUITAbLES</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        {{ ucfirst(Auth::user()->role) }} Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('admin.index')}}" class="sidebar-link"><i class="fa-solid fa-house pe-2"></i>Dashboard</a>
                    </li>
                    @can('isAdmin')
                        <li class="sidebar-item">
                            <a href="{{ route('retailer.index') }}" class="sidebar-link"><i
                                    class="fa-solid fa-users pe-2"></i>Retailers</a>
                        </li>
                    @endcan
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages"
                            data-bs-toggle="collapse" arua-expended="false"> <i
                                class="fa-solid fa-cart-plus pe-2"></i>Product</a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{ route('product.create') }}" class="sidebar-link"><i
                                        class="fa-solid fa-square-plus px-2"></i>Add Product</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('product.index') }}" class="sidebar-link"><i
                                        class="fa-solid fa-square-pen px-2"></i>Manage Product</a>
                            </li>
                        </ul>
                    </li>


                    @cannot('isAdmin')
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#retail"
                                data-bs-toggle="collapse" arua-expended="false"><i
                                    class="fa-solid fa-clipboard-list pe-2"></i>Orders <span id="order"></span></a>
                            <ul id="retail" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{ route('cart.create') }}" class="sidebar-link"><i
                                            class="fa-solid fa-clipboard-check px-2"></i>Inque Orders</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('cart.index') }}" class="sidebar-link"><i
                                            class="fa-solid fa-notes-medical px-2"></i>Completed Order
                                        <span class="order"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcannot
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#inquiry"
                            data-bs-toggle="collapse" arua-expended="false"><i
                                class="fa-solid fa-headset pe-2"></i>Tickets</a>
                        <ul id="inquiry" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('admin.confirmedInquiry')}}" class="sidebar-link"><i
                                        class="fa-solid fa-square-check px-2"></i>New Tickets</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('admin.manageInquiry')}}" class="sidebar-link"><i
                                        class="fa-solid fa-square-pen px-2"></i>Manage Tickets</a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{route('admin.completeTickets')}}" class="sidebar-link"><i
                                        class="fa-solid fa-square-check px-2"></i>Completed Tickets</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main">
            {{-- header --}}
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item align-self-center flex-wrap px-4">
                            <p class="marquee">
                                <span>Hi, <strong>{{ Auth::user()->name }}</strong> &nbsp;&nbsp;&nbsp; </span>
                            </p>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                @if (Auth::user()->image == '')
                                    <img src="{{ asset('admin/assets/images/Profile.jpg') }}"
                                        class="avatar img-fluid rounded-circle" alt="">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                        class="avatar img-fluid rounded-circle" alt="">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.profile') }}" class="dropdown-item">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item border-top">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                @hasSection('content')
                    @yield('content')
                @else
                    Add Content
                @endif
            </main>
            <a href="#" class="theme-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                    <path
                        d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"
                        fill="black" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
                    <path
                        d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278" />
                    <path
                        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                </svg>
            </a>
            {{-- footer --}}
            <footer class="footer border-top">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start p-3">
                            <p class="mb-0">
                                <a href="" class="text-muted">
                                    <strong>{{ Auth::user()->name }} Layout</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- footerLinks --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/approvedretailer.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>


</body>

</html>
