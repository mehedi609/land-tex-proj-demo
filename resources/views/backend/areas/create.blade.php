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
    <li class="breadcrumb-item active">Create Area</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('areas.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-folder-plus mr-1"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Add New Area</h4>
    <div class="card-body">

      <form action="{{route('areas.store')}}" method="post">
        @csrf

        <div class="form-group">
          <label for="name">Area Name</label>
          <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name" id="name"
            placeholder="Enter Area Name"
            value="{{old('name')}}"
          >
          @error('name')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </form>

    </div>
  </div>
@stop
