<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClientForm">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="companyName" class="form-label">Company Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name" name="company_name">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="clientName" class="form-label">Client Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="clientName" placeholder="Enter Client Name" name="client_name">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="CPhone" class="form-label">Phone<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="CPhone" placeholder="Enter Phone" name="client_phone">
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-sm-4 mb-3">
                            <label for="AltPhone" class="form-label">Alt.Phone<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="AltPhone" placeholder="Enter Phone" name="client_alt_phone">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="loginID" class="form-label">Login ID<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="loginID" placeholder="Enter Login ID" name="login_id">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="companyLogo" class="form-label">Complany Logo<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="companyLogo" name="company_logo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="EmailID" class="form-label">Work Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="EmailID" placeholder="Enter Email ID" name="email">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="clientPassword" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="clientPassword" placeholder="Enter Password" name="password">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="StatusName" class="form-label">Status<span class="text-danger">*</span></label>
                            <select id="status" class="form-select" name="status">
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
                <button type="submit" class="btn btn-primary" form="addClientForm">Save</button>
            </div>
        </div>
    </div>
</div>