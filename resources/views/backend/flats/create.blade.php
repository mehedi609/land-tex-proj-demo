@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('flats.index')}}">Flats</a>
    </li>
    <li class="breadcrumb-item active">Create Flat</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('flats.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-backward mr-2"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Add New Flat</h4>
    <div class="card-body">

      <form action="{{route('flats.store')}}" method="post">
        @csrf



        {{--Select Area Field--}}
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


        {{--Select Plot Field--}}
        <div class="form-group">
          <label for="sel_plot">Select Plot</label>
          <select
            class="form-control @error('sel_plot') is-invalid @enderror"
            name="sel_plot"
            id="sel_plot"
          >
            <option value="0" selected>Select an area first</option>
          </select>
          @error('sel_plot')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>


        {{--Flat No Field--}}
        <div class="form-group">
          <label for="flat_no">Flat No</label>
          <input
            type="text"
            class="form-control @error('flat_no') is-invalid @enderror"
            name="flat_no" id="flat_no"
            placeholder="Enter Flat No"
            value="{{old('flat_no')}}"
          >
          @error('flat_no')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>


        {{--Area Field--}}
        <div class="form-group">
          <label for="area">Area</label>
          <input
            type="text"
            class="form-control @error('area') is-invalid @enderror"
            name="area" id="area"
            placeholder="Enter Area of Flat"
            value="{{old('area')}}"
          >
          @error('area')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>


        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
      </form>

    </div>
  </div>
@stop

@section('script')
  <script src="{{asset('backend/js/get_plots.js')}}"></script>
@stop
