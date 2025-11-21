@extends('layouts.supercrm-layout')

@section('title', 'Abstract CRM')
@section('content')
<section class="pc-container">
  <div class="pc-content">
    <!-- Section Header -->

    <div class="page-header" style="padding-top:0px;">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h4 class="mb-2">All Clients</h4>
            </div>
          </div>

          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">SuperCRM</a></li>
              <li class="breadcrumb-item"><a>Clients</a></li>
              <li class="breadcrumb-item" aria-current="page">All Clients</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row card-row-1">
        <div class="col-sm-12">
            <div class="card table-card">
              <div class="card-header table-header">
                <div class="row">
                    <div class="col-10">
                      <a href="/admin/client/add-client"><button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px"><i data-feather="user-plus" class="me-1 mt-1 wh15px"></i>Add Client</button></a> 
                    </div>
                    <div class="col-2 text-right">
                      <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px" onclick="openFilterbar()"><i data-feather="filter" class="me-1 mt-1 wh15px"></i>Filter</button> 
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover client-table" id="clientTable">

                    <thead>
                      <tr>
                        <th>Sr.No.</th>
                        <th>Client Details</th>
                        <th>Contact</th>
                        <th>Subscription</th>
                        <th>Duration</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="cmb-5">

                      <tr>

                        <td>01</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910100</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 1</p>

                          <p class="f-14 mb-0">Validity: 7 days</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 01-01-2025</p>

                          <p class="f-14 mb-0">To: 07-01-2025</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-warning mb-2">7 Days Trial</span><br>

                          <span class="badge bg-light-success">Active</span>                          

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#" onclick="openViewClientDetails()" ><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#" onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>02</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910110</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 1</p>

                          <p class="f-14 mb-0">Validity: 7 days</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 25-12-2024</p>

                          <p class="f-14 mb-0">To: 31-12-2024</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-warning mb-2">7 Days Trial</span><br>

                          <span class="badge bg-light-danger">Inactive</span>

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#"  onclick="openViewClientDetails()"><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#"onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>03</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910100</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 10</p>

                          <p class="f-14 mb-0">Validity: 12 months</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 01/01/2025</p>

                          <p class="f-14 mb-0">To: 31/12/2025</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-danger mb-2">Unpaid</span><br>

                          <span class="badge bg-light-success">Active</span>

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#"  onclick="openViewClientDetails()"><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#"onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>04</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910100</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 10</p>

                          <p class="f-14 mb-0">Validity: 12 months</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 01/01/2025</p>

                          <p class="f-14 mb-0">To: 31/12/2025</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-danger mb-2">Unpaid</span><br>

                          <span class="badge bg-light-danger">Inactive</span>

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#"  onclick="openViewClientDetails()"><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#"onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>05</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910100</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 10</p>

                          <p class="f-14 mb-0">Validity: 12 months</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 01/01/2025</p>

                          <p class="f-14 mb-0">To: 31/12/2025</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-success mb-2">Paid</span><br>

                          <span class="badge bg-light-success">Active</span>

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#"  onclick="openViewClientDetails()"><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#"onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>06</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910100</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 10</p>

                          <p class="f-14 mb-0">Validity: 12 months</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 01/01/2025</p>

                          <p class="f-14 mb-0">To: 31/12/2025</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-danger mb-2">Unpaid</span><br>

                          <span class="badge bg-light-success">Active</span>

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#"  onclick="openViewClientDetails()"><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#"onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>07</td>

                        <td>

                            <h6 class="mb-2">Myspace Developers</h6>

                            <p class="f-14 mb-0">POC: Akanksha Loke</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">+91 8108910100</p>

                          <p class="f-14 mb-0">info@myspace.homes</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">Users: 10</p>

                          <p class="f-14 mb-0">Validity: 12 months</p>

                        </td>

                        <td>

                          <p class="f-14 mb-2">From: 01/01/2025</p>

                          <p class="f-14 mb-0">To: 31/12/2025</p>

                        </td>

                        <td class="text-center">

                          <span class="badge bg-light-success mb-2">Paid</span><br>

                          <span class="badge bg-light-success">Active</span>

                        </td>

                        <td class="text-center">

                          <div class="btn-group mr-2 mb-2">

                            <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>

                            <ul class="dropdown-menu dropdown-action-1">

                              <li><a class="dropdown-item f-13" href="#"  onclick="openViewClientDetails()"><i class="ti ti-eye"></i>View Details</a></li>

                              <li><a class="dropdown-item f-13" href="#"><i class="ti ti-edit"></i>Change Status</a></li>

                              <li><a class="dropdown-item f-13" href="#"onclick="openSubscriptionbar()" ><i class="ti ti-brand-pocket"></i>Manage Subscription</a></li>

                            </ul>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- FilterBar -->

    @include('superadmin.client.client-table-filter')

    <!-- SubscriptionBar -->

    @include('superadmin.client.add-subscription-form')

    <!-- ViewDetailsBar -->

    @include('superadmin.client.view-client-details')

    <div id="sdbr-overlay" class="sdbr-overlay" onclick="closeAllSidebars()"></div>

  @push('scripts')

