@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid page-header py-5"
        style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('images/cart-page-header-img.jpg') }}');">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
            <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>

    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <x-form action="{{ route('search') }}" method="POST">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="keywords"
                                        aria-describedby="search-icon-1" name="search">
                                    <span id="search-icon-1" class="input-group-text p-3"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </x-form>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @php
                                                $categories = \App\Models\Product::select('category')
                                                    ->distinct()
                                                    ->get()
                                                    ->map(function ($item) {
                                                        return strtolower($item->category);
                                                    })
                                                    ->toArray();

                                                $categoriesCount = [];
                                                foreach ($categories as $category) {
                                                    $count = \App\Models\Product::where('category', $category)->count();
                                                    $categoriesCount[$category] = $count;
                                                }
                                            @endphp

                                            @foreach ($categoriesCount as $category => $count)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a class="text-primary" href="#"><i
                                                                class="fas fa-apple-alt me-2"></i>{{ ucfirst($category) }}</a>
                                                        <span>({{ $count }})</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="{{ asset('images/banner-fruits.jpg') }}" class="img-fluid w-100 rounded"
                                            alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4">
                                @if ($products->isEmpty())
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <h4 class="text-danger">
                                        No result Found!!
                                    </h4>
                                </div>
                                @else
                                    @foreach ($products as $product)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('/storage/' . $product->image) }}"
                                                        class="img-fluid w-100 rounded-top" alt="" />
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
                                @endif
                            </div>
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        {{-- Render pagination links --}}
                                        {{ $products->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
