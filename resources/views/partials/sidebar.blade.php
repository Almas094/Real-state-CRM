<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="#" class="b-brand text-primary">
        <img src="{{asset('assets/images/adwcrm.svg')}}" alt="img" width="150px" />
        <span class="badge bg-light-success rounded-pill ms-2">v0.1</span>
      </a>
    </div>
    <div class="navbar-content">
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/images/user/adw001.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0">Raj Makhija</h6>
              <small>Administrator</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar-s" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="#!">
                <i class="ti ti-user"></i>
                <span>My Profile</span>
              </a>
              <a href="#!">
                <i class="ti ti-bell-ringing"></i>
                <span>Notification</span>
              </a>
              <a href="#!">
                <i class="ti ti-power"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <ul class="pc-navbar">
       @foreach($menus as $sidebar)
        @if($sidebar->have_submenu === 'No')
        <li class="pc-item">
          <a href="{{ route($sidebar->route_name) }}" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="{{$sidebar->icon_class_name}}"></use>
              </svg>
            </span>
            <span class="pc-mtext">{{$sidebar->name}}</span>
          </a>
        </li>
        @else
        <li class="pc-item pc-hasmenu">
          <a href="#" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="{{$sidebar->icon_class_name}}"></use>
              </svg>
            </span>
            <span class="pc-mtext">{{$sidebar->name}}</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            @foreach ($sidebar->subMenus as $submenu)
            <li class="pc-item"><a class="pc-link" href="{{ route($submenu->route_name) }}">{{ $submenu->name }}</a></li>
            @endforeach()
          </ul>
        </li>
        @endif
        @endforeach()
      </ul>
    </div>
  </div>
</nav>