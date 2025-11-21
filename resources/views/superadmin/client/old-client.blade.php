@extends('layouts.master')

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
              <h2 class="mb-2">Client</h2>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item" aria-current="page">Client</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Client</h5>
                <button class="btn btn-primary" id="addClientButton" data-bs-toggle="modal" data-bs-target="#addClientModal">
                    <i class="fas fa-plus"></i> Add Client
                </button>
            </div>
          <div class="card-body">
            <table id="client" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Company Name</th>
                  <th>Client Name</th>
                  <th>CRM Scale</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Limit Modal -->
    @include('superadmin.client.add-client')
    <!-- Add Limit Modal -->

    <!-- Edit Limit Modal -->
    @include('superadmin.client.edit-client')
    <!-- Edit Limit Modal -->

    @push('scripts')
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        $('#client').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('client.list') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns: [
                { 
                    data: null, 
                    name: 'sr', 
                    orderable: true, 
                    searchable: true,
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'company_name', name: 'company_name', orderable: true  },
                { data: 'name', name: 'name', orderable: true },
                { data: 'crm_scal', name: 'crm_scal', orderable: true  },
                { data: 'status', name: 'status', orderable: true  },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        $('#show-hide-res').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
            }
        });

        //store
        $('#addClientForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('client.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false, 
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#addClientForm')[0].reset();
                    if (response.success) {
                        $('#addClientModal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        $('#client').DataTable().ajax.reload();
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value + '<br>';
                        });

                        Swal.fire({
                            title: 'Validation Error',
                            html: errorMessages, 
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });

                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'There was an error saving the client.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }

            });
        });

        //edit
        $(document).on('click', '.edit-btn', function () {
            var menuId = $(this).data('id');

            $.ajax({
                url: "{{ route('master.user.limit.edit', ':id') }}".replace(':id', menuId),
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        $('#userLimitId').val(response.data.id);
                        $('#editlimitNumber').val(response.data.limit_number);
                        $('#editstatus').val(response.data.status);
                        $('#editUserLimitModal').modal('show');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch details.', 'error');
                }
              });
            });

            //update
            $('#editUserLimitForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('master.user.limit.update') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false, 
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#editUserLimitForm')[0].reset();
                    if (response.success) {
                        $('#editUserLimitModal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        $('#userLimit').DataTable().ajax.reload();
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value + '<br>';
                        });

                        Swal.fire({
                            title: 'Validation Error',
                            html: errorMessages, 
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });

                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'There was an error update the Client.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }

            });
        });

        $(document).on('click', '.delete-btn', function () {
            var UserLimitId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("master.user.limit.delete") }}',
                        data : {id : UserLimitId},
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                                // Reload DataTable
                                $('#userLimit').DataTable().ajax.reload();
                            }
                        },
                        error: function () {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the menu.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });


    });
 </script>
 @endpush
@endsection
