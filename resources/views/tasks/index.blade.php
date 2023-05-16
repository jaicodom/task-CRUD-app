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
<div>
  <a href="{{route('tasks.create')}}" class="btn btn-clr-completed m-4 text-light">Create Task</a>
</div>


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

      <td class="w-25">{{$task->description}}</td>

      <td @class( [ 
        'card-text', 
        'bg-clr-inprogress'=> $task->status == 'In progress',
        'bg-clr-undone' => $task->status == 'Undone',
        'bg-clr-completed'=> $task->status == 'Completed'
        ])>{{$task->status}}</td>

      <td>{{$task->created_at}}</td>

      <td>{{$task->due_date}}</td>

      <td>

        <a href="{{route('tasks.edit', $task)}}" class="btn btn-clr-inprogress">Edit</a>
      
        
      </td>
      <td>
            <form action="{{route('tasks.destroy', $task)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach
  </tbody>
</table>


{{-- add a Pagination to the task index query: --}}

{{$tasks->links()}}



@endsection