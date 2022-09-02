@extends('layouts.app') 
@section('content')
@push('css')
@endpush
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quiz</h1>
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
      	<div class="row">
      	@foreach($data as $key=> $row)
          @php
          $id = Auth::id();
            $check = App\Models\Answer::where('quiz_id',$row->id)->where('user_id',$id)->first();
            $marks = App\Models\Answer::where('quiz_id',$row->id)->where('user_id',$id)->sum('marks');
            $quiz_marks = App\Models\Question::where('quiz_id',$row->id)->sum('marks');
            $total_que = App\Models\Question::where('quiz_id',$row->id)->count();
            $right_ans = App\Models\Answer::where('user_id',$id)->where('quiz_id',$row->id)->where('is_right','Yes')->count();
            $wrong_ans = App\Models\Answer::where('user_id',$id)->where('quiz_id',$row->id)->where('is_right','No')->count();
          @endphp
          @if($check)
      	  <div class="col-lg-3 col-6">
      	    <!-- small box -->
      	    <div class="small-box bg-success">
      	      <div class="inner">
      	        <p>{{ $row->name }}</p>
                <p>Total Marks: {{ $marks }} / {{ $quiz_marks }}</p>
                <p>Total Question: {{ $total_que }}</p>
                <p>Correct Answer : {{ $right_ans }}</p>
                <p>Wrong Answer : {{ $wrong_ans }}</p>
      	      </div>
                <a href="#" class="small-box-footer">Quiz Complete <i class="fas fa-check"></i></a>
      	    </div>
      	  </div>
          @else
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <p class="float-right">Marks : {{ $quiz_marks }}</p>
                    <p>{{ $row->name }}</p>
                  </div>
                    <a href="{{ route('quiz.start',$row->slug) }}" class="small-box-footer">Quiz Start <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
          @endif
      	@endforeach
      	  <!-- ./col -->
      	</div>
      </div>
  	</section>
</div>
@push('js')

@endpush
@endsection