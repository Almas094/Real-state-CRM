@extends('layouts.supercrm-layout')



@section('title', 'All Users')



@section('content')

<section class="pc-container">

  <div class="pc-content">



    <!-- Header -->

    <div class="page-header" style="padding-top:0px;">

      <div class="page-block">

        <div class="row align-items-center">

          <div class="col-md-12">

            <div class="page-header-title">

              <h4 class="mb-2">Users</h4>

            </div>

          </div>

          <div class="col-md-12">

            <ul class="breadcrumb">

              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">SuperCRM</a></li>

              <li class="breadcrumb-item active">Users List</li>

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

                <button type="button" class="btn btn-primary me-3 d-inline-flex btn-i-wh15px" onclick="openUserSidebar()">

                  <i data-feather="user-plus" class="me-1 mt-1 wh15px"></i> Add Users

                </button>

              </div>

            </div>

          </div>



          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-striped" id="userTable" width="100%">

                <thead>

                  <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Role</th>
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

<div id="UserSidebar" class="sdbr-sidebar-2x">

  <button class="sdbr-close-button" onclick="closeUserSidebar()">&times;</button>

  <h2 id="sidebarTitle">Add Subscription</h2>

  <hr>

  <form id="userForm">

    <input type="hidden" id="id" name="id">

    <div class="row mb-2">

      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Name:</label>

        <input type="text" id="name" name="name" class="form-control" placeholder="Entert Name" required>

      </div>
      
      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Email:</label>

        <input type="email" id="email" name="email" class="form-control" placeholder="Entert Email" required>

      </div>
      
      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Pnone No.:</label>

        <input type="number" id="phone" name="phone" class="form-control" placeholder="Entert Pnone No." required>

      </div>
      
      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Role:</label>

        <select class="form-control  mb-2" name="role_id" id="role_id" required>

          <option disabled selected>Select Role</option>

          @foreach($roles as $role)
          <option value="{{$role->id}}">{{$role->name}}</option>
          @endforeach


        </select>

      </div>
     
      <div class="col-6" style="display: none">

        <label class="text-lg-end mt-1 mb-2">Profile Image:</label>

        <input type="file" id="image" name="image" class="form-control" >

      </div>
      
      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Addrees:</label>

        <input type="text" id="address" name="address" class="form-control" placeholder="Entert address" required>

      </div>

      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Password.:</label>

        <input type="password" id="password" name="password" class="form-control" placeholder="Entert Password" required>

      </div>
      
      <div class="col-6">

        <label class="text-lg-end mt-1 mb-2">Confirm Password.:</label>

        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Entert Confirm Password" required>

      </div>

    
      <div class="col-6">

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

        <button type="button" class="btn mt-2 btn-secondary" style="width:100%;" onclick="resetuserForm()">Reset</button>

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

  table = $('#userTable').DataTable({

    ajax: "{{ route('users.list') }}",

    columns: [

      { data: 'id' },

      { data: 'name' },
      { data: 'phone' },
      { data: 'email' },
      { data: 'role.name' },
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

            <button type="button" class="btn btn-icon btn-light-primary wh-30 edit-user" data-id="${row.id}">

              <i class="ti ti-edit"></i>

            </button>

            <button type="button" class="btn btn-icon btn-light-danger wh-30 delete-user" data-id="${row.id}">

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

      url: `{{route('users.update.status')}}`,

      method: 'POST',

      data: { status,id:id, _token: '{{ csrf_token() }}' },

      success: function() {

        Swal.fire('Updated!', 'Status updated successfully.', 'success');

        table.ajax.reload(null, false);

      }

    });

  });



  // Edit user

  $(document).on('click', '.edit-user', function() {

    const id = $(this).data('id');

    let url = "{{ route('users.edit', ':id') }}";

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
                $('#email').val(data.email);
                $('#role_id').val(data.role_id);
                $('#address').val(data.address);
                $('#phone').val(data.phone);
                $('#password').val(data.remember_password);
                $('#confirm_password').val(data.remember_password);
               
                $('#status').val(data.status); // make sure this matches option values ("active"/"inactive")



                $('#sidebarTitle').text('Edit User');

                $('#UserSidebar').addClass('open');

            } else {

                Swal.fire({

                    icon: 'error',

                    title: 'Error',

                    text: 'Invalid response format.',

                });

            }

        },

        error: function(xhr, status, error) {

            console.error('Error fetching user:', error);

            Swal.fire({

                icon: 'error',

                title: 'Error',

                text: 'Unable to fetch user details. Please try again later.',

            });

        }

    });

});







  // Delete user

  $(document).on('click', '.delete-user', function() {

    var id = $(this).data('id');

    Swal.fire({

      title: 'Are you sure?',

      text: "This will delete the user permanently!",

      icon: 'warning',

      showCancelButton: true,

      confirmButtonColor: '#3085d6',

      cancelButtonColor: '#d33',

      confirmButtonText: 'Yes, delete it!'

    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url: "{{ route('users.delete', ':id') }}".replace(':id', id),

          method: 'DELETE',

          data: { _token: '{{ csrf_token() }}' },

          success: function() {

            Swal.fire('Deleted!', 'user has been deleted.', 'success');

            table.ajax.reload(null, false);

          }

        });

      }

    });

  });



  // Save (Add/Edit)
$('#userForm').on('submit', function(e) {
    e.preventDefault();

    const id = $('#id').val();
    const formData = $(this).serialize();

    let url = id
        ? "{{ route('users.update', ':id') }}".replace(':id', id)
        : "{{ route('users.store') }}";

    $('#userForm .is-invalid').removeClass('is-invalid');
    $('#userForm .invalid-feedback').remove();

    
    $.ajax({
        url: url,
        method: id ? 'PUT' : 'POST',
        data: formData + "&_token={{ csrf_token() }}",
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: `User ${id ? 'updated' : 'added'} successfully.`,
                    timer: 1500,
                    showConfirmButton: false
                });
                closeUserSidebar();
                table.ajax.reload(null, false);
                $('#userForm')[0].reset();
            }
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    const input = $(`[name="${field}"]`);
                    input.addClass('is-invalid');
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

function openUserSidebar() {

  $('#UserSidebar').addClass('open');

  $('#sidebarTitle').text('Add User');

  resetUserForm();

}



function closeUserSidebar() {

  $('#UserSidebar').removeClass('open');

}



function resetUserForm() {

  $('#userForm')[0].reset();

  $('#id').val('');

}

</script>

@endpush

@endsection

