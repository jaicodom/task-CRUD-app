@extends('base')

@section('content')

@foreach ($tasks as $task )
<div class="d-inline-flex">
  <div class="card m-4" style="width: 18rem;">

    <div class="card-body">
      <h5 class="card-title"> {{$task->title}}</h5>
      <p class="card-text">{{$task->description}}</p>
      <p class="card-text">{{$task->created_at}}</p>
      <p class="card-text">{{$task->due_date}}</p>
      <p class="card-text">{{$task->status}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

</div>

@endforeach



@endsection