@extends('adminlte::page')
@section('title', 'MY ToDoApp')
@section('content')
<div class="container py-5" align="left">
    @if($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>¡Review the fields!</strong>
        @foreach($errors->all() as $error)
        <span class="badge badge-danger">{{$error}}</span>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(isset($todo))
        <h1>Edit</h1>
    @else
        <h1>Add</h1>
    @endif

    @if(isset($todo))
        <form action="{{ route('ToDo.update',$todo) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('ToDo.store') }}" method="post" enctype="multipart/form-data">
    @endif

    @csrf
    <div class="mb-3">
        <label for="task" class="form-label">Type task</label>
        <input type="text" name="task" class="form-control" placeholder="Task name" value="{{old('task') ?? @$todo->task }}">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label><br>
        <select name="status">
            <option value="" selected>--</option>
            <option value="In-Progress"
                @if(isset($todo->status) == 'In-Progress')
                    selected
                @endif
            >In-Progress</option>
            <option value="Completed"
                @if(isset($todo->status) == 'Completed')
                    selected
                @endif
            >Completed</option>
            <option value="Canceled"
                @if(isset($todo->status) == 'Canceled')
                    selected
                @endif
            >Canceled</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Priority</label><br>
        <select name="priority">
            <option value="" selected>--</option>
            <option value="Low"
                @if(isset($todo->priority) == 'Low')
                    selected
                @endif
            >Low</option>
            <option value="Medium"
                @if(isset($todo->priority) == 'Medium')
                    selected
                @endif
            >Medium</option>
            <option value="High"
                @if(isset($todo->priority) == 'High')
                    selected
                @endif
            >High</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" placeholder="Type notes">{{old('notes') ?? @$todo->notes}}</textarea>
    </div>
    @if(isset($todo))
    <button type="submit" class="btn btn-info">Save Changes</button>
    @else
        <button type="submit" class="btn btn-info">Save task</button>
    @endif
   </form>
</div>
@stop