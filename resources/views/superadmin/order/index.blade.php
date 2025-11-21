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
              <h4 class="mb-2">Invoices</h4>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">SuperCRM</a></li>
              <li class="breadcrumb-item"><a>Billing</a></li>
              <li class="breadcrumb-item" aria-current="page">Invoices</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row card-row-1">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header table-header">
            <div class="row">
                <div class="col-10">
                  <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-all" role="tab"
                        aria-controls="pills-home" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-paid" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Paid</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-unpaid" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Unpaid</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-cancelled" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Cancelled</a>
                    </li>
                  </ul>
                </div>
                <div class="col-2 text-right">
                                    <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px"
                                        onclick="openFilterbar()"><i data-feather="filter"
                                            class="me-1 mt-1 wh15px"></i>Filter</button>
                                </div>
            </div>
          </div>
          <div class="card-body pc-component billing-cardbody">
            <div class="tab-content " id="pills-tabContent">
              <div class="tab-pane fade show active table-responsive" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table table-hover client-table" id="orderTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Client Details</th>
                      <th>Subscription</th>
                      <th>Duration</th>
                      <th class="text-center">Payable Amount</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="cmb-5">
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0006</h6>
                        <p class="f-14 mb-0">01</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 3</p>
                        <p class="f-14 mb-0">Validity: 6 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 30-06-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 8999</p>
                        <span class="badge bg-light-success">Paid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#" onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0005</h6>
                        <p class="f-14 mb-0">02</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 3</p>
                        <p class="f-14 mb-0">Validity: 3 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 31-03-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 4999</p>
                        <span class="badge bg-light-danger">Unpaid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0004</h6>
                        <p class="f-14 mb-0">03</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 5</p>
                        <p class="f-14 mb-0">Validity: 12 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 07-01-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 14999</p>
                        <span class="badge bg-light-success">Paid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0003</h6>
                        <p class="f-14 mb-0">04</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 6</p>
                        <p class="f-14 mb-0">Validity: 6 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 07-01-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 12499</p>
                        <span class="badge bg-light-danger">Cancelled</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0002</h6>
                        <p class="f-14 mb-0">05</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
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
                        <p class="f-14 mb-2">₹ 14999</p>
                        <span class="badge bg-light-success">Paid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0001</h6>
                        <p class="f-14 mb-0">06</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
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
                        <p class="f-14 mb-2">₹ 14999</p>
                        <span class="badge bg-light-danger">cancelled</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade table-responsive" id="pills-paid" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table table-hover client-table" id="InvoicePaid">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Client Details</th>
                      <th>Subscription</th>
                      <th>Duration</th>
                      <th class="text-center">Payable Amount</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="cmb-5">
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0006</h6>
                        <p class="f-14 mb-0">01</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 3</p>
                        <p class="f-14 mb-0">Validity: 6 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 30-06-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 8999</p>
                        <span class="badge bg-light-success">Paid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0004</h6>
                        <p class="f-14 mb-0">02</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 5</p>
                        <p class="f-14 mb-0">Validity: 12 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 07-01-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 14999</p>
                        <span class="badge bg-light-success">Paid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0002</h6>
                        <p class="f-14 mb-0">03</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
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
                        <p class="f-14 mb-2">₹ 14999</p>
                        <span class="badge bg-light-success">Paid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade table-responsive" id="pills-unpaid" role="tabpanel" aria-labelledby="pills-contact-tab">
                <table class="table table-hover client-table" id="InvoiceUnpaid">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Client Details</th>
                      <th>Subscription</th>
                      <th>Duration</th>
                      <th class="text-center">Payable Amount</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="cmb-5">
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0005</h6>
                        <p class="f-14 mb-0">01</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 3</p>
                        <p class="f-14 mb-0">Validity: 3 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 31-03-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 4999</p>
                        <span class="badge bg-light-danger">Unpaid</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade table-responsive" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-contact-tab">
                <table class="table table-hover client-table" id="InvoiceCancelled">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Client Details</th>
                      <th>Subscription</th>
                      <th>Duration</th>
                      <th class="text-center">Payable Amount</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="cmb-5">
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0003</h6>
                        <p class="f-14 mb-0">01</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">Users: 6</p>
                        <p class="f-14 mb-0">Validity: 6 months</p>
                      </td>
                      <td>
                        <p class="f-14 mb-2">From: 01-01-2025</p>
                        <p class="f-14 mb-0">To: 07-01-2025</p>
                      </td>
                      <td class="text-center">
                        <p class="f-14 mb-2">₹ 12499</p>
                        <span class="badge bg-light-danger">Cancelled</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h6 class="mb-2">ADW0001</h6>
                        <p class="f-14 mb-0">02</p>
                      </td>
                      <td>
                          <h6 class="mb-2">Myspace Developers</h6>
                          <p class="f-14 mb-0">POC: Akanksha Loke</p>
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
                        <p class="f-14 mb-2">₹ 14999</p>
                        <span class="badge bg-light-danger">cancelled</span>                          
                      </td>
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-action-1">
                            <li><a class="dropdown-item f-13" href="#"onclick="openInvoiceStatusBar()" ><i class="ti ti-edit"></i>Change Status </a></li>
                            <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar()" ><i class="ti ti-download"></i>Download Invoice</a></li>
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
    </div>
  @include('superadmin.order.order-table-filter')
    <!-- FilterBar -->
    @include('superadmin.order.invoice-status')

    <!-- DownloadInvoiceBar -->
    @include('superadmin.order.download-invoice')

    <div id="sdbr-overlay" class="sdbr-overlay" onclick="closeAllSidebars()"></div>

  @push('scripts')


