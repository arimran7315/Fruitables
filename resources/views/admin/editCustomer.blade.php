@extends('admin.masterLayout.layout')
@section('content')
<div class="container-fluid">
    <div class="mt-4 mb-5" style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='%236c757d'/%3E%3C/svg%3E&#34;
          );
        " aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Costumer
        </li>
      </ol>
    </div>
    <div class="card border-0 shadow">
      <div class="card-header bg-primary bg-opacity-25 text-primary border-bottom border-primary">
        <div class="card-title p-2 m-0">
          <h6>Edit Costumer</h6>
        </div>
      </div>
      <div class="card-body">
        
          <div class="row">
            <div class="col-lg-12 py-2 px-4">
              <form action="updatecostumer.php" method="POST">
                <input type="hidden" name="id" value="">
                <div class="row">
                  <div class="top-brdr card-subtitle py-3">
                    <p style="font-size: 20px">Personal Information</p>
                  </div>
                  <div class="form-body row">
                    <div class="col">
                      <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control mt-2 bg-info bg-opacity-25" placeholder="" value="" name="name" />
                      </div>
                    </div>
                    <div class="col">
                      <label for="cell">Cell</label>
                      <input type="text" class="form-control mt-2" placeholder="Enter Cell No" value="" name="phone" />
                    </div>
                  </div>
                  <div class="form-body row mt-4">
                    <div class="col">
                      <label for="cell">Address</label>
                      <input type="text" class="form-control mt-2" placeholder="Enter Cell No" value="" name="address" />
                    </div>
                    <div class="col">
                      <label for="password">Password</label>
                      <input type="text" class="form-control mt-2" placeholder="Enter Address" value="" name="password" />
                    </div>
                  </div>
                  <div class="submit-btn row my-4">
                    <input type="submit" value="Update" class="btn btn-primary w-50 m-auto" name="updateinfo" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        
      </div>
    </div>
  </div>
@endsection