<nav class="pc-sidebar client-sidebar">
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
          <div>
              <img src="{{ asset('assets/images/user/client-logo/My-Space.png') }}" alt="client logo" class="client-logo" />
          </div>
          <div class="d-flex align-items-center">
            <div class="flex-grow-1 ms-1 me-2">
              <h6 class="mb-0">MySpace Developer</h6>
              <small>Real Estate Developer</small>
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
                <span>About Developer</span>
              </a>
              <a href="#!">
                <i class="ti ti-map"></i>
                <span>Our Projects</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <ul class="pc-navbar">
        <li class="pc-item pc-hasmenu">
            <a href="https://app.abstractcrm.com/client/dashboard" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-status-up"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Dashboard</span>
            </a>
        </li>
        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-layer"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Masters</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="/client/master/configuration-list">Configration List</a></li>
              <li class="pc-item"><a class="pc-link" href="/client/master/location-list">Location List</a></li>
              <li class="pc-item"><a class="pc-link" href="/client/master/source-list">Source List</a></li>
              <li class="pc-item"><a class="pc-link" href="/client/master/disposition-list">Disposition List</a></li>
              <li class="pc-item"><a class="pc-link" href="/client/master/subdisposition-list">Sub Disposition List</a></li>
            </ul>
        </li>
        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-profile-2user-outline"></use>
                  </svg>
              </span>
              <span class="pc-mtext">All Leads</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="/client/leads/add-leads">Add Leads</a></li>
              <li class="pc-item"><a class="pc-link" href="/client/leads/all-leads">Lead List</a></li>
            </ul>
        </li>
        <!-- <li class="pc-item">
            <a href="../application/calendar.html" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-calendar-1"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Calendar</span>
            </a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>