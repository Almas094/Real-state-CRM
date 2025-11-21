@extends('layouts.supercrm-layout')
@section('title', 'All Add Ons')

@section('content')

<section class="pc-container">
  <div class="pc-content">



    <!-- Header -->

    <div class="page-header" style="padding-top:0px;">

      <div class="page-block">

        <div class="row align-items-center">

          <div class="col-md-12">

            <div class="page-header-title">

              <h4 class="mb-2">All Add Ons</h4>

            </div>

          </div>

          <div class="col-md-12">

            <ul class="breadcrumb">

              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">SuperCRM</a></li>

              <li class="breadcrumb-item active">Add Ons</li>

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

                <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px" onclick="openAddOnsSidebar()">

                  <i data-feather="user-plus" class="me-1 mt-1 wh15px"></i> Add Add Ons

                </button>

              </div>

            </div>

          </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="AddOnsTable" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Image</th>
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
<div id="AddOnsSidebar" class="sdbr-sidebar">
  <button class="sdbr-close-button" onclick="closeAddOnsSidebar()">&times;</button>
  <h2 id="sidebarTitle">Add Add Ons</h2>
  <hr>
  <form id="addOnsForm" enctype="multiplart/form-data">
    <input type="hidden" id="id" name="id">
    <div class="row mb-2">
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Name:</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Entert Name" required>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Description:</label>
        <input type="text" id="description" name="description" class="form-control" placeholder="Entert Description" >
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Type:</label>
         <select class="form-control users-limit mb-2" name="type" id="type" required>
          <option disabled selected>Select Status</option>
          <option value="paid" >Paid</option>
          <option value="free" >Free</option>
        </select>
      </div>
    </div>
    <div class="row mb-2 price_div" >
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Price:</label>
        <input type="text" id="price" name="price" class="form-control" placeholder="Entert Price" >
      </div>
    </div>
    <div class="row mb-2" >
      <div class="col-12">
        <label class="text-lg-end mt-1 mb-2">Icon:</label>
        <input type="file" id="image" name="image" class="form-control"  >
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
        <button type="button" class="btn mt-2 btn-secondary" style="width:100%;" onclick="resetaddOnsForm()">Reset</button>
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

  table = $('#AddOnsTable').DataTable({
    ajax: "{{ route('master.add-ons.list') }}",
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'type' },
      { data: 'price' },
      { 
        data: 'image',
        title: 'Icon',
        render: function(data, type, row) {
            if (!data) {
                return '<img src="/images/no-image.png" width="40" height="40" class="rounded">';
            }
            return `<img src="/addons/${data}" width="40" height="40" class="rounded">`;
        }
    },
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
            <button type="button" class="btn btn-icon btn-light-primary wh-30 edit-add-ons" data-id="${row.id}">
              <i class="ti ti-edit"></i>
            </button>
            <button type="button" class="btn btn-icon btn-light-danger wh-30 delete-add-ons" data-id="${row.id}">
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
      url: `{{route('master.add-ons.update.status')}}`,
      method: 'POST',
      data: { status,id:id, _token: '{{ csrf_token() }}' },
      success: function() {
        Swal.fire('Updated!', 'Status updated successfully.', 'success');
        table.ajax.reload(null, false);
      }
    });
  });

  // Edit Role
  $(document).on('click', '.edit-add-ons', function() {
    const id = $(this).data('id');
    let url = "{{ route('master.add-ons.edit', ':id') }}";
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
                $('#description').val(data.description);
                $('#type').val(data.type); 
                $('#price').val(data.price);
                // $('#image').val(data.image);
                $('#status').val(data.status);

                $('#sidebarTitle').text('Edit Add Ons');
                $('#AddOnsSidebar').addClass('open');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Invalid response format.',
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching Add Ons:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Unable to fetch Add Ons details. Please try again later.',
            });
        }
    });
});



  // Delete Role
  $(document).on('click', '.delete-add-ons', function() {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "This will delete the Add Ons permanently!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{{ route('master.add-ons.delete', ':id') }}".replace(':id', id),
          method: 'DELETE',
          data: { _token: '{{ csrf_token() }}' },
          success: function() {
            Swal.fire('Deleted!', 'Add Ons has been deleted.', 'success');
            table.ajax.reload(null, false);
          }
        });
      }
    });
  });

  // Save (Add/Edit)
  $('#addOnsForm').on('submit', function (e) {
    e.preventDefault();

    const id = $('#id').val();
    const form = this;
    const formData = new FormData(form);

    let url = id
        ? "{{ route('master.add-ons.update') }}"
        : "{{ route('master.add-ons.store') }}";

    // ✅ Clear previous errors
    $('#addOnsForm .is-invalid').removeClass('is-invalid');
    $('#addOnsForm .invalid-feedback').remove();

    $.ajax({
        url: url,
        method: 'POST', // Use POST; Laravel will detect _method for update
        data: formData,
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },

        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: `Add On ${id ? 'updated' : 'added'} successfully.`,
                    timer: 1500,
                    showConfirmButton: false
                });

                closeAddOnsSidebar();
                table.ajax.reload(null, false);
                form.reset();
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
function openAddOnsSidebar() {
  $('#AddOnsSidebar').addClass('open');
  $('#sidebarTitle').text('Add Add Ons');
  resetaddOnsForm();
}

function closeAddOnsSidebar() {
  $('#AddOnsSidebar').removeClass('open');
}

function resetaddOnsForm() {
  $('#addOnsForm')[0].reset();
  $('#id').val('');
}

$('#type').on('change', function() {
    const selectedType = $(this).val();

    if (selectedType === 'paid') {
        $('#price').attr('required', true);
        $('.price_div').show(); // Optionally show price field
    } else {
        $('#price').removeAttr('required');
        $('.price_div').hide(); // Hide price field if not needed
        $('#price').val('');
    }
});

</script>

@endpush

@endsection

