<div class="modal fade" id="editUserLimitModal" tabindex="-1" aria-labelledby="editUserLimitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLimitModalLabel">Edit User Limit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserLimitForm">
                    <input type="hidden" id="userLimitId" name="userLimit_id">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="limitName" class="form-label">Limit Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editlimitNumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
                             placeholder="Enter User Limit" name="limit_number">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="StatusName" class="form-label">Status<span class="text-danger">*</span></label>
                            <select id="editstatus" class="form-select" name="status">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="editUserLimitForm">Update</button>
            </div>
        </div>
    </div>
</div>