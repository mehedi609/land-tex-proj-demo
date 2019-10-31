@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('landowners.index')}}">LandOwners</a>
    </li>
    <li class="breadcrumb-item active">Edit LandOwner</li>
  </ol>

  <!-- Back Button -->
  <a href="{{route('landowners.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-backward mr-2"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Edit Land Owner</h4>
    <div class="card-body">

      <form action="{{route('landowners.update', $landOwner->id)}}" method="post">
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
            <option value="{{$landOwner->area_id}}" selected>{{$landOwner->area_name}}</option>
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
            <option value="{{$landOwner->plot_id}}" selected>{{$landOwner->plot_no}}</option>
          </select>
          @error('sel_plot')
          <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </div>
          @enderror
        </div>


        {{--LandOwner Name Field--}}
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name" id="name"
            placeholder="Enter Flat No"
            value="{{old('name') ? : $landOwner->name}}"
          >
          @error('name')
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
