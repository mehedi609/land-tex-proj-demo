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
    <li class="breadcrumb-item active">Create LandOwner</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('landowners.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-backward mr-2"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Add New Land Owner</h4>
    <div class="card-body">

      <form action="{{route('landowners.store')}}" method="post">
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


        {{--Land Owner Name Field--}}
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control"
            name="name" id="name"
            placeholder="Enter Owner Name"
            value="{{old('name')}}"
          >
        </div>


        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
      </form>

    </div>
  </div>
@stop

@section('script')
  <script>
      $(document).ready(function () {

          // Area Change
          $('#sel_area').change(function () {

              // Area id
              const id = $(this).val();

              // Empty the dropdown
              // $('#sel_plot').find('option').not(':first').remove();
              $('#sel_plot').find('option').remove();

              // AJAX request
              $.ajax({
                  url: `/getplots/${id}`,
                  type: 'get',
                  success: function (response) {
                      // console.log(response);

                      let len = 0;
                      if (response != null) {
                          len = response.length;
                      }
                      // console.log(len)

                      if (len > 0) {
                          // Read data and create <option >
                          response.forEach(function (data) {
                              let option = `<option value="${data.id}">${data.plot_no}</option>`;
                              $('#sel_plot').append(option);
                          })
                      }

                  }
              });
          });
      })
  </script>
@stop
