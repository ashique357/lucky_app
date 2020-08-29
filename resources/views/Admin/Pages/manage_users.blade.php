@extends('Admin._layouts.master')
@section('title','Manage User')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Manage User</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active">Manage User</li>
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
                     <h3 class="card-title">Manage User</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  @foreach($users as $user)
                  <a href="/admin/give-point/{{$user->id}}">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                            <h3><strong>Username:</strong>{{$user->username}}</h3>
                            <p><strong>Email:</strong>{{$user->email}}</p>
                            <p><strong>Point:</strong>{{$user->point}}</p>
                            <p><strong>Pin:</strong>{{$user->pin}}</p>
                            <p><strong>Note:</strong>{{$user->note}}</p>
                        </div>
                     </div>   
                  </div>
                  <hr>
                  </a>
                  @endforeach
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