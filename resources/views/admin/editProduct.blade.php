@extends('admin.masterLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="mt-4 mb-5"
            style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='%236c757d'/%3E%3C/svg%3E&#34;
          );
        "
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Product
                </li>
            </ol>
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-primary bg-opacity-25 text-primary border-bottom border-primary">
                <div class="card-title p-2 m-0">
                    <h6>Add Product</h6>
                </div>
            </div>
            <div class="card-body">
              <div class="row p-4">
                <div class="col text-center">
                  <img src="{{asset('storage/'.$product->image)}}" width="15%"
                            class="img rounded-circle border p-2 border-primary" alt="" id="img"/>
                </div>
              </div>
                <div class="row">
                    <div class="col-lg-12 py-2 px-4">
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-body row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control mt-2" placeholder="Enter Product name"
                                                name="name" value="{{ $product->name }}" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="cell">Product Image</label>
                                        <input type="file" class="form-control mt-2" name="image" onchange="document.querySelector('#img').src=window.URL.createObjectURL(this.files[0])"/>
                                    </div>
                                </div>
                                <div class="form-body row mt-4">
                                    <div class="col">
                                        <label for="address">Category</label>
                                        <input type="text" class="form-control mt-2" placeholder="Enter Category"
                                            name="category" value="{{ $product->category }}" />
                                    </div>
                                    <div class="col">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="form-control mt-2" placeholder="Enter Quantity"
                                            name="quantity" value="{{ $product->quantity }}" />
                                    </div>
                                </div>
                                <div class="form-body row mt-4">
                                    <div class="col">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control mt-2" placeholder="Enter Price"
                                            name="price" value="{{ $product->price }}" />
                                    </div>
                                    <div class="col">
                                        <label for="unit">Unit</label>
                                        <input type="text" class="form-control mt-2" placeholder="Enter Unit"
                                            name="unit" value="{{ $product->unit }}" />
                                    </div>
                                </div>
                                <div class="form-body row mt-4">
                                    <div class="col">
                                        <label for="price" class="mb-2">Description</label>
                                        <textarea name="description" id="" class="form-control" rows="10">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="submit-btn row my-4">
                                    <div class="col text-center">
                                        <input type="submit" value="Update Product" class="btn btn-primary"
                                            name="upload" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
