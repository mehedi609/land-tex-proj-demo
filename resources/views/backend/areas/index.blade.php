@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Areas</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('areas.create')}}" class="btn btn-success btn-lg mb-2 mt-1">
    <i class="fas fa-folder-plus mr-1"></i>Add
  </a>

  <div class="card mb-3">
    <h4 class="card-header">
      <i class="fas fa-table"></i>
      Area Data Table
    </h4>
    <div class="card-body">

      @if (count($areas) > 0)
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($areas as $area)
                <tr>
                  <th scope="row">{{$area->id}}</th>
                  <td>{{$area->name}}</td>
                  <td>
                    <a href="{{route('areas.edit', $area->id)}}" class="btn btn-primary">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAreaModal"
                            onclick="handleDelete({{$area->id}})">
                      <i class="fas fa-trash-alt mr-1"></i>Delete
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="alert alert-danger" role="alert">
          <h3>NO Data Found!</h3>
        </div>
      @endif

    </div>
  </div>

  <div class="pagination justify-content-center mt-4">
    {{$areas->links()}}
  </div>

  {{--Delete Area Modal with Form--}}
  <div class="modal fade" id="deleteAreaModal">
    <div class="modal-dialog" role="document">
      <form action="" method="post" id="deleteAreaForm">
        @csrf
        @method('DELETE')

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure!</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection

@section('script')
  <script>
      function handleDelete(id) {
          let form = document.getElementById('deleteAreaForm');
          form.action = `/areas/${id}`
      }
  </script>
@stop
