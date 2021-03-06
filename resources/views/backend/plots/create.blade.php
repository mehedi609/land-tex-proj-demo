@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('plots.index')}}">Plots</a>
    </li>
    <li class="breadcrumb-item active">Create Plot</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('plots.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-folder-plus mr-1"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Add New Plot</h4>
    <div class="card-body">

      <form action="{{route('plots.store')}}" method="post">
        @csrf

        <div class="form-group">
          <label for="plot_no">Plot No</label>
          <input
            type="text"
            class="form-control @error('plot_no') is-invalid @enderror"
            name="plot_no" id="plot_no"
            placeholder="Enter Plot No"
            value="{{old('plot_no')}}"
          >
          @error('plot_no')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="sel_area">Select Area</label>
          <select
            class="form-control @error('sel_area') is-invalid @enderror"
            name="sel_area"
            id="sel_area"
          >
            <option value="" selected>Select an area</option>
            @foreach ($areas as $area)
              <option value="{{$area->id}}">{{$area->name}}</option>
            @endforeach
          </select>
          @error('sel_area')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="area">Area</label>
          <input type="text"
                 class="form-control @error('area') is-invalid @enderror"
                 name="area" id="area"
                 placeholder="Enter Area of the Plot"
          >
          @error('area')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="total_flat">Total Flat</label>
          <input type="text"
                 class="form-control @error('total_flat') is-invalid @enderror"
                 name="total_flat" id="total_flat"
                 placeholder="Enter Total No of Flats"
          >
          @error('total_flat')
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

