@extends('admin.masterLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="mt-4 mb-5"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>
       @if (session('type'))
       <x-alert type="{{session('type')}}" message="{{session('message')}}"></x-alert>
       @endif
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration shadow bg-success bg-opacity-50">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row g-0 w-100">
                            <div class="col-6">
                                <div class="p-3 m-1">
                                    <h4>
                                        Completed Orders
                                    </h4>
                                    <h6 class="mb-0 mt-4">  {{$completeOrders}}</h6>
                                </div>
                            </div>
                            <div class="col-6 align-self-end text-end">
                                <img src="assets/images/customer-support.jpg" class="img-fluid illustration-img"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration shadow">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row g-0 w-100">
                            <div class="col-6">
                                <div class="p-3 m-1">
                                    <h4>
                                        Total Revenue
                                    </h4>
                                    <h6 class="mb-0 mt-4">$ @if (empty($totalSale))
                                        {{'0'}}
                                    @else
                                        {{$totalSale}}
                                    @endif</h6>
                                </div>
                            </div>
                            <div class="col-6 align-self-end text-end">
                                <img src="assets/images/customer-support.jpg" class="img-fluid illustration-img"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @cannot('isAdmin')
        <div class="card border-0 shadow">
            <div class="card-header p-2 bg-info bg-opacity-25 border-bottom border-info text-info">
                <div class="card-title">
                    <h6>New Orders</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Costumer</th>
                            <th>cell</th>
                            <th>Price</th>
                            <th>Order Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->isEmpty())
                            
                        @else
                            @foreach ($orders as $order )
                            <tr>
                                <td>
                                    {{$order->name}}
                                </td>
                                <td>

                                    {{$order->contact}}
                                </td>
                                <td>
                                    {{$order->price}}
                                </td>
                                <td>
                                    {{$order->order_id}}
                                </td>
                                <td>
                                    <h6><span class="badge text-bg-warning" class="status">Not Confirmed</span></h6>
                                </td>
                                <td>
                                    <x-form action="{{route('cart.update',$order->order_id)}}" method="PUT">
                                        <input type="hidden" value="{{$order->email}}" name="email">
                                        <input type="hidden" name="status" value="confirm">
                                        <button class="btn btn-success">
                                            Confirmed
                                        </button>
                                    </x-form>
                                    <x-form action="{{route('cart.update',$order->order_id)}}" method="PUT">
                                        <input type="hidden" value="{{$order->email}}" name="email">
                                        <input type="hidden" name="status" value="reject">
                                        <button class="btn btn-danger">
                                            Reject
                                        </button>
                                    </x-form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-danger bg-opacity-25 border-bottom border-danger text-danger">
                <div class="card-title">
                    <h6>Low Stock product</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isEmpty())
                            <tr class="text-center">
                                <td colspan="6" class="text-success">All Products In stock</td>
                            </tr>
                        @else
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
                                        {{$product->price}}
                                    </td>
                                    <td>
                                        {{$product->category}}
                                    </td>
                                    <td>
                                        {{$product->quantity}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary">
                                            Add Stock
                                        </a>
                                    </td>
                                </tr>
                                @php
                                    $count ++;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @endcannot
        @can('isAdmin')
        <div class="card border-0 shadow">
            <div class="card-header p-2 bg-info bg-opacity-25 border-bottom border-info text-info">
                <div class="card-title">
                    <h6>New Retailer Request</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($retailers as $retailer)
                            <tr>
                                <th scope="row">
                                    @php
                                        echo $count;
                                    @endphp
                                </th>
                                <td>
                                    {{ $retailer->name }}
                                </td>
                                <td>
                                    {{ $retailer->email }}
                                </td>
                                <td>
                                    {{ $retailer->contact }}
                                </td>
                                <td>
                                    @if ($retailer->status == 0)
                                        <x-form action="{{ route('retailer.update', $retailer->id) }}" method="PUT">
                                            <input type="hidden" name="status" value="1">
                                            <button class="badge text-bg-danger btn" class="status">Not Approved</button>

                                        </x-form>
                                    @else
                                        <x-form action="{{ route('retailer.update', $retailer->id) }}" method="PUT">
                                            <input type="hidden" name="status" value="0">
                                            <button class="badge text-bg-success btn" class="status">Approved</button>

                                        </x-form>
                                    @endif
                                </td>
                                <td>
                                    <a href="deleteretailer.php?id=">
                                        <button class="btn btn-danger">
                                            DELETE
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($retailers->isEmpty())
                            <tr>
                                <td colspan="6" class="text-danger text-center">
                                    No Retailers Requests
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @endcan
    </div>
@endsection
