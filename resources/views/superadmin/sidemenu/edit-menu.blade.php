<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editMenuForm">
                    <input type="hidden" id="menuId" name="menu_id">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="editRole" class="form-label">Role<span class="text-danger">*</span></label>
                            <select id="editRole" class="form-select" name="role_id">
                                <option value="">Select</option>
                                @foreach($role as $rl)
                                    <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="editMenuName" class="form-label">Menu Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editMenuName" placeholder="Enter Menu Name" name="menu_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 mb-3">
                            <label for="editRouteName" class="form-label">Route Name<span id="editSetRequired" class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editRouteName" placeholder="Enter Route Name" name="route_name">
                        </div>
                        <div class="col-sm-5 mb-3">
                            <label for="editIconClassName" class="form-label">Icon Class Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editIconClassName" placeholder="Enter Icon Class Name" name="icon_class_name">
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="editSorting" class="form-label">Sorting Index<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editSorting" name="sorting_index"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="editStatusName" class="form-label">Status<span class="text-danger">*</span></label>
                            <select id="editStatus" class="form-select" name="status">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="editHaveSubMenu" class="form-label">Have Sub Menu<span class="text-danger">*</span></label>
                            <select id="editHaveSubMenu" class="form-select" name="have_sub_menu">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div id="editSubMenuSection" class="col-sm-12 d-none">
                            <div class="edit-sub-menu-row d-flex align-items-center mb-3">
                                <div class="flex-grow-1">
                                    <label class="form-label">Sub Menu Name</label>
                                    <input type="text" class="form-control" placeholder="Enter SubMenu Name" name="sub_menu_name[]">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <label class="form-label">Route Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Route Name" name="sub_menu_route_name[]">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="submenu_status[]">
                                        <option value="">Select</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center ps-2 pt-4">
                                    <button type="button" class="btn btn-success edit-sub-menu"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div id="editAdditionalSubMenus"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="editMenuForm">Update</button>
            </div>
        </div>
    </div>
</div>