@extends('layouts.app')
   
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $quiz->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quiz</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	<form action="{{ route('store.user.quiz') }}" method="post">
          @csrf
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <h3>Total Marks : {{ $marks }}</h3>
              </div>
            </div>
             <div class="card-body">
               <div class="row mt-2">
                 @foreach($questions as $key=> $row)
                 <div class="col-sm-12">
                   <hr>
                   <p class="float-right">{{ $row->marks }}</p>
                   <h4> Q{{ ++$key }} : {{ $row->question }}</h4>
                   <nav class="navbar">
                     <div class="d-inline-flex" style="width:100%;">
                       <ul class="nav navbar-nav d-inline-flex mr-auto">
                         <li class="nav-item">
                           <ul class="list-inline-mb-0">
                             <li class="list-inline-item"><h4>Ans :</h4></li>
                             @if($row->option->option_one)
                             <li class="list-inline-item ml-5"><input type="radio" name="answer[{{ $key }}]" required value="{{ $row->option->option_one }}"> {{ $row->option->option_one }}</li>
                             @endif
                             @if($row->option->option_two)
                             <li class="list-inline-item ml-5"><input type="radio" name="answer[{{ $key }}]" required value="{{ $row->option->option_two }}"> {{ $row->option->option_two }}</li>
                             @endif
                             @if($row->option->option_three)
                             <li class="list-inline-item ml-5"><input type="radio" name="answer[{{ $key }}]" required value="{{ $row->option->option_three }}"> {{ $row->option->option_three }}</li>
                             @endif
                             @if($row->option->option_four)
                             <li class="list-inline-item ml-5"><input type="radio" name="answer[{{ $key }}]" required value="{{ $row->option->option_four }}"> {{ $row->option->option_four }}</li>
                             @endif
                           </ul>
                         </li>
                       </ul>
                     </div>
                   </nav>
                 </div>
                 <input type="hidden" name="question_id[]" value="{{ $row->id }}">
                 <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                 @endforeach
               </div> 
             </div>
             <div class="card-footer">
               <button type="submit" class="btn btn-sm btn-success">Submit</button>
             </div>
           </div> 
        </form>
      </div>
  	</section>


</div>
@endsection