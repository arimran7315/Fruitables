<!DOCTYPE html>
<html lang="en">
  {{-- headerLinks --}}
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> Dashboard</title>
    <link rel="shortcut icon" href="./assets/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/92f6898643.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
    
  </head>
  <body>
    <div class="main">
      <div class="row">
        <div class="login-img col-lg-8 p-5 text-center">
          <img src="assets/images/login-img.png" width="70%" alt="" />
        </div>
        <div class="col-lg-4 p-lg-5 form-login">
         <x-form action="{{route('loginFunction')}}" method="POST">
         <div class="container px-5">
          <div class="text-center">
            <img src="{{asset('admin/assets/images/logicblazelogo.png')}}" width="60%" alt="">
          </div>
            <h4 class="pt-5">Welcome Back <span class="text-danger">&#10084;</span></h4>
            <p style="font-size: 0.8rem">
            Welcome to your dashboard! 🎉 Here's your central hub for all things important. Stay organized, stay informed, and let's get things done together!
            </p>
            <div class="form-field">
              <div class="form-group mt-4">
                <label for="Email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Enter Email"
                  name="email"
                />
              </div>
              <div class="form-group mt-4">
                <label for="Password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Enter password"
                  name="password"
                />
              </div>
              <div class="forget-pass mt-2">
                <a href="">Forget Password?</a>
              </div>
            </div>
            <div class="container">
              <div class="submit-btn row mt-4">
                <button class="btn btn-primary" name="login" type="submit"> SignIn </button>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col"><hr /></div>
              <div class="col"><hr /></div>
            </div>
            <div class="row my-2">
              <div class="col">
                <a href="{{route('admin.register')}}" >
                  Create Your Retailer Account?
                </a>
              </div>
            </div>
            <div class="row">
              @if (session('type'))
                  <x-alert type="{{session('type')}}" message="{{session('message')}}"></x-alert>
              @endif
            </div>
          </div>
         </x-form>
        </div>
      </div>
    </div>
    {{-- footerLinks --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
    <script src="{{asset('admin/assets/js/approvedretailer.js')}}"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

  </body>
</html>
