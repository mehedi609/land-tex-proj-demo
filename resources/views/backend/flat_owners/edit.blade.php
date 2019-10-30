@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{route('dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('flat-owners.index')}}">FlatOwners</a>
    </li>
    <li class="breadcrumb-item active">Edit FlatOwner</li>
  </ol>

  <!-- Back Button -->
  <a href="{{route('flat-owners.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-angle-double-left mr-1"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Edit Flat Owner</h4>
    <div class="card-body">

      <form action="{{route('flat-owners.update', $flatOwner->id)}}" method="post">
        @csrf
        @method('PUT')


        {{--Select Area Field--}}
        <div class="form-group">
          <label for="sel_area">Select Area</label>
          <select
            class="form-control @error('sel_area') is-invalid @enderror"
            name="sel_area"
            id="sel_area"
          >
            <option value="{{$flatOwner->area_id}}" selected>{{$flatOwner->area_name}}</option>
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
            <option value="{{$flatOwner->plot_id}}" selected>{{$flatOwner->plot_no}}</option>
          </select>
          @error('sel_plot')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>


        {{--Select Flat Field--}}
        <div class="form-group">
          <label for="sel_flat">Select Flat</label>
          <select
            class="form-control @error('sel_flat') is-invalid @enderror"
            name="sel_flat"
            id="sel_flat"
          >
            <option value="{{$flatOwner->flat_id}}" selected>{{$flatOwner->flat_no}}</option>
          </select>
          @error('sel_flat')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>


        {{--Flat Owner Name Field--}}
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name" id="name"
            placeholder="Enter Flat No"
            value="{{old('name') ? : $flatOwner->name}}"
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

@section('script')
  <script src="{{asset('backend/js/get_plots.js')}}"></script>
  <script src="{{asset('backend/js/get_flats.js')}}"></script>
@stop
