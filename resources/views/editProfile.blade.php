@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid page-header py-5"
        style="
background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
  url('images/cart-page-header-img.jpg');
">
        <h1 class="text-center text-white display-6">Profile</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
                <a class="text-primary" href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a class="text-primary" href="#">Profile</a>
            </li>
        </ol>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Dashboard</h1>
            <x-form action="{{route('updateInformation')}}" method="POST">
                <div class="row g-5">
                    <div class="col-md-2 col-lg-4 col-xl-4">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="form-item w-100">
                                    <ul>
                                        <li>
                                            <a href="{{route('cart.index')}}" class="text-primary">
                                                <h6>
                                                    Previous Order
                                                </h6>
                                            </a>
                                        </li>
                                        <li class="border-top">
                                            <a href="{{route('editProfile')}}" class="text-primary">
                                                <h6 class="my-2">
                                                    Personal Information
                                                </h6>
                                            </a>
                                        </li>
                                        <li class="mt-2 border-top">
                                            <a href="{{route('logout')}}" class="text-primary">
                                                <h6 class="my-2">
                                                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> LogOut
                                                </h6>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-8">
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="" class="form-control" readonly
                                        value="{{Auth::user()->email}}" aria-readonly="true" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="" class="form-control"
                                        value="{{Auth::user()->name}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="" class="form-control"
                                        value="{{Auth::user()->address}}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Cell">Cell</label>
                                    <input type="text" name="contact" id="" class="form-control"
                                        value="{{Auth::user()->contact}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 text-center">
                            <div class="col">
                                <input class="btn btn-primary border-0" type="submit" name="update">
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection
