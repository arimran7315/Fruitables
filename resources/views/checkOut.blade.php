@extends('masterLayout.layout')
@section('content')
    <div
        class="container-fluid page-header py-5"style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('images/cart-page-header-img.jpg') }}');">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
                <a class="text-primary" href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a class="text-primary" href="#">Pages</a>
            </li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <x-form action="{{ route('cart.update', Auth::user()->id) }}" method="PUT">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Full Name<sup>*</sup></label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Address<sup>*</sup></label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" class="form-control" value="{{ Auth::user()->contact }}">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
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
                                            <td colspan="6" class="text-danger text-center">
                                                <h6>No Product Add to cart Yet</h6>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($products as $product)
                                            <input type="hidden" name="id[]" value="{{ $product->id }}">
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            class="img-fluid rounded-circle"
                                                            style="width: 90px; height: 90px;" alt="">
                                                    </div>
                                                </th>
                                                <td class="py-5">{{ $product->name }}</td>
                                                <td class="py-5">$ {{ $product->price }}</td>
                                                <td class="py-5">{{ $product->quantity }}</td>
                                                <td class="py-5">$ {{ $product->price * $product->quantity }}</td>
                                            </tr>
                                            @php
                                                $total += $product->price * $product->quantity;
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
                                                @endphp </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-4">Shipping</p>
                                        </td>
                                        <td colspan="3" class="py-5">
                                            <div class="form-check text-start opacity-0">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-1" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                            </div>
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-2" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-2">Flat rate: $3.00</label>
                                            </div>
                                            <div class="form-check text-start opacity-0">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                    id="Shipping-3" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-3">Local Pickup:
                                                    $8.00</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$ @php
                                                    if ($total != 0) {
                                                        echo $total + 3;
                                                    } else {
                                                        echo $total;
                                                    }
                                                @endphp
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                        name="Delivery" value="Delivery">
                                    <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div
                            class="row g-4 text-center align-items-center justify-content-center border-bottom py-3 opacity-0">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                        name="Paypal" value="Paypal">
                                    <label class="form-check-label" for="Paypal-1">Paypal</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit"
                                class="side-btn btn border-secondary py-3 px-4 text-uppercase w-100 text-primary"
                                name="placeorder">Place Order</button>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection
