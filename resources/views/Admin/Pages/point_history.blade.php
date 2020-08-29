@extends('Admin._layouts.master')
@section('title','Point History')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Point History</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active">Point History</li>
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
            <div class="col-md-10 offset-md-1">
            @include('flash')
               <!-- general form elements -->
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Point History</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 @foreach($points as $point)
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="card"> -->
                            <div class="media">
                                @if($point->des == "Play Slot")
                                    <img class="mr-5" src="{{asset('images/historyicon_admin.jpg')}}">
                                @elseif($point->des =="Join Lucky Draw")
                                    <img class="mr-5" src="{{asset('images/historyicon_join_3d.jpg')}}">
                                @endif
                                <div class="media-body mr-5">
                                    <h5 class="mt-0">{{$point->des}}</h5>
                                    <p>{{$point->date}}</p>
                                </div>
                                <div class="media-body mr-5">
                                    @if($point->des == "Play Slot")
                                        <p>+{{$point->point}}</p>
                                        <p>Balance:{{$point->balance}}</p>
                                        @elseif($point->des =="Join Lucky Draw")
                                        <p>-{{$point->point}}</p>
                                        <p>Balance:{{$point->balance}}</p>
                                    @endif
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                     </div>   
                  </div>
                  <hr>
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


