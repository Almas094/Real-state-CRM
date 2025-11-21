@extends('layouts.supercrm-layout')

@section('title', 'Abstract CRM')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" type="text/css">

@section('content')
<section class="pc-container">
  <div class="pc-content">

    <!-- Section Header -->
    <div class="page-header" style="padding-top:0px;">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h4 class="mb-2">Send Notification</h4>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">SuperCRM</a></li>
              <li class="breadcrumb-item"><a>Alert</a></li>
              <li class="breadcrumb-item" aria-current="page">Send-notification</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter Form -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-body"> 
                <form class="mt-2">
                  <div class="row">
                    <div class="col-4">
                      <label class="text-lg-end mt-1 mb-2">Plan Expiration:</label>
                      <div class="input-daterange input-group mb-2" id="expiration-datepicker">
                        <input type="text" class="form-control text-left" placeholder="Start date" name="range-start">
                        <span class="input-group-text">to</span>
                        <input type="text" class="form-control text-end date-range-end" placeholder="End date" name="range-end">
                      </div>
                    </div>  
                    <div class="col-4">
                      <label class="text-lg-end mt-2 mb-2">Billing Status:</label>
                      <select class="form-control billing-status-select mb-2" name="Filter-Billing-Status" id="Filter-Billing-Status" multiple>
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                        <option value="Cancelled">Cancelled</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="text-lg-end mt-2 mb-2">Users limit:</label>
                      <select class="form-control users-limit mb-2" name="Filter-Users-Limit" id="Filter-Users-Limit" multiple>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="text-lg-end mt-2 mb-2">Validity:</label>
                      <select class="form-control users-limit mb-2" name="Filter-Validity" id="Filter-Validity" multiple>
                        <option value="7 Days - Trial">7 Days Trial</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                        <option value="2 Years">2 Years</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="text-lg-end mt-2 mb-2">CRM Status:</label>
                      <select class="form-control users-limit mb-2" name="Filter-CRM-Status" id="Filter-CRM-Status" multiple>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label class="text-lg-end mt-2 mb-2">Filter Data Now:</label>
                      <button type="button" class="btn  btn-primary" style="width:100%;">Search</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card table-card">
              <div class="card-header table-header">
                <div class="row">
                    <div class="col-4 d-flex">
                      <input type="text" id="selectedCount" class="form-control bulkCount" value="0" disabled>
                      <select class="form-control billing-status-select bulkSelect" name="Bulk-Action" id="Bulk-Action">
                        <option value="" disabled selected>Bulk Action</option>
                        <option value="Alerts">Send Bulk Alerts</option>
                        <option value="New Update">Send New Update Notification</option>
                        <option value="Offer">Send Offer Notification</option>
                      </select>
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
      <th><input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"></th>
      <th>Sr.No.</th>
      <th>Client Details</th>
      <th>Contact</th>
      <th>Subscription</th>
      <th>Duration</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody class="cmb-5">
    <tr>
      <td><input type="checkbox" class="row-select" name="selectedRows[]"></td>
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
      <td>
        <span class="badge bg-light-warning mb-2">7 Days Trial</span><br>
        <span class="badge bg-light-success">Active</span>                          
      </td>
    </tr>
    <tr>
      <td><input type="checkbox" class="row-select" name="selectedRows[]"></td>
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
      <td>
        <span class="badge bg-light-warning mb-2">7 Days Trial</span><br>
        <span class="badge bg-light-success">Active</span>                          
      </td>
    </tr>
    <tr>
      <td><input type="checkbox" class="row-select" name="selectedRows[]"></td>
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
      <td>
        <span class="badge bg-light-warning mb-2">7 Days Trial</span><br>
        <span class="badge bg-light-success">Active</span>                          
      </td>
    </tr>
  </tbody>
</table>
                </div>
              </div>
            </div>
        </div>
    </div>

<script>
  // Update the row count display
  function updateRowCount() {
    const selectedRows = document.querySelectorAll('.row-select:checked').length;
    document.getElementById('selectedCount').value = selectedRows;
  }

  // Toggle all rows when 'Select All' is clicked
  function toggleSelectAll(source) {
    const checkboxes = document.querySelectorAll('.row-select');
    checkboxes.forEach((checkbox) => {
      checkbox.checked = source.checked;
    });
    updateRowCount();
  }

  // Attach event listener to each individual checkbox
  document.querySelectorAll('.row-select').forEach((checkbox) => {
    checkbox.addEventListener('change', updateRowCount);
  });
</script>


<script src="{{ asset('assets/js/plugins/simple-datatables.js') }}"></script>
<script>
  const dataTable = new simpleDatatables.DataTable('#clientTable', {
    sortable: false,
    perPage: 25
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
    

  @push('scripts')

 @endpush
@endsection
