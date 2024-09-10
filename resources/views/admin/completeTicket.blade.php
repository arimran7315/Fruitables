@extends('admin.masterLayout.layout')
@section('content')
    <div class="container-fluid">
        <div class="mt-4 mb-5"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inquiries</li>
            </ol>
        </div>
        <div class="card border-0 shadow">
            <div class="card-header p-2 bg-info bg-opacity-25 border-bottom border-info text-info">
                <div class="card-title">
                    <h6>Completed Inquiries</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Costumer</th>
                            <th>email</th>
                            <th>subject</th>
                            <th>Inquiry Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($tickets as $ticket)
                            <tr>
                                <th scope="row">
                                    @php
                                        echo $count; $count++;
                                    @endphp
                                </th>
                                <td>
                                    {{ $ticket->name}}
                                </td>
                                <td>
                                    {{ $ticket->email}}
                                </td>
                                <td>
                                    {{ $ticket->subject}}
                                </td>
                                <td>
                                    {{ $ticket->code}}
                                </td>
                                <td>
                                    <h6><span class="badge text-bg-success" class="status">Completed</span></h6>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-title="{{$ticket->message}}">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
