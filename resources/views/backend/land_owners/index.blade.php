@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">LandOwners</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('landowners.create')}}" class="btn btn-success btn-lg mb-2 mt-1">
    <i class="fas fa-folder-plus mr-1"></i>Add
  </a>

  <div class="card mb-3">
    <h4 class="card-header">
      <i class="fas fa-table"></i>
      Land Owners Data Table
    </h4>
    <div class="card-body">

      @if (count($landOwners) > 0)
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Area Name</th>
                <th scope="col">Plot No</th>
                <th scope="col">Owner's Name</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($landOwners as $landOwner)
                <tr>
                  <th scope="row">{{$landOwner->id}}</th>
                  <td>{{$landOwner->area_name}}</td>
                  <td>{{$landOwner->plot_no}}</td>
                  <td>{{$landOwner->name}}</td>
                  <td>
                    <a href="{{route('landowners.edit', $landOwner->id)}}" class="btn btn-primary">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteLandOwnerModal"
                            onclick="handleDelete({{$landOwner->id}})">
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
          <h3 class="text-center">NO Data Found!</h3>
        </div>
      @endif

    </div>
  </div>

  <div class="pagination justify-content-center mt-4">
    {{$landOwners->links()}}
  </div>

  <div class="modal fade" id="deleteLandOwnerModal">
    <div class="modal-dialog" role="document">
      <form action="" method="post" id="deleteLandOwnerForm">
        @csrf
        @method('DELETE')

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Flat</h5>
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
            let form = document.getElementById('deleteLandOwnerForm');
            form.action = `/landowners/${id}`;
            // console.log(id);
            // console.log(form);
        }

  </script>
@stop
