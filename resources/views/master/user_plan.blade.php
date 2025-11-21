@extends('layouts.supercrm-layout')



@section('title', 'All User Plan')



@section('content')

<section class="pc-container">

  <div class="pc-content">



    <!-- Header -->

    <div class="page-header" style="padding-top:0px;">

      <div class="page-block">

        <div class="row align-items-center">

          <div class="col-md-12">

            <div class="page-header-title">

              <h4 class="mb-2">User Plan</h4>

            </div>

          </div>

          <div class="col-md-12">

            <ul class="breadcrumb">

              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">SuperCRM</a></li>

              <li class="breadcrumb-item active">User Plan List</li>

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

                <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px" onclick="openUserPlanSidebar()">

                  <i data-feather="user-plus" class="me-1 mt-1 wh15px"></i> Add User Plan

                </button>

              </div>

            </div>

          </div>



          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-striped" id="userPlanTable" width="100%">

                <thead>

                  <tr>

                    <th>ID</th>
                    <th>No. of users</th>
                    <th>Price</th>
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

<div id="UserPlanSidebar" class="sdbr-sidebar">

  <button class="sdbr-close-button" onclick="closeUserPlanSidebar()">&times;</button>

  <h2 id="sidebarTitle">Add User Plan</h2>

  <hr>

  <form id="userPlanForm">

    <input type="hidden" id="id" name="id">

    <div class="row mb-2">

      <div class="col-12">

        <label class="text-lg-end mt-1 mb-2">No. of users:</label>

        <input type="text" id="name" name="name" class="form-control" placeholder="Entert Name" required>

      </div>
     
      <div class="col-12">

        <label class="text-lg-end mt-1 mb-2">Price:</label>

        <input type="number" id="price" name="price" class="form-control" placeholder="Entert Price" required>

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

        <button type="button" class="btn mt-2 btn-secondary" style="width:100%;" onclick="resetUserPlanForm()">Reset</button>

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

  table = $('#userPlanTable').DataTable({

    ajax: "{{ route('master.userplan.list') }}",

    columns: [

      { data: 'id' },

      { data: 'name' },
      { data: 'price' },
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

            <button type="button" class="btn btn-icon btn-light-primary wh-30 edit-userPlan" data-id="${row.id}">

              <i class="ti ti-edit"></i>

            </button>

            <button type="button" class="btn btn-icon btn-light-danger wh-30 delete-userPlan" data-id="${row.id}">

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

      url: `{{route('master.userplan.update.status')}}`,

      method: 'POST',

      data: { status,id:id, _token: '{{ csrf_token() }}' },

      success: function() {

        Swal.fire('Updated!', 'Status updated successfully.', 'success');

        table.ajax.reload(null, false);

      }

    });

  });



  // Edit User Plan

  $(document).on('click', '.edit-userPlan', function() {

    const id = $(this).data('id');

    let url = "{{ route('master.userplan.edit', ':id') }}";

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



                $('#sidebarTitle').text('Edit User Plan');

                $('#UserPlanSidebar').addClass('open');

            } else {

                Swal.fire({

                    icon: 'error',

                    title: 'Error',

                    text: 'Invalid response format.',

                });

            }

        },

        error: function(xhr, status, error) {

            console.error('Error fetching user plan:', error);

            Swal.fire({

                icon: 'error',

                title: 'Error',

                text: 'Unable to fetch user plan details. Please try again later.',

            });

        }

    });

});







  // Delete userPlan

  $(document).on('click', '.delete-userPlan', function() {

    var id = $(this).data('id');

    Swal.fire({

      title: 'Are you sure?',

      text: "This will delete the user plan permanently!",

      icon: 'warning',

      showCancelButton: true,

      confirmButtonColor: '#3085d6',

      cancelButtonColor: '#d33',

      confirmButtonText: 'Yes, delete it!'

    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url: "{{ route('master.userplan.delete', ':id') }}".replace(':id', id),

          method: 'DELETE',

          data: { _token: '{{ csrf_token() }}' },

          success: function() {

            Swal.fire('Deleted!', 'User plan has been deleted.', 'success');

            table.ajax.reload(null, false);

          }

        });

      }

    });

  });



  // Save (Add/Edit)

  $('#userPlanForm').on('submit', function(e) {

    e.preventDefault();



    const id = $('#id').val();

    const formData = $(this).serialize();



    let url = id 

        ? "{{ route('master.userplan.update', ':id') }}".replace(':id', id)

        : "{{ route('master.userplan.store') }}";



    // ✅ Clear previous errors before submitting

    $('#userPlanForm .is-invalid').removeClass('is-invalid');

    $('#userPlanForm .invalid-feedback').remove();



    $.ajax({

        url: url,

        method: id ? 'PUT' : 'POST',

        data: formData + "&_token={{ csrf_token() }}",

        success: function(response) {

            if (response.success) {

                Swal.fire({

                    icon: 'success',

                    title: 'Success!',

                    text: `User Plan ${id ? 'updated' : 'added'} successfully.`,

                    timer: 1500,

                    showConfirmButton: false

                });



                closeUserPlanSidebar();

                table.ajax.reload(null, false);

                $('#userPlanForm')[0].reset();

            } 

        },

        error: function(xhr) {

            if (xhr.status === 422) {

                const errors = xhr.responseJSON.errors;



                // ✅ Loop through validation errors and show them under inputs

                $.each(errors, function(field, messages) {

                    const input = $(`[name="${field}"]`);



                    input.addClass('is-invalid'); // Bootstrap-style red border



                    // If input is in a select2 or custom wrapper, adjust placement as needed

                    input.after(`<div class="invalid-feedback">${messages[0]}</div>`);

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

function openUserPlanSidebar() {

  $('#UserPlanSidebar').addClass('open');

  $('#sidebarTitle').text('Add User Plan');

  resetUserPlanForm();

}



function closeUserPlanSidebar() {

  $('#UserPlanSidebar').removeClass('open');

}



function resetUserPlanForm() {

  $('#userPlanForm')[0].reset();

  $('#id').val('');

}

</script>

@endpush

@endsection

