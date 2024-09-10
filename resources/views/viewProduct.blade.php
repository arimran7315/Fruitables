@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded mb-4">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded"
                                        alt="Image">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
                            <p class="mb-3">Category: {{ $product->category }}</p>
                            <h5 class="fw-bold mb-3"> {{ $product->price }} $</h5>
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <p class="mb-4">
                            </p>
                            <p>{{ $product->description }}</p>
                            <p></p>
                            <div class="input-group quantity mb-5" style="width: 100px">
                                <div class="input-group-btn">
                                    <button id="minusBtn" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    id="numberInput" value="1">
                                <div class="input-group-btn">
                                    <button id="plusBtn" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            @if (Auth::check())
                                <button onclick="addtocart({{ $product->id }},{{ Auth::user()->id }})"
                                    class="side-btn btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary" aria-hidden="true"></i> Add to
                                    cart</button>
                            @else
                                <a href="{{ route('loginPage') }}"
                                    class="side-btn btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary" aria-hidden="true"></i> Add to
                                    cart</a>
                            @endif
                        </div>
                        <div class="row">
                            <x-form action="{{ route('addComment') }}" method="POST">
                                <div class="col-lg-12 comment">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" role="tablist">
                                            <button class="nav-link border-white border-bottom-0 active" type="button"
                                                role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">
                                                Description
                                            </button>
                                            <button class="nav-link border-white border-bottom-0" type="button"
                                                role="tab" id="nav-mission-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-mission" aria-controls="nav-mission"
                                                aria-selected="false" tabindex="-1">
                                                Reviews
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="tab-content mb-5">
                                        <div class="tab-pane active show" id="nav-about" role="tabpanel"
                                            aria-labelledby="nav-about-tab">
                                            <p>
                                                The generated Lorem Ipsum is therefore always free from
                                                repetition injected humour, or non-characteristic words
                                                etc. Susp endisse ultricies nisi vel quam suscipit
                                            </p>
                                            <p>
                                                Sabertooth peacock flounder; chain pickerel hatchetfish,
                                                pencilfish snailfish filefish Antarctic icefish goldeye
                                                aholehole trumpetfish pilot fish airbreathing catfish,
                                                electric ray sweeper.
                                            </p>
                                            <div class="px-2">
                                                <div class="row g-4">
                                                    <div class="col-6">
                                                        <div
                                                            class="row bg-light align-items-center text-center justify-content-center py-2">
                                                            <div class="col-6">
                                                                <p class="mb-0">Weight</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0">1 kg</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row text-center align-items-center justify-content-center py-2">
                                                            <div class="col-6">
                                                                <p class="mb-0">Country of Origin</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0">Agro Farm</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row bg-light text-center align-items-center justify-content-center py-2">
                                                            <div class="col-6">
                                                                <p class="mb-0">Quality</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0">Organic</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row text-center align-items-center justify-content-center py-2">
                                                            <div class="col-6">
                                                                <p class="mb-0">Check</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0">Healthy</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row bg-light text-center align-items-center justify-content-center py-2">
                                                            <div class="col-6">
                                                                <p class="mb-0">Min Weight</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0">250 Kg</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="tab-pane" id="nav-mission" role="tabpanel"
                                            aria-labelledby="nav-mission-tab">
                                           @foreach ($comments as $comment )
                                           <div class="d-flex">
                                            <img src="{{ asset('images/avatar.jpg') }}"
                                                class="img-fluid rounded-circle p-3"
                                                style="width: 100px; height: 100px" alt="">
                                            <div class="flex-grow-1">
                                                <p class="mb-2" style="font-size: 14px">
                                                   {{ \Carbon\Carbon::parse($comment->created_at)->format('d-F-Y') }}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>{{$comment->name}}</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                                        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                                        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                                        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <p>
                                                    {{$comment->review}}
                                                </p>
                                            </div>
                                        </div> <br>
                                           @endforeach
                                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="mb-5 fw-bold">Leave a Review</h4>
                                    <div class="row g-4">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <div class="col-lg-6">
                                            <div class="border-bottom rounded">
                                                <input type="text" class="form-control border-0 me-4"
                                                    value="{{ Auth::user()->name }}" id="user_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="border-bottom rounded">
                                                <input type="email" class="form-control border-0"
                                                    placeholder="{{ Auth::user()->email }}" id="user_email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="border-bottom rounded my-4">
                                                <textarea name="review" id="review" class="form-control border-0" cols="30" rows="8"
                                                    placeholder="Your Review*" spellcheck="true"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px">
                                                <i class="fa fa-star text-muted" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        @if (Auth::check())
                                            <button type="submit"
                                                class="btn-css btn border border-secondary text-primary rounded-pill px-4 py-3">Post
                                                Comment</button>
                                        @else
                                            <a href="login.php"
                                                class="btn-css btn border border-secondary text-primary rounded-pill px-4 py-3">Post
                                                Comment</a>
                                        @endif
                                    </div>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <x-form action="{{route('search')}}" method="POST">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="keywords"
                                        aria-describedby="search-icon-1" name="search">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"
                                            aria-hidden="true"></i></span>
                                </div>
                            </x-form>
                            <div class="mb-4">
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
                                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%)">
                                    <h3 class="text-secondary fw-bold">
                                        Fresh <br>
                                        Fruits <br>
                                        Banner
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
