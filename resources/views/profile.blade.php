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
            <form action="#">
                <div class="row g-5">
                    <div class="col-md-2 col-lg-4 col-xl-4">
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="form-item w-100">
                                    <ul>
                                        <li>
                                            <a href="{{ route('cart.index') }}" class="text-primary">
                                                <h6>
                                                    Previous Order
                                                </h6>
                                            </a>
                                        </li>
                                        <li class="border-top">
                                            <a href="{{ route('editProfile') }}" class="text-primary">
                                                <h6 class="my-2">
                                                    Personal Information
                                                </h6>
                                            </a>
                                        </li>
                                        <li class="mt-2 border-top">
                                            <a href="{{ route('logout') }}" class="text-primary">
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if ($products->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-danger text-center">
                                                <h6>No item to show</h6>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{asset('storage/'.$product->image)}}"
                                                        class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                        alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{$product->name}}</td>
                                            <td class="py-5">$ {{$product->price}}</td>
                                            <td class="py-5"> {{$product->quantity}} </td>
                                            <td class="py-5">$ {{$product->price * $product->quantity+3}} </td>
                                        </tr>
                                        @php
                                            $total += $product->price * $product->quantity+3;
                                        @endphp
                                        @endforeach
                                    @endif

                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Subtotal</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$ @php
                                                    echo $total;
                                                @endphp</p>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
