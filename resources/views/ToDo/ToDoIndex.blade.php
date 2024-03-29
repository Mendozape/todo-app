@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('title', 'MY ToDoApp')
@section('content')
<section class="section">
  <div id="demo"></div>
  <div class="section-header" align="center">
    <h1>To Do</h1>
    
    <a href="{{ route('ToDo.create') }}" class="btn btn-primary">Add task</a>
   
  </div>
  <div class="section-body mt-2">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table" id="todos">
              <thead>
                <tr>
                  <th>Task</th>
                  <th>Status</th>
                  <th>Priority</th>
                  <th>Notes</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $details)
                  <tr>
                    <td>{{ $details->task }}</td>
                    <td>{{ $details->status }}</td>
                    <td>{{ $details->priority }}</td>
                    <td>{{ $details->notes }}</td>
                    <td>
                      <a href="{{ route('ToDo.edit',$details) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('ToDo.destroy',$details) }}" method="post" class="d-inline form-delete" >
                        @method('DELETE')
                        @csrf
                        <BUTTON type="submit" class="btn btn-danger">Delete</BUTTON>
                      </form>
                    </td>
                  </tr>
                @empty
                <tr>
                  <td colspan="3">{{ __('No items found') }}</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
@stop
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop
@section('js')
@vite(['resources/js/app.js'])
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>



<script>
  new DataTable('#todos', {
    responsive: true,
    autoWidth: false,
    pageLength: 5,
    lengthMenu: [
      [5, 10, 20, -1],
      [5, 10, 20, 'All']
    ],
  });
</script>
@if (Session::has('task_deleted'))
<script>
  Swal.fire(
    'Deleted!',
    'The task has been deleted.',
    'success'
  )
</script>
@endif
@if (Session::has('task_edited'))
<script>
  Swal.fire(
    'Edited!',
    'The task has been edited.',
    'success'
  )
</script>
@endif
@if (Session::has('task_added'))
<script>
  Swal.fire(
    'Added!',
    'The task has been added.',
    'success'
  )
</script>
@endif
<script>
  $('.form-delete').submit(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: "It cannot be reversed!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete!'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  });
</script>
@stop