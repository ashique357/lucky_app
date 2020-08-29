@extends('Admin._layouts.master')
@section('title','Draw Lucky Number')
@section('content')
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Draw Lucky Number</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Draw Lucky Number</li>
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
         @include('flash')
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Draw Lucky Number</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="/admin/point-gift/{{$user->id}}">
                       @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="lucky_number">Give Point</span></label> 
                        <input type="text" class="form-control" id="point" placeholder="Enter point you want to send" name="point" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">SEND</button>
                     <br><br>
                  </div>
                  
               </form>
                <br><hr>

                <form method="post" action="/admin/add-note/{{$user->id}}">
                       @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="lucky_number">Enter note</span></label> 
                        <input type="text" class="form-control" id="note" placeholder="Enter note" name="note" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">ADD NOTE</button>
                     <br><br>
                  </div>
                  
               </form>
                <br><hr>

                <form method="post" action="/admin/change-password/{{$user->id}}">
                       @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="lucky_number">Enter password</span></label> 
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
                     <br><br>
                  </div>
                  
               </form>
                <br><hr>

                <form method="post" action="/admin/change-email/{{$user->id}}">
                       @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="lucky_number">Enter email</span></label> 
                        <input type="email" class="form-control" id="email" placeholder="{{$user->email}}" name="email" value="{{$user->email}}" required >
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">CHANGE EMAIL</button>
                     <br><br>
                  </div>
                  
               </form>
                <br><hr>
                <div class="card-footer">
                     <a href="/admin/user-point-history/{{$user->id}}" class="btn btn-primary">USER POINT HISTORY</a>
                     <br><br>
                  </div>

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