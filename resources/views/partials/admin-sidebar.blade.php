<nav class="pc-sidebar client-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="#" class="b-brand text-primary">
        <img src="{{asset('assets/images/adwcrm.svg')}}" alt="img" width="150px" />
        <span class="badge bg-light-success rounded-pill ms-2">v0.1</span>
      </a>
    </div>
    <div class="navbar-content vh80">
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/images/user/adw001.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0">Raj Makhija</h6>
              <small>Superadmin</small>
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
                <i class="ti ti-power"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <ul class="pc-navbar">
        <li class="pc-item pc-hasmenu">
            <a href="https://app.abstractcrm.com/admin/dashboard" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-graph"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Dashboard</span>
            </a>
        </li>

        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-user-add"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Master</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{route('master.roles.index')}}">Roles</a></li>
              <li class="pc-item"><a class="pc-link" href="{{route('master.userplan.index')}}">User Plan</a></li>
              <li class="pc-item"><a class="pc-link" href="{{route('master.coupon.index')}}">Coupon</a></li>
              <li class="pc-item"><a class="pc-link" href="{{route('master.project.type.index')}}">Project Type</a></li>
              <li class="pc-item"><a class="pc-link" href="{{route('master.features.index')}}">Features</a></li>
              <li class="pc-item"><a class="pc-link" href="{{route('master.sub-features.index')}}">Sub Features</a></li>
              <li class="pc-item"><a class="pc-link" href="{{route('master.add-ons.index')}}">Add Ons</a></li>
            </ul>
        </li>

        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-user-add"></use>
                  </svg>
              </span>
              <span class="pc-mtext">User Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="{{route('users.index')}}">User List</a></li>
                    <li class="pc-item"><a class="pc-link" href="">User Logins</a></li>
            </ul>
        </li>

        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-user-add"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Client Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="{{route('client.index')}}">Client List</a></li>
            </ul>
        </li>

        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-dollar-square"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Billing Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{route('order.index')}}">Order</a></li>
            </ul>
        </li>
        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-notification"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Alert Activity</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="/admin/alert/templates">Templates</a></li>
              <li class="pc-item"><a class="pc-link" href="/admin/alert/send-notification">Send Notification</a></li>
              <li class="pc-item"><a class="pc-link" href="/admin/alerts/notification-list">Notification List</a></li>
            </ul>
        </li>

        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-message-2"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Client Support</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="/admin/support/tickets">View Tickets</a></li>
            </ul>
        </li>
      </ul>
    </div>

    <div class="navbar-footer">
      <ul class="pc-navbar">
        <li class="pc-item pc-hasmenu sidebar-footer">
            <a href="https://app.abstractcrm.com/admin/setting" class="pc-link">
              <span class="pc-micon">
                  <svg class="pc-icon">
                    <use xlink:href="#custom-setting-2"></use>
                  </svg>
              </span>
              <span class="pc-mtext">Manage Settings</span>
            </a>
        </li>
      </ul>
    </div>    
  </div>
</nav>