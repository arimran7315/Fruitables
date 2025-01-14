@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid py-5 mb-5 bg-img">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                    <h1 class="mb-5 display-3 text-primary">
                        Organic Veggies &amp; Fruits Foods
                    </h1>
                    <x-form action="{{route('search')}}" method="POST">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="search"
                                placeholder="Search" name="search" />
                            <button type="submit"
                                class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                                style="top: 0; right: 25%">
                                Submit Now
                            </button>
                        </div>
                    </x-form>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative pointer-event" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item rounded carousel-item-next carousel-item-start">
                                <img src="images/img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded"
                                    alt="First slide" />
                                <a href="{{ route('admin.index') }}" class="btn px-4 py-2 text-white rounded">Fruites</a>
                            </div>
                            <div class="carousel-item rounded active carousel-item-start">
                                <img src="images/img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide" />
                                <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card featured" style="width: 18rem">
                    <div class="card-body">
                        <i class="fa-solid fa-car-side"></i>
                        <h5 class="card-title">Free Shiping</h5>
                        <p class="card-text">Free on order over $300</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card featured" style="width: 18rem">
                    <div class="card-body">
                        <i class="fa-solid fa-user-shield"></i>
                        <h5 class="card-title">Security Payment</h5>
                        <p class="card-text">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card featured" style="width: 18rem">
                    <div class="card-body">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        <h5 class="card-title">30 Day Return</h5>
                        <p class="card-text">30 day money guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card featured" style="width: 18rem">
                    <div class="card-body">
                        <i class="fa-solid fa-phone"></i>
                        <h5 class="card-title">24/7 Support</h5>
                        <p class="card-text">Support every time fast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <h1>Our Organic Products</h1>
            </div>
            <div class="col-lg-8">
                <button class="btn btn-light bg-secondary rounded-pill m-2 py-2">
                    All Products
                </button>
                <button class="btn btn-light rounded-pill m-2 py-2">
                    Vegetables
                </button>
                <button class="btn btn-light rounded-pill m-2 py-2">Fruits</button>
                <button class="btn btn-light rounded-pill m-2 py-2">Bread</button>
                <button class="btn btn-light rounded-pill m-2 py-2">Meat</button>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                            <img src="{{ asset('/storage/' . $product->image) }}" class="img-fluid w-100 rounded-top"
                                alt="" />
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                            style="top: 10px; left: 10px">
                            {{ $product->category }}
                        </div>
                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                            <h4>{{ $product->name }}</h4>
                            <p>
                                {{ $product->description }}
                            </p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="fs-5 fw-bold mb-2">$ {{ $product->price }}</p>
                                <div class="row text-center">
                                    <div class="col">
                                        @if (Auth::check())
                                            <div class="row">
                                                <div class="col">
                                                    <a href="javascript:void(0)"
                                                        onclick="addtocart({{ $product->id }},{{ Auth::user()->id }})"
                                                        class="btn border border-secondary rounded-pill px-4 text-primary"><i
                                                            class="fa fa-shopping-bag text-primary"></i></a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="btn border border-secondary rounded-pill px-4 text-primary"><i
                                                            class="fa fa-eye text-primary"></i></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('loginPage') }}"
                                                        class="btn border border-secondary rounded-pill px-4 text-primary"><i
                                                            class="fa fa-shopping-bag text-primary"></i></a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('loginPage') }}"
                                                        class="btn border border-secondary rounded-pill px-4 text-primary"><i
                                                            class="fa fa-eye text-primary"></i></a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" id="numberInput" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-secondary rounded border border-secondary">
                            <img src="images/featur-1.jpg" class="img-fluid rounded-top w-100" alt="" />
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-primary text-center p-4 rounded">
                                    <h5 class="text-white">Fresh Apples</h5>
                                    <h3 class="mb-0">20% OFF</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-dark rounded border border-dark">
                            <img src="images/featur-2.jpg" class="img-fluid rounded-top w-100" alt="" />
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-light text-center p-4 rounded">
                                    <h5 class="text-primary">Tasty Fruits</h5>
                                    <h3 class="mb-0">Free delivery</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-primary rounded border border-primary">
                            <img src="images/featur-3.jpg" class="img-fluid rounded-top w-100" alt="" />
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-secondary text-center p-4 rounded">
                                    <h5 class="text-white">Exotic Vegitable</h5>
                                    <h3 class="mb-0">Discount 30$</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                        <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                        <p class="mb-4 text-dark">
                            The generated Lorem Ipsum is therefore always free from
                            repetition injected humour, or non-characteristic words etc.
                        </p>
                        <a href="#"
                            class="buy-btn banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="images/baner-1.png" class="img-fluid w-100 rounded" alt="" />
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                            style="width: 140px; height: 140px; top: 0; left: 0">
                            <h1 style="font-size: 100px; color: rgba(0, 0, 0, 0.707)">1</h1>
                            <div class="d-flex flex-column">
                                <span class="h2 mb-0" style="color: rgba(0, 0, 0, 0.707)">50$</span>
                                <span class="h4 text-muted mb-0">kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px">
                <h1 class="display-4">Bestseller Products</h1>
                <p>
                    Latin words, combined with a handful of model sentence structures,
                    to generate Lorem Ipsum which looks reasonable.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="images/best-product-1.jpg" class="img-fluid rounded-circle w-100"
                                    alt="" />
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#"
                                    class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-eye me-2 text-primary"></i>View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="images/best-product-2.jpg" class="img-fluid rounded-circle w-100"
                                    alt="" />
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#"
                                    class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-eye me-2 text-primary"></i>View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="images/best-product-3.jpg" class="img-fluid rounded-circle w-100"
                                    alt="" />
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#"
                                    class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-eye me-2 text-primary"></i>View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="images/best-product-4.jpg" class="img-fluid rounded-circle w-100"
                                    alt="" />
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#"
                                    class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-eye me-2 text-primary"></i>View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="images/best-product-5.jpg" class="img-fluid rounded-circle w-100"
                                    alt="" />
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#"
                                    class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-eye me-2 text-primary"></i>View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="images/best-product-6.jpg" class="img-fluid rounded-circle w-100"
                                    alt="" />
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#"
                                    class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-eye me-2 text-primary"></i>View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="images/fruite-item-1.jpg" class="img-fluid rounded" alt="" />
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#"
                                class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="images/fruite-item-2.jpg" class="img-fluid rounded" alt="" />
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#"
                                class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="images/fruite-item-3.jpg" class="img-fluid rounded" alt="" />
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#"
                                class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="images/fruite-item-4.jpg" class="img-fluid rounded" alt="" />
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#"
                                class="side-btn btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>satisfied customers</h4>
                            <h1>1963</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality of service</h4>
                            <h1>99%</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality certificates</h4>
                            <h1>33</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>Available Products</h4>
                            <h1>789</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
