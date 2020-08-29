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
               <form method="post" action="/admin/choose-lucky-number" id="myForm" onsubmit="myFunction()">
               @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="lucky_number">Write a lucky number <span>(<i>Choose in between(1-1000)</i>)</span></label> 
                        <input type="text" class="form-control" id="lucky_number" placeholder="Lucky number" name="lucky_number" required>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                  <button type="submit" onsubmit="openModal()" id="myForm" class="btn btn-primary">Submit</button>
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
@if(session()->get('result'))
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Draw Lucky Result</h3>
                </div>
               <div class="card-body">
                  <?php $data=session()->get('result')?>
                  @if($data->user_id ==0)
                  <div class="row">
                     <div class="col-md-8">
                        <h5>No winner is found.Do you want to make this user as winner?Note:This is choosen by you from all entries</h5>
                     </div>
                     <div class="col-md-4">
                     <form action="/admin/draw-publish/{{$data->id}}" method="get">
                           @csrf
                           <button class="btn btn-primary btn-sm" type="submit">Publish</button>
                           <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                           
                        </form>
                     </div>
                  </div>
                  @else
                  <div class="row">
                     <div class="col-md-8">
                        <h5>{{$data->user->username}} is the winner on {{$data->date}}.Do you want to make this user as winner?Note:This is choosen by you from all entries</h5>
                     </div>
                     <div class="col-md-4 modal">
                        <form action="/admin/draw-publish/{{$data->id}}" method="get">
                        @csrf
                           <button class="btn btn-primary btn-sm" type="submit">Publish</button>
                           <!-- <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button> -->
                           <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </form>
                     </div>
                  </div>
                  @endif
               </div>
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
@endif
@endsection