@extends('base')


@section('content')

<div>
  <a href="{{route('tasks.create')}}" class="btn btn-info mt-4">Create Task</a>
  <span class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Filter by Status
  </span>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('tasks.index')}}">All</a></li>
    <li><a class="dropdown-item" href="{{route('status', 'Undone')}}">Undone</a></li>
    <li><a class="dropdown-item" href="{{route('status', 'In progress')}}">In progress</a></li>
    <li><a class="dropdown-item" href="{{route('status', 'Completed')}}">Completed</a></li>
  </ul>

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
    <tr>
      <td>{{$task->title}}</td>

      <td>{{$task->description}}</td>

      <td @class( [ 'card-text' , 'bg-clr-inprogress'=> $task->status == 'In progress',
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