<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>register</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>
  <body>
    <div class="main">
     <x-form action="{{route('registerFunction')}}" method="POST">
     <div class="row">
        <div class="col-lg-4 p-lg-5 form-login">
          <div class="container mt-3 px-5">
            <div class="text-center">
              <img src="{{ asset('admin/assets/images/logicblazelogo.png') }}" width="60%"
                  alt="">
          </div>
            <h4 class="pt-3">Welcome &#128075;</h4>
            <div class="form-field">
              <div class="form-group mt-4">
                <label for="Name">Full Name</label>
                <input
                  type="text"
                  class="form-control @error('name')
                    is-invalid
                  @enderror"
                  placeholder="Enter Full Name"
                  name="name"
                  required
                  value="{{old('name')}}"
                />
                @error('name')
                  <p class="text-danger">
                    {{$message}}
                  </p>
                @enderror
              </div>
              <div class="form-group mt-4">
                <label for="username">Username</label>
                <input
                  type="email"
                  class="form-control @error('email')
                    is-invalid
                  @enderror"
                  placeholder="Enter Your Email"
                  name="email"
                  required
                  value="{{old('email')}}"
                />
                @error('email')
                  <p class="text-danger">
                    {{$message}}
                  </p>
                @enderror
              </div>
              <div class="form-group mt-4">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control @error('password')
                    is-invalid
                  @enderror"
                  placeholder="Enter Email"
                  name="password"
                  required
                />
                @error('password')
                  <p class="text-danger">
                    {{$message}}
                  </p>
                @enderror
              </div>
              <div class="form-group mt-4">
                <label for="Confirm Password">Confirm Password</label>
                <input
                  type="password" 
                  class="form-control @error('password')
                    is-invalid
                  @enderror"
                  placeholder="Confirm password"
                  name="password_confirmation"
                  required
                />
                @error('password')
                <p class="text-danger">
                  {{$message}}
                </p>
                @enderror
              </div>
              <div class="forget-pass mt-2">
                <a href="{{route('loginPage')}}">Already have an Account?</a>
              </div>
            </div>
            <div class="container">
              
              <div class="submit-btn row mt-2">
                <button class="btn btn-primary border-0" type="submit" name="signup"> Register </button>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col"><hr /></div>
              <div class="col"><hr /></div>
            </div>
          </div>
        </div>
        <div class="login-img col-lg-8 p-5 text-center">
          <img src="{{asset('assets/images/login-img.png')}}" width="70%" alt="" />
        </div>
      </div>
     </x-form>
    </div>

   {{-- footerLinks Start --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