<!-- [Page Specific JS] start -->
<script>

  let table;

  $(document).ready(function() {
    table = $('#orderTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('order.list') }}",
            type: "POST",
            data: function(d) {
                d._token       = "{{ csrf_token() }}";
                d.start_date   = $('input[name="start_date"]').val();
                d.end_date     = $('input[name="end_date"]').val();
                d.order_status = $('#order_status').val();
                d.user_plan_id = $('#f_user_plan_id').val();
                d.no_of_month  = $('#no_of_month').val();
            }   
        },
        columns: [
          {
                data: 'id',
                name: 'id'
            },
            {
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'subscription',
                name: 'subscription'
            },
            {
                data: 'duration',
                name: 'duration'
            },
            {
                data: 'status',
                orderable: false,
                searchable: false,
                className: "text-center"
            },
            {
                data: 'action',
                orderable: false,
                searchable: false,
                className: "text-center"
            }
        ]

    });
      $("#FilterSearchBtn").on("click", function () {
          table.ajax.reload();
      });
    });

        
  const invoiceAllTable = new simpleDatatables.DataTable('#orderTable', {
    sortable: false,
    perPage: 5
  });

  const invoicePaidTable = new simpleDatatables.DataTable('#InvoicePaid', {
    sortable: false,
    perPage: 5
  });

  const invoiceUnpaidTable = new simpleDatatables.DataTable('#InvoiceUnpaid', {
    sortable: false,
    perPage: 5
  });

  const invoiceCancelledTable = new simpleDatatables.DataTable('#InvoiceCancelled', {
    sortable: false,
    perPage: 5
  });
</script>
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

<!-- Sidebars -->
<script>

  const overlay = document.getElementById('sdbr-overlay');

 function openInvoiceStatusBar(data) {

    const sidebar = document.getElementById('InvoiceStatusBar');
    sidebar.classList.add('open');
    overlay.classList.add('show');

    // Fill form fields
    $('#order_id').val(data.id);
    $('#invoice_id').val(data.order_id);
    $('#company_name').val(data.company_name);
    $('#UpdateStatus').val(data.status);
}

$(document).on('click', '.open-status', function () {

    let data = {
        id: $(this).data('id'),
        order_id: $(this).data('order-id'),
        company_name: $(this).data('company-name'),
        status: $(this).data('status')
    };

    openInvoiceStatusBar(data);
});

  $('#updateStatus').on('submit', function (e) {
    e.preventDefault();

    const formData = $(this).serialize();

    $.ajax({
        url: "{{ route('order.update.status') }}",
        type: "POST",
        data: formData,


        success: function (response) {

            // SUCCESS MESSAGE
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message ?? 'Status updated successfully',
                timer: 1500,
                showConfirmButton: false
            });

            // Close sidebar after success
            $("#InvoiceStatusBar").removeClass('open');
            $(".overlay").removeClass('show');

            // Reset dropdown
            $("#order_status").val("");

            // Reload DataTable (if exists)
            if (typeof table !== "undefined") {
                table.ajax.reload(null, false);
            }
        },

        error: function (xhr) {
            console.log("ERROR:", xhr.responseText);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        }
    });
});

  function closeInvoiceStatusBar() {
    const sidebar = document.getElementById('InvoiceStatusBar');
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
  }

  function openDownloadInvoiceBar(orderId) {
    const sidebar = document.getElementById('DownloadInvoice');

    // Load invoice details via AJAX
    $.ajax({
        url: "{{ route('order.detail') }}",  
        type: "POST",
        data: {
            id: orderId,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            // Inject dynamic invoice values
            $("#invoice_number").text(response.invoice_no);
            $("#invoice_date").text(response.date);
            $("#invoice_due_date").text(response.due_date);
          
            $("#n_company_name").text(response.company.name);
            $("#company_address").text(response.company.address);
            $("#company_email").text('Email :'+response.company.email);

            $("#client_name").text(response.client.name);
            $("#client_address").text(response.client.address);
            $("#client_email").text('Email :'+response.client.email);

            $("#invoice_items").html(response.items_html);
            $("#n_invoice_total").text(response.grand_total);

            sidebar.classList.add('open');
            overlay.classList.add('show');
        }
    });
}


  function closeDownloadInvoiceBar() {
    const sidebar = document.getElementById('DownloadInvoice');
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
  }

  function closeAllSidebars() {
    closeInvoiceStatusBar();
    closeDownloadInvoiceBar();
  }

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
    document.addEventListener('DOMContentLoaded', function() {

            var multipleCancelButton = new Choices('#order_status', {
                removeItemButton: true,
                placeholderValue: 'Select billing status'
            });

            var multipleCancelButton = new Choices('#f_user_plan_id', {
                removeItemButton: true,
                placeholderValue: 'Select No Of user'
            });

            var multipleCancelButton = new Choices('#no_of_month', {
                removeItemButton: true,
                placeholderValue: 'Select No Of months'
            });
            var multipleCancelButton = new Choices('#user_status', {
                removeItemButton: true,
                placeholderValue: 'Select status '
            });
        });

</script>




 @endpush
@endsection
