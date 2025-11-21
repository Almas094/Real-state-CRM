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

              <h4 class="mb-2">Add Users</h4>

            </div>

          </div>

          <div class="col-md-12">

            <ul class="breadcrumb">

              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">SuperCRM</a></li>

              <li class="breadcrumb-item"><a>Users</a></li>

              <li class="breadcrumb-item" aria-current="page">Add Users</li>

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

                <form class="lead-form" id="AddClient">

                  <div class="form-group row">

                    <div class="col-lg-3">

                      <label class="form-label" for="Name">Name:</label>

                      <input type="text" class="form-control" id="Name" name="name" placeholder="Enter name">

                      <div class="error-message" id="CompanyNameError">Company Name is required.</div>

                    </div>


                    <div class="col-lg-3">

                      <label class="form-label" for="PhoneNumber">Phone Number:</label>

                      <input type="tel" class="form-control" id="PhoneNumber" placeholder="Enter phone number">

                      <div class="error-message" id="PhoneNumberError">Enter a valid 10-digit phone number.</div>

                    </div>

                    <div class="col-lg-3">

                      <label class="form-label" for="EmailAddress">Email Address:</label>

                      <input type="email" class="form-control" id="EmailAddress" placeholder="Enter company email">

                      <div class="error-message" id="EmailAddressError">Enter a valid email address.</div>

                    </div>

                    

                    <div class="col-lg-3">

                      <label class="form-label" for="ActiveStatus">Role:</label>

                      <select class="form-select" id="role">

                        <option selected disabled>Select Role</option>

                        <option>Inactive</option>

                      </select>

                      <div class="error-message" id="ActiveStatusError">Status is required.</div>

                    </div>

                    <div class="col-lg-3">

                      <label class="form-label" for="CompanyLogo">Upload Photo:</label>

                      <input class="uppy-FileInput-input form-control" id="CompanyLogo" type="file" name="files[]">

                      <div class="error-message" id="CompanyLogoError">Company Logo is required.</div>

                    </div>

                    <div class="col-lg-3">

                      <label class="form-label" for="UserId">User Id:</label>

                      <input type="text" class="form-control" id="UserId" placeholder="Enter user login id">

                      <div class="error-message" id="UserIdError">User ID is required.</div>

                    </div>

                    <div class="col-lg-3">

                      <label class="form-label" for="Password">Password:</label>

                      <input type="password" class="form-control" id="Password" placeholder="Enter strong password">

                      <div class="error-message" id="PasswordError">Password must be at least 8 characters long.</div>

                    </div>

                    <div class="col-lg-3">

                      <label class="form-label" for="ConfirmPassword">Confirm Password:</label>

                      <input type="password" class="form-control" id="ConfirmPassword" placeholder="Re-enter password">

                      <div class="error-message" id="ConfirmPasswordError">Passwords do not match.</div>

                    </div>

                  </div>

                  <div class="form-group row">

                    <div class="col-lg-9">

                      <label class="form-label" for="address">Address:</label>

                      <input type="text" class="form-control" id="address" placeholder="Enter proper address...">

                      <div class="error-message" id="address">Company Address is required.</div>

                    </div>

                    <div class="col-lg-3">

                      <label class="form-label" for="ActiveStatus">Status:</label>

                      <select class="form-select" id="ActiveStatus">

                        <option selected disabled>Select status</option>

                        <option>Active</option>

                        <option>Inactive</option>

                      </select>

                      <div class="error-message" id="ActiveStatusError">Status is required.</div>

                    </div>

                  </div>

                  <button type="button" class="btn btn-primary mt-2 me-1" id="SubmitForm">Submit</button>

                  <button type="reset" class="btn mt-2 btn-secondary">Clear</button>

                </form>

                </div>

              </div>

            </div>

        </div>

    </div>



    @push('scripts')



  <script>

    document.getElementById('SubmitForm').addEventListener('click', function () {

      let isValid = true; // Track form validity



      function validateField(id, errorId, condition, errorMessage) {

        const field = document.getElementById(id);

        const errorField = document.getElementById(errorId);



        if (condition) {

          errorField.style.display = 'none';

          field.classList.remove('is-invalid');

        } else {

          errorField.textContent = errorMessage;

          errorField.style.display = 'block';

          field.classList.add('is-invalid');

          isValid = false;

        }

      }



      // Validate fields

      validateField('CompanyName', 'CompanyNameError', document.getElementById('CompanyName').value.trim() !== '', 'Company Name is required.');

      validateField('ClientName', 'ClientNameError', document.getElementById('ClientName').value.trim() !== '', 'Client Name is required.');

      validateField('PhoneNumber', 'PhoneNumberError', /^\d{10}$/.test(document.getElementById('PhoneNumber').value.trim()), 'Enter a valid 10-digit phone number.');

      validateField('EmailAddress', 'EmailAddressError', /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById('EmailAddress').value.trim()), 'Enter a valid email address.');

      validateField('CompanyLogo', 'CompanyLogoError', document.getElementById('CompanyLogo').value.trim() !== '', 'Company Logo is required.');

      validateField('UserId', 'UserIdError', document.getElementById('UserId').value.trim() !== '', 'User ID is required.');

      validateField('Password', 'PasswordError', document.getElementById('Password').value.trim().length >= 8, 'Password must be at least 8 characters long.');

      validateField('ConfirmPassword', 'ConfirmPasswordError', document.getElementById('ConfirmPassword').value.trim() === document.getElementById('Password').value.trim(), 'Passwords do not match.');

      validateField('CompanyAddress', 'CompanyAddressError', document.getElementById('CompanyAddress').value.trim() !== '', 'Company Address is required.');

      /* validateField('ActiveStatus', 'ActiveStatusError', document.getElementById('ActiveStatus').value !== 'Select status', 'Status is required.'); */



      if (isValid) {

    

        const alertDiv = document.createElement('div');

        

        alertDiv.className = 'alert alert-success form-success';

        alertDiv.setAttribute('role', 'alert');

        

        alertDiv.textContent = 'Nice, Client successfully registered to the CRM.';

        

        document.body.appendChild(alertDiv);

        

        // Reset the form after submission

        document.getElementById('CompanyName').value = "";

        document.getElementById('ClientName').value = "";

        document.getElementById('PhoneNumber').value = "";

        document.getElementById('EmailAddress').value = "";

        document.getElementById('CompanyLogo').value = "";

        document.getElementById('UserId').value = "";

        document.getElementById('Password').value = "";

        document.getElementById('ConfirmPassword').value = "";

        document.getElementById('CompanyAddress').value = "";



        setTimeout(() => {

          alertDiv.style.display = 'none';

        }, 3500);



        

      }



    });

  </script>





 @endpush

@endsection

