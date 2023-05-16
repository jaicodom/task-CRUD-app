@extends('base')

@section('content')
<div class="mb-3 w-50">
  @if ($errors->any())

  <div class="alert alert-danger mt-5">An error has ocurred:
    <br><br>
    <ul>
      @foreach ($errors->all() as $error )
      <li>{{ $error }}</li>
      @endforeach
    </ul>

  </div>

  @endif




</div>
<form action="{{route('tasks.update', $task)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3 w-25">
    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$task->title}}">
  </div>

  <div class="mb-3 w-50">
    <textarea class="form-control" name="description">{{$task->description}}</textarea>
  </div>

  <div class="mb-3 w-25">
    <input type="datetime-local" class="form-control" name="due_date" value="{{$task->due_date}}">
  </div>

  <div class="mb-3 w-25">
    <select class="form-select" name='status'>
      <option selected value="{{$task->status}}">{{$task->status}}</option>
      <option value="In progress">In progress</option>
      <option value="Completed">Completed</option>
      <option value="Undone">Undone</option>
    </select>
  </div>

  <button type="submit" class="btn btn-clr-completed">Save Task</button>
  <button type="reset" class="btn btn-warning">Reset</button>
  <a href="{{route('tasks.index')}}" class="btn btn-info">Back</a>

</form>

@endsection