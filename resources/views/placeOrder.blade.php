@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                   <h4 class="text-success">Order has been place Your Order Id is: <span>{{ $code }}</span></h4> 
                </div>
            </div>
        </div>
    </div>
@endsection
