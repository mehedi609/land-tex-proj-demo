@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('areas.index')}}">Areas</a>
    </li>
    <li class="breadcrumb-item active">Edit Area</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('areas.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-folder-plus mr-1"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Edit Area</h4>
    <div class="card-body">

      <form action="{{route('areas.update', $area->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Area Name</label>
          <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name" id="name"
            placeholder="Enter Area Name"
            value="{{old($area->name) ? : $area->name}}"
          >
          @error('name')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-pencil-alt mr-1"></i>Update
        </button>
      </form>

    </div>
  </div>
@stop
