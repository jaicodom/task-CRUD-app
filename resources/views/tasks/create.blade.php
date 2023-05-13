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
<form action="{{route('tasks.store')}}" method="POST">
  @csrf
  <div class="mb-3 w-25">
    <input type="text" class="form-control" placeholder="Title" name="title">
  </div>

  <div class="mb-3 w-50">
    <input type="textarea" class="form-control" placeholder="Description" name="description">
  </div>

  <div class="mb-3 w-25">
    <input type="date" class="form-control" name="due_date">
  </div>

  <div class="mb-3 w-25">
    <select class="form-select" name='status'>

      <option value="In progress">In progress</option>
      <option value="Completed">Completed</option>
      <option selected value="Undone">Undone</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Create Task</button>
</form>

@endsection