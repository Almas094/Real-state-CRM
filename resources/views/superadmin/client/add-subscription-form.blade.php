<!-- Subscription Sidebar -->
<div id="AddSubscription" class="sdbr-sidebar-2x">
  <button class="sdbr-close-button" onclick="closeSubscriptionbar()">&times;</button>
  <h2>Add Subscription</h2>
  <hr>
  <form class="mt-2" id="subscriptionForm" enctype="multipart/form-data">
    @csrf
    <div class="row mb-2">
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Client Id:</label>
        <input type="hidden"  id="clientId" name="id" value="" disabled>
        <input type="hidden"  id="discount_amount" name="discount_amount" value="" disabled>
        <input type="hidden"  id="couponId" name="coupon_id" value="" disabled>
        <input type="text" class="form-control" id="loginId" value="" disabled>
      </div>
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Company Name:</label>
        <input type="text" class="form-control" id="companyName" value="" disabled>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Validity:</label>
        <select class="form-control month-limit mb-2" id="months" name="months">
          <option selected disabled>Select validity</option>
          <option value="0">Free</option>
          <option value="1">1 Month</option>
          <option value="3">3 Months</option>
          <option value="6">6 Months</option>
          <option value="12">12 Months</option>
          <option value="24">2 Years</option>
        </select>
      </div>
       <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Users Plan:</label>
        <select class="form-control users-limit mb-2" id="user_plan_id"  name="user_plan_id">
          <option selected disabled>Select Users Plan </option>
        </select>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Subscription Amount (₹):</label>
        <input type="text" class="form-control" id="subtotal" name="subtotal" value="" disabled>
      </div>
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Apply Coupon:</label>
        <input type="text" class="form-control" id="couponInput" name="coupon_code" placeholder="Add Coupon">
        <span class="coupon-message"></span>
      </div>
    </div>
     <div class="row mb-2">
      <div class="col-6">
        <label>Coupon Discount (₹):</label>
        <input type="text" class="form-control" id="discountAmount" name="discount_amount" value="0" disabled>
      </div>

      <div class="col-6">
        <label>Net Amount Before GST (₹):</label>
        <input type="text" class="form-control" id="amountBeforeGST" value="0" disabled>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Total GST (₹):</label>
        <input type="text" class="form-control" id="gst" nam="gst_amount" value="" disabled>
      </div>
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Total Payable Amount (₹):</label>
        <input type="text" class="form-control" id="finalTotal" placeholder="Add discount amount" value="" disabled>
      </div>
    </div>
    
    <div class="row mb-3">
      <div class="col-6">
        <label class="text-lg-end mt-1 mb-2">Payment Method:</label>
        <select class="form-control month-limit mb-2" id="payment_method" name="payment_method" >
          <option selected disabled>Select Payment Method</option>
          <option value="bank_transfer">Bank Transfer</option>
          <option value="cash">Cash</option>
        </select>
      </div>
      
      <div class="col-6" id="cashUploadBox" style="display:none;">
        <label class="text-lg-end mt-1 mb-2">Attachment:</label>
        <input type="file" class="form-control" id="attachment" name="attachment">
      </div>

    </div>

    <div class="row">
      <div class="col-8">
        <button type="submit" class="btn mt-2 btn-primary" style="width:100%;">Submit</button>
      </div>
      <div class="col-4">
        <button type="button" class="btn mt-2 btn-secondary" id="resetForm" style="width:100%;">Reset</button>
      </div>
    </div>

  </form>
</div>