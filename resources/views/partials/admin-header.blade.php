<header class="pc-header">
  <div class="row header-wrapper">
    <div class="col-9 me-auto pc-mob-drp">
      <ul class="list-unstyled">

        <li class="pc-h-item pc-sidebar-collapse">
          <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item">
          <form class="px-3 py-2 mb-0 input-group">
            <input type="text" class="form-control search-control h-250" aria-label="Text input with segmented dropdown button" placeholder="Search here...">
            <button type="button" class="btn btn-outline-secondary bd-1">
              <i data-feather="search"></i>
            </button>
          </form>
        </li>
      </ul>
    </div>

    <div class="col-3 text-right ms-auto">
      <ul class="list-unstyled">
        <li class="dropdown pc-h-item">
          <a
            class="pc-head-link dropdown-toggle arrow-none me-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <svg class="pc-icon">
              <use xlink:href="#custom-notification"></use>
            </svg>
            <span class="badge bg-success pc-h-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Notifications</h5>
              <a href="#!" class="btn btn-link btn-sm">Mark all read</a>
            </div>
            <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
              <p class="text-span">Today</p>
              <div class="card mb-2">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i data-feather="alert-triangle"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <span class="float-end text-sm text-muted">2 mins ago</span>
                      <h5 class="text-body mb-2">Expiration</h5>
                      <p class="mb-3">Client's CRM subscription will expire in [remaining_days] days. Please contact them to renew.</p>
                      <p class="mb-3">Client Name : [Client_Name] <br> Company Name : [Company_Name]</p>
                      <button class="btn btn-sm btn-primary nt-btn">View Details</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-2">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i data-feather="help-circle"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <span class="float-end text-sm text-muted">2 hours ago</span>
                      <h5 class="text-body mb-2">Client Query</h5>
                      <p class="mb-3">[Company_name] has raised a support ticket regarding [ticket_subject]. Please check.</p>
                      <button class="btn btn-sm btn-primary nt-btn">View Ticket</button>
                    </div>
                  </div>
                </div>
              </div>
              <p class="text-span mb-3 mt-3">Yesterday</p>
              <div class="card mb-2">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i data-feather="help-circle"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <span class="float-end text-sm text-muted">11 hours ago</span>
                      <h5 class="text-body mb-2">Client Query</h5>
                      <p class="mb-3">[Company_name] has raised a support ticket regarding [ticket_subject]. Please check.</p>
                      <button class="btn btn-sm btn-primary nt-btn">View Ticket</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-2">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i data-feather="alert-triangle"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <span class="float-end text-sm text-muted">15 hours ago</span>
                      <h5 class="text-body mb-2">Expiration</h5>
                      <p class="mb-3">Client's CRM subscription will expire in [remaining_days] days. Please contact them to renew.</p>
                      <p class="mb-3">Client Name : [Client_Name] <br> Company Name : [Company_Name]</p>
                      <button class="btn btn-sm btn-primary nt-btn">View Details</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center py-2">
              <a href="#!" class="link-danger">Clear all Notifications</a>
            </div>
          </div>
        </li>
        <li class="dropdown pc-h-item">
          <a
            class="pc-head-link dropdown-toggle arrow-none me-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <svg class="pc-icon">
              <use xlink:href="#custom-setting-2"></use>
            </svg>
          </a>
        </li>
        <li class="dropdown pc-h-item header-user-profile">
          <a
            class="pc-head-link dropdown-toggle arrow-none me-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            data-bs-auto-close="outside"
            aria-expanded="false"
          >
            <img src="{{ asset('assets/images/user/adw001.jpg') }}" alt="user-image" class="user-avtar" />
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Profile</h5>
            </div>
            <div class="dropdown-body">
              <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('assets/images/user/adw001.jpg') }}" alt="user-image" class="user-avtar wid-35" />
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Hello, Raj Makhija 🖖</h6>
                    <span>connect@abstractdigitalworld.com</span>
                  </div>
                </div>
                <hr class="border-secondary border-opacity-50" />
                
                <p class="text-span">Manage</p>
                <a href="#" class="dropdown-item">
                  <span>
                    <i class="ti ti-user"></i>
                    <span>My Profile</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item">
                  <span>
                    <i class="ti ti-settings"></i>
                    <span>Settings</span>
                  </span>
                </a>
                <hr class="border-secondary border-opacity-50" />
                <div class="d-grid mb-3">
                  <a href="{{route('logout')}}" class="btn btn-primary"><svg class="pc-icon me-2"><use xlink:href="#custom-logout-1-outline"></use></svg >Logout </a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
</header>