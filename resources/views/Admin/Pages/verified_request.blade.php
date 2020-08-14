@extends('Admin._layouts.master')
@section('title','Profile')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Verification Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Verification Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Profile Image -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="verified-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$d->user->name}}</td>
                                <td><img src="{{$d->id_link}}" alt="" style="max-width:30%;max-height:30%"></td>
                                @if($d->status ==0)
                                <td>Not verified</td>
                                @else
                                <td>Verified</td>
                                @endif
                                
                                @if($d->status ==0)
                                <td><a href="/admin/verified/accept/{{$d->id}}"><button class="btn btn-primary btn-sm">Accept</button></a></td>
                                @else
                                <td><a href="javascript:;" data-toggle="modal" onclick="deleteData({{$d->id}})" 
                                    data-target="#DeleteModal" class="btn btn-sm btn-danger"> Reject</a>
                                </td>
                                @endif  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

@include('Admin.Pages.modal')
<script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url='{{ route("verify.cancel", ":id") }}';
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