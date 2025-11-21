<div id="FilterBar" class="sdbr-sidebar">
  <button class="sdbr-close-button" onclick="closeFilterbar()">&times;</button>
  <h2>Filter Order List</h2>
  
  <form class="mt-2">
    <label class="text-lg-end mt-1 mb-2">Plan Expiration:</label>
    <div class="input-daterange input-group mb-2" id="expiration-datepicker">
      <input type="date" class="form-control text-left" placeholder="Start date" name="start_date">
      <span class="input-group-text">to</span>
      <input type="date" class="form-control text-end date-range-end" placeholder="End date" name="end_date">
    </div>

    <label class="text-lg-end mt-2 mb-2">Order Status:</label>
    <select class="form-control billing-status-select mb-2" name="order_status" id="order_status" >
      <option value="">Select Order Status</option>
      <option value="pending">Pending</option>
      <option value="completed">Completed</option>
      <option value="cancelled">Cancelled</option>
    </select>

    <label class="text-lg-end mt-2 mb-2">Users limit:</label>
    <select class="form-control users-limit mb-2" name="f_user_plan_id" id="f_user_plan_id" >
      <option value="">Select Users limit</option>
      @foreach($userPlan as $val)
      <option value="{{$val->id}}">{{$val->name}}</option>
      @endforeach
    </select>

    <label class="text-lg-end mt-2 mb-2">Validity:</label>
    <select class="form-control users-limit mb-2" name="no_of_month" id="no_of_month" >
      <option value="">Select Validity</option>
      <option value="7 Days - Trial">7 Days Trial</option>
      <option value="1 Month">1 Month</option>
      <option value="3 Months">3 Months</option>
      <option value="6 Months">6 Months</option>
      <option value="12 Months">12 Months</option>
      <option value="2 Years">2 Years</option>
    </select>

   
    <button type="button" id="FilterSearchBtn" class="btn mt-2 btn-primary" style="width:100%;">Search</button>
  </form>

</div>



