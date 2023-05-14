@extends('base')
<style>
  .card {
    transition: all 0.3s;

  }

  .card:hover {
    transform: scale(1.05);
  }
</style>

@section('content')

<a href="{{route('tasks.create')}}" class="btn btn-success m-4">Create Task</a>

@if (Session::get('success'))

<div class="alert alert-success mt-5">{{Session::get('success')}}</div>

@endif

@foreach ($tasks as $task )

<div class="d-inline-flex">
  <div class="card m-4" style="width: 18rem;height: 300px;">

    <div class="card-body">

      <h5 class="card-title"> {{$task->title}}</h5>
      <p class="card-text">{{$task->description}}</p>
      <p class="card-text">{{$task->created_at}}</p>
      <small class="card-text">{{$task->due_date}}</small>
      <small @class( [ 'card-text' , 'bg-warning'=> $task->status == 'In progress',
        'bg-danger' => $task->status == 'Undone',
        'bg-success'=> $task->status == 'Completed'

        ])>Status: {{$task->status}}</small>

    </div>
  </div>
</div>

@endforeach



@endsection