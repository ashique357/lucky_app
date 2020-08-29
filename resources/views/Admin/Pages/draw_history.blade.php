@extends('Admin._layouts.master')
@section('title','Lottery History')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Lottery History</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active">Lottery History</li>
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
                     <h3 class="card-title">Lottery History</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  @foreach($histories as $history)
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-10">
                            @if($history->user_id !=0)
                            <h6>{{$history->date}},Lucky draw result is {{$history->lucky_entry_number}},{{$history->user->username}}</h6>
                            @else
                            <h6>{{$history->date}},No winner found</h6>
                            @endif
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

@include('Admin.Pages.modal_publish')
<script type="text/javascript">
     function acceptData(id)
     {
         var id = id;
         var url='{{ route("draw.publish", ":id") }}';
         url = url.replace(':id', id);
		 $("#deleteForm").attr('action', url);
		 console.log(id);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>

@endsection