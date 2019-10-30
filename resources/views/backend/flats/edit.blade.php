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
    <li class="breadcrumb-item active">Edit Flat</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('flats.index')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-folder-plus mr-1"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Edit Flat</h4>
    <div class="card-body">

      <form action="{{route('flats.update', $flat->id)}}" method="post">
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
            <option value="{{$selected_area->area_id}}" selected>{{$selected_area->area_name}}</option>
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
            <option value="{{$selected_area->plot_id}}" selected>{{$selected_area->plot_no}}</option>
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
            value="{{old('flat_no') ? : $flat->flat_no}}"
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
            value="{{old('area') ? : $flat->area}}"
          >
          @error('area')
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
  <script>
      $(document).ready(function () {
          let id = null;

          // Area Change
          $('#sel_area').change(function () {

              // Area id
              id = $(this).val();

              // Empty the dropdown
              // $('#sel_plot').find('option').not(':first').remove();
              $('#sel_plot').find('option').remove();

              // AJAX request
              fetchData(id);
          });


          function fetchData(id) {
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
          }
      })
  </script>
@stop
