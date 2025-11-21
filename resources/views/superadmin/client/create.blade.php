@extends('layouts.supercrm-layout')

@section('title', 'Abstract CRM')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap5.min.css') }}">
@section('content')
<section class="pc-container">
  <div class="pc-content">

    <!-- Section Header -->

    <div class="page-header" style="padding-top:0px;">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h4 class="mb-2">Add Leads</h4>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">SuperCRM</a></li>
              <li class="breadcrumb-item"><a>Clients</a></li>
              <li class="breadcrumb-item" aria-current="page">Add Client</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive dt-responsive">
                <form id="clientForm" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" id="id" name="id" value="{{$clientInfo['id'] ?? ''}}">
                  <div class="form-group row">
                    <div class="form-group col-lg-3">
                      <label class="form-label" for="CompanyName">Company Name:</label>
                      <input type="text" class="form-control" id="CompanyName" name="company_name" value="{{ old('company_name', $clientInfo->company_name ?? '') }}" placeholder="Enter company name">
                      <div class="error-message" id="CompanyNameError">Company Name is required.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="ClientName">Client Name:</label>
                      <input type="text" class="form-control" id="ClientName" name="client_name" value="{{old('name',$clientInfo->name ?? '' ) }}" placeholder="Enter client name">
                      <div class="error-message" id="ClientNameError">Client Name is required.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="PhoneNumber">Phone Number:</label>
                      <input type="tel" class="form-control" id="PhoneNumber" name="phone" value="{{ old('phone',$clientInfo->phone ?? '') }}" placeholder="Enter phone number">
                      <div class="error-message" id="PhoneNumberError">Enter a valid 10-digit phone number.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="EmailAddress">Email Address:</label>
                      <input type="email" class="form-control" id="EmailAddress" name="email" value="{{ old('email',$clientInfo->email ?? '')}}" placeholder="Enter company email">
                      <div class="error-message" id="EmailAddressError">Enter a valid email address.</div>
                    </div>                

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="CompanyLogo">Project Type:</label>
                      <select name="project_type_id" id="project_type_id" class="form-control">
                        <option value="">Select Project Type</option>
                        @foreach($projct_type as $value)
                          <option value="{{$value->id}}" {{ old('project_type_id',$clientInfo?->project_type_id) == $value->id ? 'selected' : ''}}>{{$value->name}}</option>
                        @endforeach
                      </select>
                      <div class="error-message" id="CompanyLogoError">Company Project Type is required.</div>
                    </div>
                    
                    <div class="form-group col-lg-3">
                      <label class="form-label" for="CompanyLogo">Upload Company Logo:</label>
                      <input class="uppy-FileInput-input form-control" id="CompanyLogo" type="file" name="company_logo">
                      <div class="error-message" id="CompanyLogoError">Company Logo is required.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="UserId">User Id:</label>
                      <input type="text" class="form-control" id="UserId" name="login_id" value="{{ old('login_id',$clientInfo->login_id ?? '') }}" placeholder="Enter user login id">
                      <div class="error-message" id="UserIdError">User ID is required.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="Password">Password:</label>
                      <input type="password" class="form-control" id="Password" name="password" value="{{ old('remember_password',$clientInfo->remember_password ?? '') }}" placeholder="Enter strong password">
                      <div class="error-message" id="PasswordError">Password must be at least 8 characters long.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="ConfirmPassword">Confirm Password:</label>
                      <input type="password" class="form-control" id="ConfirmPassword" name="confirm_password" value="{{ old('remember_password',$clientInfo->remember_password ?? '')}}" placeholder="Re-enter password">
                      <div class="error-message" id="ConfirmPasswordError">Passwords do not match.</div>
                    </div>
                  
                    <div class="form-group col-lg-6">
                      <label class="form-label" for="CompanyAddress">Company Address:</label>
                      <input type="text" class="form-control" id="CompanyAddress" name="address" value="{{ old('address',$clientInfo->address ?? '') }}" placeholder="Enter proper company address...">
                      <div class="error-message" id="CompanyAddressError">Company Address is required.</div>
                    </div>

                    <div class="form-group col-lg-3">
                      <label class="form-label" for="ActiveStatus">Status:</label>
                      <select class="form-select" id="ActiveStatus" name="status">
                        <option selected disabled>Select status</option>
                        <option {{ old('status',$clientInfo?->status) =='active' ? 'selected' : ''}}>Active</option>
                        <option {{ old('status',$clientInfo?->status) =='inactive' ? 'selected' : ''}}>Inactive</option>
                      </select>
                      <div class="error-message" id="ActiveStatusError">Status is required.</div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary mt-2 me-1">Submit</button>
                  <button type="reset" class="btn mt-2 btn-secondary">Clear</button>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>



    @push('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
   $(document).ready(function () {
    $('#clientForm').on('submit', function (e) {
        e.preventDefault();

        // Clear old errors
        $('#clientForm .is-invalid').removeClass('is-invalid');
        $('#clientForm .invalid-feedback').text('');

        const id = $('#id').val();
        let formData = new FormData(this);
        let url = id
        ? "{{ route('client.update') }}"
        : "{{ route('client.store') }}";

        $.ajax({
            url: url,
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                     setTimeout(function() {
                          window.location.href = "{{ route('client.index') }}";
                      }, 2000);
                    $('#clientForm')[0].reset();
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        let input = $('[name="' + key + '"]');
                        input.addClass('is-invalid');
                        input.next('.invalid-feedback').text(value[0]);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong. Please try again later.'
                    });
                }
            }
        });
    });
});

  </script>
 @endpush
@endsection