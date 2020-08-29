@extends('Admin._layouts.master')
@section('title','Profile Edit')
@section('content')
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Edit Profile</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Edit information</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control" id="name" placeholder="{{$u->name}}" name="name" value="{{$u->name}}">
                    </div>   

                     <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$u->email}}" name="email" value="{{$u->email}}" disabled>
                     </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input id="password" type="password" placeholder="Current Password" class="form-control @error('c_password') is-invalid @enderror" name="c_password" required autocomplete="old-password">
                        @error('c_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input id="password" type="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input id="password-confirm" type="password" placeholder="Retype Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     </div>

                     <div class="form-group">
                        <label for="exampleInputFile">Profile Image</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Upload Image</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="telegram">Telegram</label>
                        <input type="email" class="form-control" id="telegram" placeholder="{{$u->telegram}}">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
         <!--/.col (left) -->
         <!-- right column -->
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
</div>
@endsection