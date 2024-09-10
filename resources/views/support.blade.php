@extends('masterLayout.layout')
@section('content')
<div class="container-fluid page-header py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{asset('images/cart-page-header-img.jpg')}}');">
    <h1 class="text-center text-white display-6">Support</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
      <li class="breadcrumb-item active text-white">Support</li>
    </ol>
  </div>
  <div class="container-fluid py-5">
    <div class="container py-5">
      <h1 class="mb-4">Create Your Ticket</h1>
      <div class="row g-4">
          <div class="col-lg-7">
            <x-form action="{{route('ticketCreate')}}" method="POST">
              <input type="text" class="w-100 form-control border-0 py-3 mb-4 @error('name')
                is-invalid
              @enderror" placeholder="Your Name" name="name" value="{{old('name')}}">
              @error('name')
                <p class="text-danger">
                  {{$message}}
                </p>
              @enderror
              <input type="email" class="w-100 form-control border-0 py-3 mb-4 @error('email')
                is-invalid
              @enderror" placeholder="Enter Your Email" name="email" value="{{old('email')}}">
              @error('email')
              <p class="text-danger">
                {{$message}}
              </p>
              @enderror
              <input type="text" class="w-100 form-control border-0 py-3 mb-4 @error('subject')
                is-invalid
              @enderror" placeholder="Enter Your Subject" name="subject">
              @error('subject')
              <p class="text-danger">
                {{$message}}
              </p>
              @enderror
              <textarea class="w-100 form-control border-0 mb-4 @error('message')
                is-invalid
              @enderror" rows="5" cols="10" placeholder="Your Message" name="message" value="{{old('message')}}"></textarea>
              @error('message')
              <p class="text-danger">
                {{$message}}
              </p>
              @enderror
              <button class="btn-css w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit" name="submit">Submit</button>
            </x-form>
          </div>
          <div class="col-lg-5">
            <h4>Track Your Ticket Status</h4>
            <x-form action="{{route('ticketStatus')}}" method="POST">
              <div class="row">
              <input type="search" class="w-100 form-control py-3 mb-4" placeholder="Ticket Number" name="code">
              </div>
              <div class="row">
                <button class="btn btn-primary border-0" type="submit" name="track">
                  Track Now
                </button>
              </div>
            </x-form>
           <div class="mt-4">
            @if (session('type'))
            <x-alert type="{{session('type')}}" message="{!! session('message') !!}"></x-alert>
            @endif
           </div>
          </div>
        </div>
    </div>
  </div>
@endsection