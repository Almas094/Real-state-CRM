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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">SuperCRM</a></li>
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
                                    <a href="/admin/client/add-client"><button type="button"
                                            class="btn btn-primary me-3 d-inline-flex btn-i-wh15px"><i
                                                data-feather="user-plus" class="me-1 mt-1 wh15px"></i>Add
                                            Client</button></a>
                                </div>
                                <div class="col-2 text-right">
                                    <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px"
                                        onclick="openFilterbar()"><i data-feather="filter"
                                            class="me-1 mt-1 wh15px"></i>Filter</button>
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

                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>

                                                    <ul class="dropdown-menu dropdown-action-1">

                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>

                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>

                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>

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

                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>

                                                    <ul class="dropdown-menu dropdown-action-1">

                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>

                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>

                                                        <li><a class="dropdown-item f-13"
                                                                href="#"onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>

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

                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>

                                                    <ul class="dropdown-menu dropdown-action-1">

                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>

                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>

                                                        <li><a class="dropdown-item f-13"
                                                                href="#"onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>

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
                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>
                                                    <ul class="dropdown-menu dropdown-action-1">
                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>
                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>
                                                        <li><a class="dropdown-item f-13"
                                                                href="#"onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>
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
                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>
                                                    <ul class="dropdown-menu dropdown-action-1">
                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>
                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>
                                                        <li><a class="dropdown-item f-13"
                                                                href="#"onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>
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
                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>
                                                    <ul class="dropdown-menu dropdown-action-1">
                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>
                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>
                                                        <li><a class="dropdown-item f-13"
                                                                href="#"onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>
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
                                                    <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"
                                                        data-bs-display="static" aria-expanded="false"></i>
                                                    <ul class="dropdown-menu dropdown-action-1">
                                                        <li><a class="dropdown-item f-13" href="#"
                                                                onclick="openViewClientDetails()"><i
                                                                    class="ti ti-eye"></i>View Details</a></li>
                                                        <li><a class="dropdown-item f-13" href="#"><i
                                                                    class="ti ti-edit"></i>Change Status</a></li>
                                                        <li><a class="dropdown-item f-13"
                                                                href="#"onclick="openSubscriptionbar()"><i
                                                                    class="ti ti-brand-pocket"></i>Manage Subscription</a>
                                                        </li>
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

    <script>
        let table;

        $(document).ready(function() {
            table = $('#clientTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('client.list') }}",
                    type: "POST",
                    data: function(d) {
                        d._token       = "{{ csrf_token() }}";

                        d.name   = $('input[name="clinet_name"]').val();
                        d.status       = $('#status').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'contact',
                        name: 'contact'
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


            // Update Status (Active/Inactive)

            $(document).on('change', '.toggle-status', function() {
                const id = $(this).data('id');
                const status = $(this).is(':checked') ? 'active' : 'inactive';
                $.ajax({
                    url: `{{ route('client.update.status') }}`,
                    method: 'POST',
                    data: {
                        status,
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
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
                            $('#role_status').val(data
                            .status); // make sure this matches option values ("active"/"inactive")
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
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                Swal.fire('Deleted!', 'Role has been deleted.',
                                    'success');
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
                let url = id ?
                    "{{ route('client.update', ':id') }}".replace(':id', id) :
                    "{{ route('client.store') }}";
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
                                input.addClass(
                                'is-invalid'); // Bootstrap-style red border
                                // If input is in a select2 or custom wrapper, adjust placement as needed
                                input.after(
                                    `<div class="invalid-feedback">${messages[0]}</div>`
                                    );
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
        (function() {
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

        function openSubscriptionbar(clientId) {

            const sidebar = document.getElementById('AddSubscription');
            sidebar.classList.add('open');
            overlay.classList.add('show');

            $.ajax({
                url: "{{ route('client.create.subscription', ':id') }}".replace(':id', clientId),
                type: "GET",
                success: function(response) {

                    // Fill basic info
                    $("#loginId").val(response.login_id);
                    $("#clientId").val(clientId);
                    $("#companyName").val(response.company_name);

                    // Populate User Plan dropdown
                    let planOptions = '<option selected disabled>Select Users Plan</option>';

                    response.user_plan.forEach(plan => {
                        planOptions +=
                            `<option value="${plan.id}" data-price="${plan.price}">${plan.name}</option>`;
                    });

                    $(".users-limit").html(planOptions);
                },
                error: function(xhr) {
                    console.log("ERROR:", xhr.responseText);
                }
            });
        }


        function closeSubscriptionbar() {
            const sidebar = document.getElementById('AddSubscription');
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        }

        function openViewClientDetails(clientId) {

            const sidebar = document.getElementById('ViewClientDetails');
            const overlay = document.getElementById('overlay');

            sidebar.classList.add('open');
            //overlay.classList.add('show');

            // Show loading
            document.getElementById('subscriptionSection').innerHTML = "<p>Loading...</p>";

            $.ajax({
                url: "{{ route('client.view', ':id') }}".replace(':id', clientId),
                method: "GET",
                success: function(client) {

                    // FILL ALL MAIN FIELDS
                    $("#clientLogo").attr("src", client.company_logo);
                    $("#d_clientId").text(client.id);
                    $("#d_companyName").text(client.company_name);
                    $("#clientPoc").text(client.name);
                    $("#clientContact").html("+91 " + client.phone + " <br> " + client.email);
                    $("#companyAddress").text(client.address);
                    $("#d_loginId").text("Userid : " + client.login_id);
                    $("#loginPassword").text("Password : " + client.remember_password);

                    // FILL SUBSCRIPTIONS
                    let html = "";

                    client.subscriptions.forEach(function(sub) {
                        html += `
    <div class="row mb-2">
        <div class="col-12 client-user-login">
            <h5>${sub.subscription_no}</h5>

            <div class="row mb-2">
                <div class="col-6">
                    <label>Subscription:</label>
                    <h6>Users : ${sub.users}</h6>
                    <h6>Validity : ${sub.validity} Months</h6>
                </div>
                <div class="col-6">
                    <label>Duration:</label>
                    <h6>From : ${sub.start_date}</h6>
                    <h6>To : ${sub.end_date}</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Total Payable Amount (₹):</label>
                    <h5>${sub.amount} 
                        <span class="badge bg-light-success mb-2">${sub.payment_status}</span>
                    </h5>
                </div>

                <div class="col-6">
                    <label>Subscription Status:</label>
                    <h5>
                        <span class="badge bg-light-${sub.status_color} mb-2">${sub.status}</span> 
                        <span class="badge bg-light-warning mb-2">Download Invoice</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    `;
                    });

                    $("#subscriptionSection").html(html);
                }
            });
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
        $(document).ready(function() {

            // SUBMIT SUBSCRIPTION 
            $("#subscriptionForm").on("submit", function(e) {
                e.preventDefault();

                let formData = new FormData(this);  // IMPORTANT for file upload

                // Append calculated fields manually (because disabled fields are not included)
                formData.append("id", $("#clientId").val());
                formData.append("user_plan_id", $("#user_plan_id").val());
                formData.append("months", $("#months").val());
                formData.append("coupon_code", $("#couponInput").val());
                formData.append("discount_amount", $("#discountAmount").val());
                formData.append("sub_total", $("#subtotal").val());
                formData.append("gst_amount", $("#gst").val());
                formData.append("finalTotal", $("#finalTotal").val());
                formData.append("payment_method", $("#payment_method").val());
                formData.append("coupon_id", $("#couponId").val());

                // File input (only if visible)
                if ($("#payment_method").val() === "cash") {
                    let file = $("#attachment")[0].files[0];
                    if (file) {
                        formData.append("attachment", file);
                    }
                }
                $.ajax({
                    url: "{{ route('order.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,   // needed for file upload
                    contentType: false,   // needed for file upload
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },

                    success: function(response) {

                        if (response.success) {
                            Swal.fire({
                                icon: "success",
                                title: "Subscription Added",
                                text: response.message,
                            });

                            // Reset form
                            $("#subscriptionForm")[0].reset();
                            $(".coupon-message").html("");
                            $("#gst, #subtotal, #finalTotal").val("");
                            $("#cashUploadBox").hide();

                            closeSubscriptionbar();
                            table.ajax.reload(null, false);

                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: response.message,
                            });
                        }
                    },

                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Validation Error",
                            text: xhr.responseJSON?.message ?? "Something went wrong!",
                        });
                    }
                });

            });

        });



        document.addEventListener('DOMContentLoaded', function() {

            var multipleCancelButton = new Choices('#user_status', {
                removeItemButton: true,
                placeholderValue: 'Select status '
            });
        });


        let selectedPlanPrice = 0;
        let couponTimer;

        // When user selects a plan
        $(document).on("change", "#user_plan_id", function() {
            selectedPlanPrice = parseFloat($("#user_plan_id option:selected").data("price")) || 0;
            calculateTotal();
        });

        // When validity is changed (1 month, 3 month etc.)
        $(document).on("change", "#months", function() {
            calculateTotal();
        });

        // Coupon auto-validate with delay
        // When Validity Changes
        $(document).on("change", "#months", function() {
            let months = $(this).val();

            if (months == 0) {

                // Find option whose visible text is exactly "3"
                let freeOption = $("#user_plan_id option").filter(function() {
                    return $(this).text().trim() === "5";
                });

                if (freeOption.length > 0) {
                    freeOption.prop("selected", true).trigger("change");
                }

                // Disable user plan & payment method (free plan)
                $("#user_plan_id").prop("disabled", true);
                $("#payment_method").prop("disabled", true);
                $("#couponInput").prop("disabled", true);

                // Set amount to 0
                $("#subtotal").val(0);
                $("#gst").val(0);
                $("#finalTotal").val(0);
                $("#discount_amount").val(0);

                $(".coupon-message").html(
                    `<span class="text-info">Free plan activated (7 days)</span>`
                );

                return;
            }
            // Paid plans
            $("#user_plan_id").prop("disabled", false);
            $("#payment_method").prop("disabled", false);
            $("#couponInput").prop("disabled", false);


            calculateTotal();
        });


        // When User Plan Changes
        $(document).on("change", "#user_plan_id", function() {
            calculateTotal();
        });

        $("#couponInput").on("keyup", function() {
            clearTimeout(couponTimer);

            let code = $(this).val().trim();
            if (code.length < 3) return;

            couponTimer = setTimeout(() => {
                validateCoupon(code);
            }, 500);
        });


        // Coupon Validation AJAX
        function validateCoupon(code) {
            $.ajax({
                url: "{{ url('/admin/master/coupon/validate-status') }}",
                type: "POST",
                data: {
                    code: code,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    if (response.success) {
                        $("#couponInput").data("type", response.data.type);
                        $("#couponInput").data("value", response.data.value);
                        $("#couponId").val(response.data.id);

                        $(".coupon-message").html(
                            `<span class="text-success">${response.data.message}</span>`
                        );
                    } else {
                        $("#couponInput").data("type", "");
                        $("#couponInput").data("value", 0);
                        $("#couponId").val("");

                        $(".coupon-message").html(
                            `<span class="text-danger">${response.message}</span>`
                        );
                    }

                    calculateTotal();
                }
            });
        }


        // Final Calculation
        function calculateTotal() {
            let months = parseInt($("#months").val());

            // Prevent calculation in free mode
            if (months === 0) return;

            let price = parseFloat($("#user_plan_id option:selected").data("price")) || 0;
            
            let couponType = $("#couponInput").data("type");
            let couponValue = parseFloat($("#couponInput").data("value")) || 0;

            let subtotal = price * months;
            let discount = 0;

            if (couponType === "percentage") {
                discount = (subtotal * couponValue) / 100;
            } else if (couponType === "amount") {
                discount = couponValue;
            }

            $("#discountAmount").val(discount.toFixed(2));

            let afterDiscount = subtotal - discount;
            let gst = (afterDiscount * 18) / 100;
            let finalTotal = afterDiscount + gst;

            $("#subtotal").val(subtotal.toFixed(2));
            $("#amountBeforeGST").val(afterDiscount.toFixed(2));
            $("#gst").val(gst.toFixed(2));
            $("#finalTotal").val(finalTotal.toFixed(2));
        }


        // Trigger calculation when either dropdown changes
        $(document).on("change", "#user_plan_id, #months", function() {
            calculateTotal();
        });

        $("#payment_method").on("change", function () {
        if ($(this).val() === "cash") {
            $("#cashUploadBox").show();
        } else {
            $("#cashUploadBox").hide();
            $("#payment_document").val("");
        }
    });
    $("#resetForm").on("click", function () {
        $("#subscriptionForm")[0].reset();
        $("#cashUploadBox").hide();
        $("#discountAmount").val(0);
        $("#amountBeforeGST").val(0);
        $("#subtotal").val(0);
        $("#gst").val(0);
        $("#finalTotal").val(0);
        $(".coupon-message").html("");
    });
    </script>
@endpush
@endsection
