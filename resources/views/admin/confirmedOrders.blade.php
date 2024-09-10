@extends('admin.masterLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="mt-4 mb-5"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </div>
        <div class="card border-0 shadow">
            <div class="card-header p-2 bg-info bg-opacity-25 border-bottom border-info text-info">
                <div class="card-title">
                    <h6>Confirmed Orders</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Costumer</th>
                            <th>Cell</th>
                            <th>total</th>
                            <th>Order Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                {{$order->user->name}}
                            </td>
                            <td>
                                {{$order->user->contact}}
                            </td>
                            <td>
                                {{$order->product->price * $order->quantity}}
                            </td>
                            <td>
                                {{$order->order_id}}
                            </td>
                            <td>
                                <h6><span class="badge text-bg-info" class="status">Order in Progress</span></h6>
                            </td>
                            <td>
                                <x-form action="{{route('cart.update',$order->id)}}" method="PUT">
                                    <input type="hidden" name="email" value="{{$order->user->email}}">
                                    <input type="hidden" name="status" id="" value="complete">
                                    <button class="btn btn-warning">
                                        Complete Order
                                    </button>
                                </x-form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
