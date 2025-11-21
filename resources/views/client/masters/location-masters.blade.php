@extends('layouts.client-layout')

@section('title', 'Abstract CRM')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap5.min.css') }}">
@section('content')
<section class="pc-container">
  <div class="pc-content">

    <div class="page-header" style="padding-top:0px; margin-top:-5px;">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="mb-3">Location List</h2>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a>Master</a></li>
              <li class="breadcrumb-item" aria-current="page">Location List</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header table-header">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mt-2">Location List</h5>
                    </div>
                    <div class="col-4 text-right">
                        <button type="button" class="btn btn-primary me-3 d-inline-flex" id="openSidebarBtn"><i class="ti ti-circle-plus me-2"></i>Add Location</button>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive dt-responsive">
                  <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th class="ms-4">Sr. No.</th>
                        <th>Name</th>
                        <th class="text-center">Pincode</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="ms-4">01</td>
                        <td>Panvel</td>
                        <td class="text-center">410106</td>
                        <td class="text-center">27/11/2024</td>
                        <td class="text-center form-switch">
                          <input type="checkbox" class="form-check-input input-success mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Active / Inactive" checked>
                          <button type="button" class="btn btn-icon btn-light-danger wh-30"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-backspace"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td class="ms-4">02</td>
                        <td>New Panvel</td>
                        <td class="text-center">410206</td>
                        <td class="text-center">28/11/2024</td>
                        <td class="text-center form-switch">
                          <input type="checkbox" class="form-check-input input-success mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Active / Inactive" checked>
                          <button type="button" class="btn btn-icon btn-light-danger wh-30"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-backspace"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td class="ms-4">03</td>
                        <td>Kalyan</td>
                        <td class="text-center">421002</td>
                        <td class="text-center">28/11/2024</td>
                        <td class="text-center form-switch">
                          <input type="checkbox" class="form-check-input input-success mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Active / Inactive" checked>
                          <button type="button" class="btn btn-icon btn-light-danger wh-30"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-backspace"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td class="ms-4">04</td>
                        <td>Taloja</td>
                        <td class="text-center">410208</td>
                        <td class="text-center">28/11/2024</td>
                        <td class="text-center form-switch">
                          <input type="checkbox" class="form-check-input input-success mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Active / Inactive" checked>
                          <button type="button" class="btn btn-icon btn-light-danger wh-30"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-backspace"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td class="ms-4">05</td>
                        <td>Thane</td>
                        <td class="text-center">400080</td>
                        <td class="text-center">28/11/2024</td>
                        <td class="text-center form-switch">
                          <input type="checkbox" class="form-check-input input-success mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Active / Inactive" checked>
                          <button type="button" class="btn btn-icon btn-light-danger wh-30"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-backspace"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>


    <!-- Form Sidebar -->

    <div class="crm-sidebar" id="crmSidebar">
        <button class="crm-close-btn" id="closeSidebarBtn">&times;</button>
        <h2>Add Location</h2>

        <form id="AddLocationForm" class="mt-3">
            <div class="form-group">
                <label class="form-label" for="AddLocation">Location</label>
                <input type="text" class="form-control" id="AddLocation" placeholder="Please enter value">
                <div class="error-message" id="locationError">This field is required.</div>
            </div>
            <div class="form-group">
                <label class="form-label" for="AddPincode">Pincode</label>
                <input type="number" class="form-control" id="AddPincode" placeholder="Please enter value">
                <div class="error-message" id="pincodeError">This field is required.</div>
            </div>
            <div class="form-group">
                <label class="form-label" for="StatusLocation">Status</label>
                <select class="form-select" id="StatusLocation">
                    <option value="" disabled selected>Please select status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <div class="error-message" id="statusError">Please select a status.</div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>


    <div class="crm-overlay" id="crmOverlay"></div>

    <!-- Add Limit Modal -->
    @include('superadmin.master.add-user-limit')
    <!-- Add Limit Modal -->

    <!-- Edit Limit Modal -->
    @include('superadmin.master.edit-user-limit')
    <!-- Edit Limit Modal -->

    @push('scripts')
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
     <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font') }}"></script>
    <script src="{{ asset('assets/js/config') }}"></script>
    <script src="{{ asset('assets/js/pcoded') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min') }}"></script>

    <script>
      // [ DOM/jquery ]
      var total, pageTotal;
      var table = $('#dom-jqry').DataTable();
      // [ column Rendering ]
      $('#colum-render').DataTable({
        columnDefs: [
          {
            render: function (data, type, row) {
              return data + ' (' + row[3] + ')';
            },
            targets: 0
          },
          {
            visible: false,
            targets: [3]
          }
        ]
      });
      // [ Multiple Table Control Elements ]
      $('#multi-table').DataTable({
        dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
      });
      // [ Complex Headers With Column Visibility ]
      $('#complex-header').DataTable({
        columnDefs: [
          {
            visible: false,
            targets: -1
          }
        ]
      });
      // [ Language file ]
      $('#lang-file').DataTable({
        language: {
          url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json'
        }
      });
      // [ Setting Defaults ]
      $('#setting-default').DataTable();
      // [ Row Grouping ]
      var table1 = $('#row-grouping').DataTable({
        columnDefs: [
          {
            visible: false,
            targets: 2
          }
        ],
        order: [[2, 'asc']],
        displayLength: 25,
        drawCallback: function (settings) {
          var api = this.api();
          var rows = api
            .rows({
              page: 'current'
            })
            .nodes();
          var last = null;

          api
            .column(2, {
              page: 'current'
            })
            .data()
            .each(function (group, i) {
              if (last !== group) {
                $(rows)
                  .eq(i)
                  .before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

                last = group;
              }
            });
        }
      });
      // [ Order by the grouping ]
      $('#row-grouping tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
          table.order([2, 'desc']).draw();
        } else {
          table.order([2, 'asc']).draw();
        }
      });
      // [ Footer callback ]
      $('#footer-callback').DataTable({
        footerCallback: function (row, data, start, end, display) {
          var api = this.api(),
            data;

          // Remove the formatting to get integer data for summation
          var intVal = function (i) {
            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
          };

          // Total over all pages
          total = api
            .column(4)
            .data()
            .reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);

          // Total over this page
          pageTotal = api
            .column(4, {
              page: 'current'
            })
            .data()
            .reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);

          // Update footer
          $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        }
      });
      // [ Custom Toolbar Elements ]
      $('#c-tool-ele').DataTable({
        dom: '<"toolbar">frtip'
      });
      // [ Custom Toolbar Elements ]
      $('div.toolbar').html('<b>Custom tool bar! Text/images etc.</b>');
      // [ custom callback ]
      $('#row-callback').DataTable({
        createdRow: function (row, data, index) {
          if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
            $('td', row).eq(5).addClass('highlight');
          }
        }
      });
    </script>

    <script>
      // Add Location Form Validation
      document.addEventListener('DOMContentLoaded', function () {
          document.getElementById('AddLocationForm').addEventListener('submit', function (event) {
              event.preventDefault(); // Prevent form submission

              // Get form elements
              const locationInput = document.getElementById('AddLocation');
              const locationError = document.getElementById('locationError');

              const pincodeInput = document.getElementById('AddPincode');
              const pincodeError = document.getElementById('pincodeError');

              const statusSelect = document.getElementById('StatusLocation');
              const statusError = document.getElementById('statusError');

              let isValid = true;

              // Reset error states
              locationInput.classList.remove('error');
              locationError.style.display = 'none';

              pincodeInput.classList.remove('error');
              pincodeError.style.display = 'none';

              statusSelect.classList.remove('error');
              statusError.style.display = 'none';

              // Validate Location Input
              if (locationInput.value.trim() === '') {
                  isValid = false;
                  locationInput.classList.add('error');
                  locationError.style.display = 'block';
              }

              // Validate Pincode Input
              if (pincodeInput.value.trim() === '') {
                  isValid = false;
                  pincodeInput.classList.add('error');
                  pincodeError.style.display = 'block';
              }

              // Validate Status Select
              if (!statusSelect.value) {
                  isValid = false;
                  statusSelect.classList.add('error');
                  statusError.style.display = 'block';
              }

              // If valid, submit the form (or do other actions)
              if (isValid) {
                  window.location.href = "https://app.abstractcrm.com/client/master/location-list";
              }
          });
      });
    </script>


 @endpush
@endsection
