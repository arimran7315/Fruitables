@extends('masterLayout.layout')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Track Order</h1>
            <x-form action="{{ route('trackOrder') }}" method="POST">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <input type="text" class="form-control" placeholder="Enter order id" name="id">
                        <button type="submit" class="btn btn-primary border-0 my-2" name="track">
                            Track Now
                        </button>
                    </div>
                </div>
            </x-form>
            @if (session('type'))
            <x-alert type="{{session('type')}}" message="{!! session('message') !!}"></x-alert>
            @endif
        </div>
    </div>
@endsection
