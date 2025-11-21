@extends('layouts.master')

@section('title', 'Abstract CRM')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/responsive.bootstrap5.min.css') }}">
@section('content')
<section class="pc-container">
  <div class="pc-content">

    <div class="page-header"  style="padding-top:0px; margin-top:-5px;">
      <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
            <div class="page-header-title">
                <h2 class="mb-2">Subscription</h2>
            </div>
            </div>
            <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a>Master</a></li>
                <li class="breadcrumb-item" aria-current="page">Subscription</li>
            </ul>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center row">
                <div class="col-10">
                    <h5>Subscription</h5>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" id="addSubscriptionButton" data-bs-toggle="modal" data-bs-target="#addSubscriptionModal">
                        <i class="fas fa-plus"></i> Add Subscription
                    </button>
                </div>
            </div>
          <div class="card-body">
            <table id="subscription" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Name</th>
                  <th>No.Of Months</th>
                  <th>No.Of Days</th>
                  <th>Status</th>
                  <th>Created At</th>
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
    @include('superadmin.master.add-subscription')
    <!-- Add Limit Modal -->

    <!-- Edit Limit Modal -->
    @include('superadmin.master.edit-subscription')
    <!-- Edit Limit Modal -->

    @push('scripts')
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        $('#subscription').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('master.subscription.list') }}",
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
                { data: 'name', name: 'name', orderable: true  },
                { data: 'no_months', name: 'no_months', orderable: true  },
                { data: 'no_days', name: 'no_days', orderable: true  },
                { data: 'status', name: 'status', orderable: true },
                { data: 'created_at', name: 'created_at', orderable: true  },
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
        $('#addSubscriptionForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('master.subscription.store') }}",
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#addSubscriptionForm')[0].reset();
                    if (response.success) {
                        $('#addSubscriptionModal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        $('#subscription').DataTable().ajax.reload();
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
                            text: 'There was an error saving the subscription.',
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
                url: "{{ route('master.subscription.edit', ':id') }}".replace(':id', menuId),
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        $('#subscriptionId').val(response.data.id);
                        $('#editSubscriptionName').val(response.data.subscription_name);
                        $('#editnoMonth').val(response.data.no_months);
                        $('#editnoDays').val(response.data.no_days);
                        $('#editstatus').val(response.data.status);
                        $('#editSubscriptionModal').modal('show');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch details.', 'error');
                }
              });
            });

            //update
            $('#editSubscriptionForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('master.subscription.update') }}",
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#editSubscriptionForm')[0].reset();
                    if (response.success) {
                        $('#editSubscriptionModal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        $('#subscription').DataTable().ajax.reload();
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
                            text: 'There was an error update the subscription.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }

            });
        });


    });
 </script>
 @endpush
@endsection
