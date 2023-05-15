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



<table class="table table-hover border border-3 border-warning bg-light">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Status</th>
      <th>Created at</th>
      <th>Finish date</th>
      <th>Actions</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task )
    <tr class="mb-2">
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td @class( [ 'card-text' , 'bg-clr-inprogress'=> $task->status == 'In progress',
        'bg-clr-undone' => $task->status == 'Undone',
        'bg-clr-completed'=> $task->status == 'Completed'
        ])>{{$task->status}}</td>
      <td>{{$task->created_at}}</td>
      <td>{{$task->due_date}}</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    @endforeach
  </tbody>
</table>


{{-- add a Pagination to the task index query: --}}
{{$tasks->links()}}



@endsection