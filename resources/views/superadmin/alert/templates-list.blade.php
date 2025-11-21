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
              <h4 class="mb-2">Alert Templates</h4>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">SuperCRM</a></li>
              <li class="breadcrumb-item"><a>Alert</a></li>
              <li class="breadcrumb-item" aria-current="page">Templates</li>
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
                <div class="col-9">
                  <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item me-2">
                      <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#alerts" role="tab"
                        aria-controls="pills-home" aria-selected="true">Alert Templates</a>
                    </li>
                    <li class="nav-item me-2">
                      <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#new-updates" role="tab"
                        aria-controls="pills-profile" aria-selected="false">New Update Templates</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#offer" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Offer Templates</a>
                    </li>
                  </ul>
                </div>
                <div class="col-3 text-right">
                  <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px" onclick="openAddTemplate()"><i data-feather="navigation" class="me-2 mt-1 wh15px"></i>Add Template</button>
                </div>
            </div>
          </div>
          <div class="card-body pc-component billing-cardbody">
            <div class="tab-content " id="pills-tabContent">
              <div class="tab-pane fade show active" id="alerts" role="tabpanel" >
                <div class="row mt-3">
                  <div class="col-4">
                    <div class="card alert-card">
                      <div class="card-body">
                        <h5 class="card-title">Plan Expiry Reminder </h5>
                        <p class="card-text">Hi Customer, your {variable_one} plan ends on {variable_two}. Renew now to continue enjoying uninterrupted service.</p>
                        <a href="#"><span class="badge text-bg-primary f-14 del-btn">Renew now</span></a> <span class="badge bg-light-danger f-14 del-btn">Delete</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card alert-card">
                      <div class="card-body">
                        <h5 class="card-title">Payment Reminder</h5>
                        <p class="card-text">Reminder: Dear Customer, your payment of ₹{variable_one} for CRM is due on {variable_two}. Kindly make the payment to avoid disruption. </p>
                        <a href="#"><span class="badge text-bg-primary f-14 del-btn">Pay now</span></a> <span class="badge bg-light-danger f-14 del-btn">Delete</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card alert-card">
                      <div class="card-body">
                        <h5 class="card-title">Maintenance Alert</h5>
                        <p class="card-text">Notice: Scheduled maintenance for CRM on {variable_one} from {variable_two}. Expect minor disruptions. Thank you for understanding.</p>
                        <a href="#"><span class="badge text-bg-primary f-14 del-btn">Know more</span></a> <span class="badge bg-light-danger f-14 del-btn">Delete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="new-updates" role="tabpanel" >
                <div class="row mt-3">
                  <div class="col-4">
                    <div class="card alert-card">
                      <div class="card-body">
                        <h5 class="card-title">Exciting Feature Alert</h5>
                        <p class="card-text">Dear ClientName, we’ve added exciting {variable_one} new feature to CRM. Explore {variable_one} features today!</p>
                        <a href="#"><span class="badge text-bg-primary f-14 del-btn">Try now</span></a> <span class="badge bg-light-danger f-14 del-btn">Delete</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card alert-card">
                      <div class="card-body">
                        <h5 class="card-title">New Module Announcement</h5>
                        <p class="card-text">Good News! The new {variable_one} module is now live in your CRM. Enhance your experience check it out now</p>
                        <a href="#"><span class="badge text-bg-primary f-14 del-btn">Try now</span></a> <span class="badge bg-light-danger f-14 del-btn">Delete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade " id="offer" role="tabpanel">
                <div class="row mt-3">
                  <div class="col-12 text-center" >
                    <p>No any template available!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Template Baar-->
    @include('superadmin.alert.add-template')

    <div id="sdbr-overlay" class="sdbr-overlay" onclick="closeAllSidebars()"></div>

  @push('scripts')


<!-- Sidebars -->
<script>

  const overlay = document.getElementById('sdbr-overlay');

  function openAddTemplate() {
    const sidebar = document.getElementById('AddTemplateBar');
    sidebar.classList.add('open');
    overlay.classList.add('show');
  }

  function closeAddTemplate() {
    const sidebar = document.getElementById('AddTemplateBar');
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
  }

  function closeAllSidebars() {
    closeAddTemplate();
  }

</script>




 @endpush
@endsection
