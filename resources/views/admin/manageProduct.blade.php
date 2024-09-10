@extends('admin.masterLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="mt-4 mb-5"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </div>
        <div class="container">
            @if (session('type'))
            <x-alert type="{{session('type')}}" message="{!! session('message') !!}"></x-alert>
            @endif
        </div>
        <div class="card border-0 shadow">
            <div class="card-header p-2 bg-info bg-opacity-25 border-bottom border-info text-info">
                <div class="card-title">
                    <h6>Manage Product</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">
                                    @php
                                        echo $count;
                                    @endphp
                                </th>
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{$product->category}}
                                </td>
                                <td>
                                    {{$product->unit}}
                                </td>
                                <td>
                                    {{$product->price}}
                                </td>
                                <td>
                                    {{$product->quantity}}
                                </td>
                                <td>
                                    <x-form action="{{route('product.edit',$product->id)}}" method="GET">
                                        <button class="btn btn-warning">
                                            Edit
                                        </button>
                                    </x-form>
                                    <x-form action="{{route('product.destroy',$product->id)}}" method="DELETE">
                                        <button class="btn btn-danger">
                                            DELETE
                                        </button>
                                    </x-form>
                                </td>
                            </tr>
                            @php
                                $count ++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <div class="row mb-3">
                    <div class="col-12" style="box-shadow: none !important;">
                        <div class="pagination d-flex justify-content-center mt-5">
                            {{-- Render pagination links --}}
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
