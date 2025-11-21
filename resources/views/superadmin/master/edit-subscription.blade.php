<div class="modal fade" id="editSubscriptionModal" tabindex="-1" aria-labelledby="editSubscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubscriptionModalLabel">Edit User Limit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubscriptionForm">
                    <input type="hidden" id="subscriptionId" name="subscription_id">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="subscriptionName" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editSubscriptionName" placeholder="Enter Subscription Name" name="subscription_name">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="noMonth" class="form-label">No.of Month</label>
                            <input type="text" class="form-control" id="editnoMonth" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
                             placeholder="Enter Number of Month" name="no_months">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="noDays" class="form-label">No.of Days</label>
                            <input type="text" class="form-control" id="editnoDays" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
                             placeholder="Enter Number of Days" name="no_days">
                        </div>
                        <div class="col-sm-4 mb-3">
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
                <button type="submit" class="btn btn-primary" form="editSubscriptionForm">Update</button>
            </div>
        </div>
    </div>
</div>