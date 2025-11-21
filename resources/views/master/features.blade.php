@extends('layouts.supercrm-layout')
@section('title', 'All Features')

@section('content')
<section class="pc-container">
  <div class="pc-content">

    <!-- Header -->
    <div class="page-header" style="padding-top:0px;">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h4 class="mb-2">All Features</h4>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">SuperCRM</a></li>
              <li class="breadcrumb-item active">Features</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div class="row card-row-1">
      <div class="col-sm-12">
        <div class="card table-card">
          <div class="card-header table-header">
            <div class="row">
              <div class="col-10">
                <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px" onclick="openFeaturesSidebar()">
                  <i data-feather="user-plus" class="me-1 mt-1 wh15px"></i> Add Features
                </button>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="featuresTable" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sidebar for Add/Edit -->
<div id="FeaturesSidebar" class="sdbr-sidebar">
  <button class="sdbr-close-button" onclick="closeFeaturesSidebar()">&times;</button>
  <h2 id="sidebarTitle">Add Features</h2>
  <hr>
  <form id="featuresForm">
    <input type="hidden" id="id" name="id">
    <div class="row mb-2">
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Name:</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Entert Name" required>
      </div>

    </div>
    <div class="row mb-2">
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Status:</label>
        <select class="form-control users-limit mb-2" name="status" id="status" required>
          <option disabled selected>Select Status</option>
          <option value="active" >Active</option>
          <option value="inactive" >Inctive</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <button type="submit" class="btn mt-2 btn-primary" style="width:100%;">Save</button>
      </div>
      <div class="col-4">
        <button type="button" class="btn mt-2 btn-secondary" style="width:100%;" onclick="resetfeaturesForm()">Reset</button>
      </div>
    </div>
  </form>
</div>

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let table;

$(document).ready(function() {
  // Initialize DataTable
  table = $('#featuresTable').DataTable({
    ajax: "{{ route('master.features.list') }}",
    columns: [
      { data: 'id' },
      { data: 'name' },
      {
        data: 'status',
        render: function(data) {
          return data === 'active' 
            ? '<span class="badge bg-success">Active</span>'
            : '<span class="badge bg-danger">Inactive</span>';
        }
      },
      {
        data: null,
        className: "text-center form-switch",
        orderable: false,
        render: function(data, type, row) {
          return `
            <input type="checkbox" 
              class="form-check-input input-success mt-1 toggle-status" 
              data-id="${row.id}" 
              ${row.status === 'active' ? 'checked' : ''}>
            <button type="button" class="btn btn-icon btn-light-primary wh-30 edit-features" data-id="${row.id}">
              <i class="ti ti-edit"></i>
            </button>

            <button type="button" class="btn btn-icon btn-light-danger wh-30 delete-features" data-id="${row.id}">
              <i class="ti ti-trash"></i>
            </button>
          `;
        }
      }
    ]
  });

  // Update Status (Active/Inactive)
  $(document).on('change', '.toggle-status', function() {
    const id = $(this).data('id');
    const status = $(this).is(':checked') ? 'active' : 'inactive';
    $.ajax({
      url: `{{route('master.features.update.status')}}`,
      method: 'POST',
      data: { status,id:id, _token: '{{ csrf_token() }}' },
      success: function() {
        Swal.fire('Updated!', 'Status updated successfully.', 'success');
        table.ajax.reload(null, false);
      }
    });
  });

  // Edit Role
  $(document).on('click', '.edit-features', function() {
    const id = $(this).data('id');
    let url = "{{ route('master.features.edit', ':id') }}";
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success && response.data) {
                const data = response.data;

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#status').val(data.status); // make sure this matches option values ("active"/"inactive")

                $('#sidebarTitle').text('Edit Features');
                $('#FeaturesSidebar').addClass('open');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Invalid response format.',
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching Features:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Unable to fetch Features details. Please try again later.',
            });
        }
    });
});



// Delete Role
  $(document).on('click', '.delete-features', function() {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "This will delete the Features permanently!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{{ route('master.features.delete', ':id') }}".replace(':id', id),
          method: 'DELETE',
          data: { _token: '{{ csrf_token() }}' },
          success: function() {
            Swal.fire('Deleted!', 'Features has been deleted.', 'success');
            table.ajax.reload(null, false);
          }
        });
      }
    });
  });

  // Save (Add/Edit)
    $('#featuresForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#id').val();
        const formData = $(this).serialize();

        let url = id 
            ? "{{ route('master.features.update', ':id') }}".replace(':id', id)
            : "{{ route('master.features.store') }}";

        // ✅ Clear previous errors before submitting
        $('#featuresForm .is-invalid').removeClass('is-invalid');
        $('#featuresForm .invalid-feedback').remove();

        $.ajax({
            url: url,
            method: id ? 'PUT' : 'POST',
            data: formData + "&_token={{ csrf_token() }}",
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: `Features ${id ? 'updated' : 'added'} successfully.`,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    closeFeaturesSidebar();
                    table.ajax.reload(null, false);
                    $('#featuresForm')[0].reset();
                } 
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        const input = $(`[name="${field}"]`);

                        if (input.length) {
                            input.addClass('is-invalid');

                            // ✅ Handle different field types (select2, select, etc.)
                            if (input.hasClass('select2-hidden-accessible')) {
                                input.next('.select2-container')
                                    .after(`<div class="invalid-feedback d-block">${messages[0]}</div>`);
                            } else if (input.is('select')) {
                                input.after(`<div class="invalid-feedback d-block">${messages[0]}</div>`);
                            } else {
                                input.after(`<div class="invalid-feedback">${messages[0]}</div>`);
                            }
                        }
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

// Sidebar helpers
function openFeaturesSidebar() {
  $('#FeaturesSidebar').addClass('open');
  $('#sidebarTitle').text('Add Features');
  resetfeaturesForm();
}

function closeFeaturesSidebar() {
  $('#FeaturesSidebar').removeClass('open');
}

function resetfeaturesForm() {
  $('#featuresForm')[0].reset();
  $('#id').val('');
}
</script>
@endpush
@endsection
