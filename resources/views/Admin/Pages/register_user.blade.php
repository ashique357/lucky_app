@extends('Admin._layouts.master')
@section('title','Register User')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Register User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          @include('flash')

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Register User</h3>
                </div>
                <form method="post" action="/admin/register-users" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control" id="name" placeholder="Username" name="username" value="" required>
                    </div>   

                     <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email"  required>
                     </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1"> Password</label>
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input id="password-confirm" type="password" placeholder="Retype Password" class="form-control" name="password_confirmation" required autocomplete="password">
                     </div>

                     <div class="form-group">
                        <label for="telegram">Telegram</label>
                        <input type="text" class="form-control" id="telegram" placeholder="Telegram" name="telegram">
                    </div>
                    <!-- <div class="form-group">
                        <label for="telegram">Refer ID</label>
                        <input type="text" class="form-control" id="referid" placeholder="Enter referID" name="refer">
                    </div> -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Signup</button>
                  </div>
               </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection