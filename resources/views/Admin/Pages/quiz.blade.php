@extends('Admin._layouts.master')
@section('title','Daily Quiz')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Daily Quizz</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active">Daily Quizz</li>
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
                     <h3 class="card-title">Daily Quizz</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" action="/admin/daily-quiz">
                     @csrf
                     <div class="card-body">
                        <div class="form-group">
                           <label for="lucky_number">Question</span></label> 
                           <input type="text" class="form-control" id="question" name="question" placeholder="Enter the question" required>
                        </div>
                        <div class="form-group">
                           <label for="lucky_number">Option 1</span></label>
                           <input type="text" class="form-control" id="option1" placeholder="Enter option 1" name="option1">
                        </div>
                        <div class="form-group">
                           <label for="lucky_number">Option 2</span></label>
                           <input type="text" class="form-control" id="option2" placeholder="Enter option 2" name="option2">
                        </div>
                        <div class="form-group">
                           <label for="lucky_number">Option 3</span></label>
                           <input type="text" class="form-control" id="option3" placeholder="Enter option 3" name="option3">
                        </div>
                        <div class="form-group">
                           <label for="lucky_number">Option 4</span></label>
                           <input type="text" class="form-control" id="option4" placeholder="Enter option 4" name="option4">
                        </div>
                        <div class="form-group">
                           <label for="">Choose the Correct Answer</label>
                           <select name="answer" id="" class="form-control">
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                              <option value="4">Option 4</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Date:</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" required>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <br><br>
                     </div>
                  </form>
                  <br>
                  <hr>
               </div>
               <br>
               <hr>
               <div class="row">
                  <div class="col-md-12">
                     <div class="card card-secondary">
                        <div class="card-header">
                           <h3 class="card-title">Upcoming Questions</h3>
                        </div>
                        @foreach($data as $uq)
                        <div class="card-body">
                           <h6><strong>{{$uq->date}}</strong> <strong>Question:</strong>{{$uq->question}} <strong>Answer:</strong>
                              @if($uq->answer ==1)
                              {{$uq->option1}}
                              @elseif($uq->answer ==2)
                              {{$uq->option2}}
                              @elseif($uq->answer ==3)
                              {{$uq->option3}}
                              @elseif($uq->answer ==4)
                              {{$uq->option4}}
                              @endif
                           </h6>
                        </div>
                        @endforeach
                        <!-- /.card-header -->
                        <!-- form start -->
                        <br>
                        <hr>
                     </div>
                  </div>
               </div>
               <div class="card card-dark">
                  <div class="card-header">
                     <h3 class="card-title">Winners</h3>
                  </div>
                  <div class="card-body">
                        @if(!($winners))
                        <h6>No winner found</h6>
                        @else
                        @foreach($winners as $winner)
                            <h6><i><b>{{$loop->iteration}}.</b>&nbsp&nbsp</i><strong>{{$winner->quiz->date}}</strong> &nbsp&nbsp&nbsp <i>Question:</i>
                            {{$winner->quiz->question}} &nbsp&nbsp&nbsp<b>Answer:</b>@if($winner->quiz->answer ==1)
                              {{$winner->quiz->option1}}
                              @elseif($winner->quiz->answer ==2)
                              {{$winner->quiz->option2}}
                              @elseif($winner->quiz->answer ==3)
                              {{$winner->quiz->option3}}
                              @elseif($winner->quiz->answer ==4)
                              {{$winner->quiz->option4}}
                              @endif &nbsp&nbsp&nbsp<strong>Winner is: &nbsp&nbsp</strong>{{$winner->user->username}}</h6>
                        @endforeach
                        @endif
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <br>
                  <hr>
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