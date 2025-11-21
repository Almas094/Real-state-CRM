@extends('layouts.client-layout')

@section('title', 'Abstract CRM')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap5.min.css') }}">
@section('content')
<section class="pc-container">
  <div class="pc-content">

    <!-- Section Header -->
    <div class="page-header" style="padding-top:0px; margin-top:-5px;">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="mb-3">Add Leads</h2>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a>Leads</a></li>
              <li class="breadcrumb-item" aria-current="page">Add Leads</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-header table-header">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mt-2">Add Lead</h5>
                    </div>
                    <div class="col-4 text-right">
                        <button type="button" class="btn btn-primary me-3 d-inline-flex" id="openSidebarBtn"><i class="ti ti-file-import me-2"></i>Import Bulk Leads</button>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive dt-responsive">
                  <form class="lead-form">
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="form-label">Lead Name <span style="color:red;">*</span>:</label>
                        <input type="text" class="form-control" placeholder="Enter full name" Required>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Mobile Number <span style="color:red;">*</span>:</label>
                        <input type="tel" class="form-control" placeholder="Enter contact number" Required>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Alt-Mobile Number:</label>
                        <input type="tel" class="form-control" placeholder="Enter alternative number">
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Email Address:</label>
                        <input type="email" class="form-control" placeholder="Enter Email Address">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="form-label">Project:</label>
                        <select class="form-select">
                          <option selected disabled>Select project</option>
                          <option>Project one</option>
                          <option>Project two</option>
                          <option>Project three</option>
                          <option>Project four</option>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Looking For:</label>
                        <select class="form-select">
                          <option selected disabled>Select configuration</option>
                          <option>1 BHK</option>
                          <option>2 BHK</option>
                          <option>3 BHK</option>
                          <option>4 BHK</option>
                          <option>Studio</option>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Budget:</label>
                        <select class="form-select">
                          <option selected disabled>Select budget range</option>
                          <option>10 - 20 Lakh</option>
                          <option>20 - 30 Lakh</option>
                          <option>30 - 40 Lakh</option>
                          <option>50 - 60 Lakh</option>
                          <option>60 - 70 Lakh</option>
                          <option>70 - 80 Lakh</option>
                          <option>80 - 99 Lakh</option>
                          <option>01 - 1.5 Cr</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-12">
                        <label class="form-label">Note:</label>
                        <input type="text" class="form-control" placeholder="Describe about lead or requirement" Required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="form-label">Medium:</label>
                        <select class="form-select">
                          <option selected disabled>Select medium</option>
                          <option>Digital</option>
                          <option>Hoardings</option>
                          <option>Newspaper</option>
                          <option>Channel Partner</option>
                          <option>Other</option>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Source <span style="color:red;">*</span>:</label>
                        <select class="form-select">
                          <option selected disabled>Select source</option>
                          <option>Facebook</option>
                          <option>Instagram</option>
                          <option>Website</option>
                          <option>Housing</option>
                          <option>Magicbricks</option>
                          <option>Other</option>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Campaign:</label>
                        <select class="form-select">
                          <option selected disabled>Select campaign:</option>
                          <option>Campaign one</option>
                          <option>Campaign two</option>
                          <option>Campaign three</option>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-label">Sub Source:</label>
                        <input type="text" class="form-control" placeholder="Enter source" Required>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-2 me-1 d-inline-flex" style="padding-left:35px; padding-right:35px;">Submit</button> <button type="button" class="btn mt-2 btn-secondary py-30 d-inline-flex">Clear</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Form Sidebar -->
    <div class="crm-sidebar" id="crmSidebar">
        <button class="crm-close-btn" id="closeSidebarBtn">&times;</button>
        <h2>Upload Bulk Leads</h2>
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
      // Add Sub-Deposition Form Form Validation
      document.addEventListener('DOMContentLoaded', function () {
          document.getElementById('AddSubDepositionForm').addEventListener('submit', function (event) {
              event.preventDefault(); // Prevent form submission

              // Get form elements
              const subdepositionInput = document.getElementById('AddSubDeposition');
              const subdepositionError = document.getElementById('subdepositionnError');

              const depositionInput = document.getElementById('SelectDeposition');
              const depositionError = document.getElementById('depositionError');

              const statusSelect = document.getElementById('StatusSubDeposition');
              const statusError = document.getElementById('statusError');

              let isValid = true;

              // Reset error states
              subdepositionInput.classList.remove('error');
              subdepositionError.style.display = 'none';

              depositionInput.classList.remove('error');
              depositionError.style.display = 'none';

              statusSelect.classList.remove('error');
              statusError.style.display = 'none';

              // Validate Subdeposition Input
              if (subdepositionInput.value.trim() === '') {
                  isValid = false;
                  subdepositionInput.classList.add('error');
                  subdepositionError.style.display = 'block';
              }

              // Validate Deposition Input
              if (!depositionInput.value) {
                  isValid = false;
                  depositionInput.classList.add('error');
                  depositionError.style.display = 'block';
              }

              // Validate Status Select
              if (!statusSelect.value) {
                  isValid = false;
                  statusSelect.classList.add('error');
                  statusError.style.display = 'block';
              }

              // If valid, submit the form (or do other actions)
              if (isValid) {
                  window.location.href = "https://app.abstractcrm.com/client/master/subdisposition-list";
              }
          });
      });
    </script>


 @endpush
@endsection
