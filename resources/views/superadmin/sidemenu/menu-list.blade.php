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
              <h2 class="mb-2">Menu</h2>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a>Permission</a></li>
              <li class="breadcrumb-item" aria-current="page">Menu</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Menu</h5>
                <button class="btn btn-primary" id="addMenuButton" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                    <i class="fas fa-plus"></i> Add Menu
                </button>
            </div>
          <div class="card-body">
            <table id="menu" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Role Name</th>
                  <th>Menu Name</th>
                  <th>Sub Menu</th>
                  <th>Sorting Index</th>
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
    <!-- Add Menu Modal -->
     @include('superadmin.sidemenu.add-menu')
    <!-- Add Menu Modal -->

    <!-- Edit Menu Modal -->
     @include('superadmin.sidemenu.edit-menu')
    <!-- Edit Menu Modal -->

    @push('scripts')
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        $('#menu').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('permission.menu.list') }}",
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
                { data: 'role_name', name: 'role_name', orderable: true  },
                { data: 'menu_name', name: 'menu_name', orderable: true  },
                { data: 'sub_menus', name: 'sub_menus', orderable: true },
                { data: 'sorting_index', name: 'sorting_index', orderable: true },
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

        $('#haveSubMenu').on('change', function() {
            if ($(this).val() === 'Yes') {
                $('#setRequired').removeClass('text-danger');
                $('#subMenuSection').removeClass('d-none');
            } else {
                $('#setRequired').addClass('text-danger');
                $('#subMenuSection').addClass('d-none');
                $('#additionalSubMenus').empty();
            }
        });

        $('#editHaveSubMenu').on('change', function() {
            if ($(this).val() === 'Yes') {
                $('#editSetRequired').removeClass('text-danger');
                $('#editSubMenuSection').removeClass('d-none');
            } else {
                $('#editSetRequired').addClass('text-danger');
                $('#editSubMenuSection').addClass('d-none');
                $('#editAdditionalSubMenus').empty();
            }
        });
       //for add modal
        $(document).on('click', '.add-sub-menu', function() {
            var newSubMenu = $('.sub-menu-row:first').clone();
            newSubMenu.find('input').val('');
            newSubMenu.find('.add-sub-menu')
                    .removeClass('btn-success add-sub-menu')
                    .addClass('btn-danger remove-sub-menu')
                    .html('<i class="fas fa-minus"></i>');
            $('#additionalSubMenus').append(newSubMenu);
        });
        $(document).on('click', '.remove-sub-menu', function() {
            $(this).closest('.sub-menu-row').remove();
        });

        //for edit modal
        $(document).on('click', '.edit-sub-menu', function() {
            var newSubMenu = $('.edit-sub-menu-row:first').clone();
            newSubMenu.find('input').val('');
            newSubMenu.find('.edit-sub-menu')
                    .removeClass('btn-success edit-sub-menu')
                    .addClass('btn-danger edit-remove-sub-menu')
                    .html('<i class="fas fa-minus"></i>');
            $('#editAdditionalSubMenus').append(newSubMenu);
        });
        $(document).on('click', '.edit-remove-sub-menu', function() {
            $(this).closest('.edit-sub-menu-row').remove();
        });


        //store menu
        $('#addMenuForm').on('submit', function(e) {
            e.preventDefault();

            let formData = {
                role_id: $('#role').val(),
                menu_name: $('#menuName').val(),
                route_name: $('#routeName').val(),
                status: $('#status').val(),
                icon_class_name: $('#iconClassName').val(),
                have_sub_menu: $('#haveSubMenu').val(),
                sub_menus: []
            };

            if (formData.have_sub_menu === 'Yes') {
                $('.sub-menu-row').each(function() {
                    var subMenuName = $(this).find('input[name="sub_menu_name[]"]').val();
                    var subMenuRoute = $(this).find('input[name="sub_menu_route_name[]"]').val();
                    var subMenuStatus = $(this).find('select[name="submenu_status[]"]').val();

                    if (subMenuName && subMenuRoute) {
                        formData.sub_menus.push({
                            name: subMenuName,
                            route_name: subMenuRoute,
                            submenu_status: subMenuStatus
                        });
                    }
                });
            }

            $.ajax({
                url: "{{ route('permission.menu.store') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#addMenuForm')[0].reset();
                    if (response.success) {
                        $('#addMenuModal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        $('#menu').DataTable().ajax.reload();
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
                            text: 'There was an error saving the menu.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }

            });
        });

        $(document).on('click', '.edit-btn', function () {
            var menuId = $(this).data('id');

            $.ajax({
                url: "{{ route('permission.menu.edit', ':id') }}".replace(':id', menuId),
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        $('#menuId').val(response.data.id);
                        $('#editRole').val(response.data.role_id);
                        $('#editMenuName').val(response.data.menu_name);
                        $('#editRouteName').val(response.data.route_name || '');
                        $('#editIconClassName').val(response.data.icon_class_name);
                        $('#editSorting').val(response.data.sorting_index);
                        $('#editStatus').val(response.data.status);
                        $('#editHaveSubMenu').val(response.data.have_sub_menu);

                        if (response.data.have_sub_menu === 'Yes') {
                            $('#editSubMenuSection').removeClass('d-none');
                            populateEditSubMenus(response.data.sub_menus);
                        } else {
                            $('#editSubMenuSection').addClass('d-none');
                            $('#editAdditionalSubMenus').html('');
                        }
                        $('#editMenuModal').modal('show');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch details.', 'error');
                }
            });
        });

        $('#editMenuForm').on('submit', function (e) {
            e.preventDefault();

            var formData = $(this).serializeArray();

            $.ajax({
                url: "{{ route('permission.menu.update') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                $('#editMenuForm')[0].reset();
                if (response.success) {
                    $('#editMenuModal').modal('hide');
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    $('#menu').DataTable().ajax.reload();
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
                        text: 'There was an error updating the menu.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    $(document).on('click', '.delete-submenu', function () {
        var button = $(this); // Capture the button context
        var submenu_id = button.data('submenu-id');

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
                    url: '{{ route("permission.submenu.delete") }}',
                    data: { id: submenu_id },
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
                            button.closest('.sub-menu-row').remove();
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

    
    // Populate submenus dynamically
    function populateEditSubMenus(subMenus) {
        let subMenuHTML = '';
        subMenus.forEach(subMenu => {
            subMenuHTML += `
                <div class="sub-menu-row d-flex align-items-center mb-3">
                    <div class="flex-grow-1">
                        <label class="form-label">Sub Menu Name</label>
                        <input type="text" class="form-control" value="${subMenu.name}" name="sub_menu_name[]">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <label class="form-label">Route Name</label>
                        <input type="text" class="form-control" value="${subMenu.route_name}" name="sub_menu_route_name[]">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="submenu_status[]">
                            <option value="active" ${subMenu.submenu_status === 'active' ? 'selected' : ''}>Active</option>
                            <option value="inactive" ${subMenu.submenu_status === 'inactive' ? 'selected' : ''}>Inactive</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center ps-2 pt-4">
                        <button type="button" class="btn btn-danger delete-submenu edit-remove-sub-menu" data-submenu-id="${subMenu.id}"><i class="fas fa-minus"></i></button>
                    </div>
                </div>`;
        });
        $('#editAdditionalSubMenus').html(subMenuHTML);
    }
 </script>
 @endpush
@endsection
