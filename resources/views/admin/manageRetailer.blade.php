@extends('admin.masterLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="mt-4 mb-5"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Retailer</li>
            </ol>
        </div>
        <div class="card border-0 shadow">
            <div class="card-header p-2 bg-info bg-opacity-25 border-bottom border-info text-info">
                <div class="card-title">
                    <h6>Manage Retailer</h6>
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
                                    {{$retailer->name}}
                                </td>
                                <td>
                                    {{$retailer->email}}
                                </td>
                                <td>
                                    {{$retailer->contact}}
                                </td>
                                <td>
                                    @if ($retailer->status == 0)
                                    <h6><span class="badge text-bg-danger" class="status">Not Approved</span></h6>
                                    @else
                                    <h6><span class="badge text-bg-success" class="status">Approved</span></h6>
                                    @endif
                                </td>
                                <td>
                                    <x-form action="{{route('retailer.show',$retailer->id)}}" method="GET">
                                        <button class="btn btn-warning">
                                            Edit
                                        </button>
                                    </x-form>
                                    <x-form action="{{route('retailer.destroy',$retailer->id)}}" method="DELETE">
                                        <button class="btn btn-danger">
                                            DELETE
                                        </button>
                                    </x-form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
