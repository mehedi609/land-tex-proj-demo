@extends('backend.layouts.app')

@section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{route('dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{route('preview.index')}}">Preview</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
  </ol>

  <!-- Add Button -->
  <a href="{{route('preview.get-data')}}" class="btn btn-outline-dark btn-lg mb-3 mt-1">
    <i class="fas fa-backward mr-2"></i>Back
  </a>

  <div class="card">
    <h4 class="card-header">Preview</h4>
    <div class="card-body">

      <table class="table">
        <tbody>

          {{--Land Onwers' Info--}}
          <tr>
            <th>Land Owners</th>
            <td>
              <div class="accordion" id="accordionLandOwners">

                @for ($i = 0; $i < count($landOwners); $i++)
                  <div class="card">
                    <div class="card-header" id="{{"heading-landOwner-" .$landOwners[$i]->id}}">
                      <h2 class="mb-0">
                        <button
                          class="btn btn-link"
                          type="button"
                          data-toggle="collapse"
                          data-target="{{"#collapse-landOwner-" .$landOwners[$i]->id}}"
                          aria-expanded="true"
                          aria-controls="{{"collapse-landOwner-" .$landOwners[$i]->id}}"
                        >
                          @if ($landOwners[$i]->status == 1)
                              Current Owner's Info
                          @else
                              {{$i."".$positions_arr[$i]." Previous Owner"}}
                          @endif
                        </button>
                      </h2>
                    </div>

                    <div
                      id="{{"collapse-landOwner-" .$landOwners[$i]->id}}"
                      class="collapse"
                      aria-labelledby="{{"heading-landOwner-" .$landOwners[$i]->id}}"
                      data-parent="#accordionLandOwners"
                    >
                      <div class="card-body">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>Name</th>
                              <td>{{$landOwners[$i]->name}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                @endfor

              </div>
            </td>
          </tr>

          {{--Flats Info--}}
          <tr>
            <th>Owner Flats Info</th>
            <td>
              <div class="accordion" id="accordionFlats">

                @for ($i = 0; $i < count($flats); $i++)
                  <div class="card">
                    <div class="card-header" id="{{"heading-flats-" .$flats[$i]->id}}">
                      <h2 class="mb-0">
                        <button
                          class="btn btn-link"
                          type="button"
                          data-toggle="collapse"
                          data-target="{{"#collapse-flats-" .$flats[$i]->id}}"
                          aria-expanded="true"
                          aria-controls="{{"collapse-flats-" .$flats[$i]->id}}"
                          onclick="handleFlatData({{$flats[$i]->id}})"
                        >
                          {{"Flat ".($i+1)}}
                        </button>
                      </h2>
                    </div>

                    <div
                      id="{{"collapse-flats-" .$flats[$i]->id}}"
                      class="collapse"
                      aria-labelledby="{{"heading-flats-" .$flats[$i]->id}}"
                      data-parent="#accordionFlats"
                    >
                      <div class="card-body">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>Flat No</th>
                              <td>{{$flats[$i]->flat_no}}</td>
                            </tr>
                            <tr>
                              <th>Area</th>
                              <td>{{$flats[$i]->area}}</td>
                            </tr>
                            <tr>
                              <th>Flat Owners</th>
                              <td>
                                <div class="accordion" id="accordionFlatOwners">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                @endfor

              </div>
            </td>
          </tr>

        </tbody>
      </table>

    </div>
  </div>
@stop

@section('script')
  <script src="{{asset('backend/js/get_plots.js')}}"></script>
  <script>
    function handleFlatData(flat_id) {
        $.ajax({
            url: `/getflatowners/${flat_id}`,
            type: 'get',
            success: function (response) {
                console.log(response.length);
                if (response.length === 0) {
                    console.log('No Data Found')
                    /*$('#accordionFlatOwners').empty();
                    $('#accordionFlatOwners').append(`<span>No Data Found</span>`)*/
                } else {
                    $('#accordionFlatOwners').empty();

                    const positions = ['', 'st', 'nd', 'rd'];

                    let card_header = '';

                    for(let i = 0; i < response.length; i++) {
                        let button_value = '';
                        let data = response[i];

                        // console.log(data)

                        if (data.status === 1) {
                            button_value = 'Current Owner Info';
                        } else {
                            if (i < 4) {
                                button_value = `${i}${positions[i]} Previous Owner`
                            } else {
                                button_value = `${i}th Previous Owner`
                            }
                        }

                        card_header = `
                          <div class="card">
                            <div class="card-header" id="heading-flatOwner-${data.id}">
                              <h2 class="mb-0">
                                <button
                                  class="btn btn-link"
                                  type="button"
                                  data-toggle="collapse"
                                  data-target="#collapse-flatOwner-${data.id}"
                                  aria-expanded="true"
                                  aria-controls="collapse-flatOwner-${data.id}"
                                >${button_value}</button>
                              </h2>
                            </div>

                            <div
                              id="collapse-flatOwner-${data.id}"
                              class="collapse"
                              aria-labelledby="heading-flatOwner-${data.id}"
                              data-parent="#accordionFlatOwners"
                            >
                              <div class="card-body">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <th>Name</th>
                                      <td>${data.name}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>`;

                        $('#accordionFlatOwners').append(card_header)

                    }

                }

            }
        })
    }
  </script>
@stop
