<div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuModalLabel">Add Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMenuForm">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="role" class="form-label">Role<span class="text-danger">*</span></label>
                            <select id="role" class="form-select" name="role_id">
                                <option value="">Select</option>
                                @foreach($role as $rl)
                                    <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="menuName" class="form-label">Menu Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="menuName" placeholder="Enter Menu Name" name="menu_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="routeName" class="form-label">Route Name<span id="setRequired" class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="routeName" placeholder="Enter Route Name"  name="route_name">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="iconClassName" class="form-label">Icon Class Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="iconClassName" placeholder="Enter Icon Class Name"  name="icon_class_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="StatusName" class="form-label">Status<span class="text-danger">*</span></label>
                            <select id="status" class="form-select" name="status">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="haveSubMenu" class="form-label">Have Sub Menu<span class="text-danger">*</span></label>
                            <select id="haveSubMenu" class="form-select" name="have_sub_menu">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div id="subMenuSection" class="col-sm-12 d-none">
                            <div class="sub-menu-row d-flex align-items-center mb-3">
                                <div class="flex-grow-1">
                                    <label class="form-label">Sub Menu Name</label>
                                    <input type="text" class="form-control" placeholder="Enter SubMenu Name"  name="sub_menu_name[]">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <label class="form-label">Route Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Route Name"  name="sub_menu_route_name[]">
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
                                    <button type="button" class="btn btn-success add-sub-menu"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div id="additionalSubMenus"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addMenuForm">Save</button>
            </div>
        </div>
    </div>
</div>