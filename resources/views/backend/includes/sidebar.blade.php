<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="{{route('dashboard')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  {{--Area Dropdown Menu--}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="areasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-landmark mr-2"></i>
      <span>Areas</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="areasDropdown">
      <a class="dropdown-item" href="{{route('areas.index')}}">All Areas</a>
      <a class="dropdown-item" href="{{route('areas.create')}}">Add Area</a>
    </div>
  </li>

  {{--Plot Dropdown Menu--}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="areasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-map-marked-alt mr-2"></i>
      <span>Plots</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="areasDropdown">
      <a class="dropdown-item" href="{{route('plots.index')}}">All Plots</a>
      <a class="dropdown-item" href="{{route('plots.create')}}">Add Plot</a>
    </div>
  </li>

  {{--Flat Dropdown Menu--}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="areasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-map-marked-alt mr-2"></i>
      <span>Flats</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="areasDropdown">
      <a class="dropdown-item" href="{{route('flats.index')}}">All Flats</a>
      <a class="dropdown-item" href="{{route('flats.create')}}">Add Flat</a>
    </div>
  </li>

  {{--LandOwners Dropdown Menu--}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="areasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-map-marked-alt mr-2"></i>
      <span>Land Owners</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="areasDropdown">
      <a class="dropdown-item" href="{{route('landowners.index')}}">All LandOwner</a>
      <a class="dropdown-item" href="{{route('landowners.create')}}">Add LandOwner</a>
    </div>
  </li>

  {{--FlatOwners Dropdown Menu--}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="areasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-map-marked-alt mr-2"></i>
      <span>Flat Owners</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="areasDropdown">
      <a class="dropdown-item" href="{{route('flat-owners.index')}}">All FlatOwner</a>
      <a class="dropdown-item" href="{{route('flat-owners.create')}}">Add FlatOwner</a>
    </div>
  </li>

</ul>