<!-- [Page Specific JS] start -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let table;
$(document).ready(function() {
  // Initialize DataTable
  table = $('#clientTable').DataTable({
    ajax: "{{ route('client.list') }}",
    columns: [
      { data: 'id' },
      { data: 'name' },
      {
        data: 'status',
        render: function(data) {
          return data === 'active' 
            ? '<span class="badge bg-success">Active</span>'
            : '<span class="badge bg-danger">Inactive</span>';
        }
      },
      {
        data: null,
        className: "text-center form-switch",
        orderable: false,
        render: function(data, type, row) {
          return `
            <input type="checkbox" 
              class="form-check-input input-success mt-1 toggle-status" 
              data-id="${row.id}" 
              ${row.status === 'active' ? 'checked' : ''}>
            <button type="button" class="btn btn-icon btn-light-primary wh-30 edit-role" data-id="${row.id}">
              <i class="ti ti-edit"></i>
            </button>
            <button type="button" class="btn btn-icon btn-light-danger wh-30 delete-role" data-id="${row.id}">
              <i class="ti ti-trash"></i>
            </button>
          `;
        }
      }
    ]
  });

  // Update Status (Active/Inactive)

  $(document).on('change', '.toggle-status', function() {
    const id = $(this).data('id');
    const status = $(this).is(':checked') ? 'active' : 'inactive';
    $.ajax({
      url: `{{route('client.update.status')}}`,
      method: 'POST',
      data: { status,id:id, _token: '{{ csrf_token() }}' },
      success: function() {
        Swal.fire('Updated!', 'Status updated successfully.', 'success');
        table.ajax.reload(null, false);
      }
    });

  });

  // Edit Role

  $(document).on('click', '.edit-role', function() {
    const id = $(this).data('id');
    let url = "{{ route('client.edit', ':id') }}";
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success && response.data) {
                const data = response.data;

                $('#role_id').val(data.id);
                $('#role_name').val(data.name);
                $('#role_status').val(data.status); // make sure this matches option values ("active"/"inactive")
                $('#sidebarTitle').text('Edit Role');
                $('#RoleSidebar').addClass('open');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Invalid response format.',
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching role:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Unable to fetch role details. Please try again later.',

            });
        }
    });
});

  // Delete Role
  $(document).on('click', '.delete-role', function() {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "This will delete the role permanently!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',

      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{{ route('client.delete', ':id') }}".replace(':id', id),
          method: 'DELETE',
          data: { _token: '{{ csrf_token() }}' },
          success: function() {
            Swal.fire('Deleted!', 'Role has been deleted.', 'success');
            table.ajax.reload(null, false);
          }
        });
      }
    });
  });
  // Save (Add/Edit)

  $('#roleForm').on('submit', function(e) {
    e.preventDefault();
    const id = $('#role_id').val();
    const formData = $(this).serialize();
    let url = id 
        ? "{{ route('client.update', ':id') }}".replace(':id', id)
        : "{{ route('client.store') }}";
    // ✅ Clear previous errors before submitting
    $('#roleForm .is-invalid').removeClass('is-invalid');

    $('#roleForm .invalid-feedback').remove();
    $.ajax({
        url: url,
        method: id ? 'PUT' : 'POST',
        data: formData + "&_token={{ csrf_token() }}",
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: `Role ${id ? 'updated' : 'added'} successfully.`,
                    timer: 1500,
                    showConfirmButton: false
                });
                closeRoleSidebar();
                table.ajax.reload(null, false);
                $('#roleForm')[0].reset();
            } 
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                // ✅ Loop through validation errors and show them under inputs
                $.each(errors, function(field, messages) {
                    const input = $(`[name="${field}"]`);
                    input.addClass('is-invalid'); // Bootstrap-style red border
                    // If input is in a select2 or custom wrapper, adjust placement as needed
                    input.after(`<div class="invalid-feedback">${messages[0]}</div>`);
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Server error. Please try again later.',
                });
            }
        }
    });
});
});

</script>

<script src="{{ asset('assets/js/plugins/datepicker-full.min.js') }}"></script>
<script>
  // date range picker
  (function () {
    const datepicker_range = new DateRangePicker(document.querySelector('#expiration-datepicker'), {
      buttonClass: 'btn'
    });
  })();
</script>

<!-- Sidebars -->
<script>
  const overlay = document.getElementById('sdbr-overlay');

  function openFilterbar() {
    const sidebar = document.getElementById('FilterBar');
    sidebar.classList.add('open');
    overlay.classList.add('show');
  }

  function closeFilterbar() {
    const sidebar = document.getElementById('FilterBar');
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
  }

  function openSubscriptionbar() {
    const sidebar = document.getElementById('AddSubscription');
    sidebar.classList.add('open');
    overlay.classList.add('show');
  }
  
  function closeSubscriptionbar() {
    const sidebar = document.getElementById('AddSubscription');
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
  }

  function openViewClientDetails() {
    const sidebar = document.getElementById('ViewClientDetails');
    sidebar.classList.add('open');
    overlay.classList.add('show');
  }
  
  function closeViewClientDetails() {
    const sidebar = document.getElementById('ViewClientDetails');
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
  }

  function closeAllSidebars() {
    closeFilterbar();
    closeSubscriptionbar();
    closeViewClientDetails();
  }
</script>

<!-- MultiSelect -->
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {

    var multipleCancelButton = new Choices('#Filter-Billing-Status', {
      removeItemButton: true,
      placeholderValue: 'Select billing status'
    });

    var multipleCancelButton = new Choices('#Filter-Users-Limit', {
      removeItemButton: true,
      placeholderValue: 'Select user limits'
    });

    var multipleCancelButton = new Choices('#Filter-Validity', {
      removeItemButton: true,
      placeholderValue: 'Select plan validity'
    });
    var multipleCancelButton = new Choices('#Filter-CRM-Status', {
      removeItemButton: true,
      placeholderValue: 'Select CRM status '
    });
  });
</script>
 @endpush
@endsection

