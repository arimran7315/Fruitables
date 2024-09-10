@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid page-header py-5"
        style="
background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
  url({{asset('images/cart-page-header-img.jpg')}});
">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
                <a class="text-primary" href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a class="text-primary" href="#">Pages</a>
            </li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @if ($orders->isEmpty())
                        <tr>
                            <td colspan="6" class="text-danger text-center">
                                <h6>No Product Add to cart Yet</h6>
                            </td>
                        </tr>
                        @else
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $order->image) }}" class="img-fluid me-5 rounded-circle"
                                        style="width: 80px; height: 80px;" alt="">
                                        
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">{{$order->name}}</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"> $ {{$order->price}}</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">

                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="{{$order->quantity}}" id="numberInput">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"> $ {{$order->quantity * $order->price}}</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4"
                                    onclick="removeitem({{$order->id}},{{$order->pid}},{{$order->quantity}})">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                        @php
                            $total += $order->quantity * $order->price
                        @endphp
                    @endforeach
                           
                        @endif
                    </tbody>

                </table>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">$ @php
                                    echo $total;
                                @endphp </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Flat rate: @php
                                        if ($total != 0) {
                                           echo '$3.00';
                                        }
                                    @endphp</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">$ @php
                                if($total == 0){
                                    echo 0;
                                }else{
                                echo $total + 3;
                                }
                            @endphp </p>
                        </div>
                        <a href="{{route('cart.edit',Auth::user()->id)}}"
                            class="side-btn btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proceed Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection