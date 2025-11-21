<!-- Filter Sidebar -->
<div id="InvoiceStatusBar" class="sdbr-sidebar">
  <button class="sdbr-close-button" onclick="closeInvoiceStatusBar()">&times;</button>
  <h2>Update Billing Status</h2>
  <hr>
  <form class="mt-2" id="updateStatus">
    @csrf
    <label class="text-lg-end mt-1 mb-2">Invoice Id:</label>
    <input type="text" class="form-control  mb-2" id="invoice_id" name="invoice_id" value="" disabled>
    <input type="hidden" name="order_id" id="order_id"   value="" >

    <label class="text-lg-end mt-1 mb-2">Company Name:</label>
    <input type="text" class="form-control  mb-2"  id="company_name" name="company_name" value="" disabled>

    <label class="text-lg-end mt-2 mb-2" for="order_status">Invoice Status:</label>
    <select class="form-control billing-status-select mb-2" id="order_status" name="status" required>
      <option selected disabled value="">Change Payment Status</option>
      <option value="completed">Completed</option>
      <option value="pending">Pending</option>
      <option value="cancelled">Cancelled</option>
    </select>
    <div class="error-message" id="UpdateStatusError">Status is required.</div>

    <button type="submit" class="btn mt-3 btn-primary" style="width:100%;">Update</button>
  </form>
</div>
