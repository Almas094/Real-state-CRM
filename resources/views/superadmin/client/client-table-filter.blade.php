<div id="FilterBar" class="sdbr-sidebar">
  <button class="sdbr-close-button" onclick="closeFilterbar()">&times;</button>
  <h2>Filter Clients</h2>
  
  <form class="mt-2">
  

    <label class="text-lg-end mt-2 mb-2">Name:</label>
   <input type="text" class="form-control" name="clinet_name" id="name" placeholder="Enter POC, Company Name">


    <label class="text-lg-end mt-2 mb-2">Status:</label>
    <select class="form-control users-limit mb-2" name="status" id="user_status" multiple>
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>
    </select>

    <button type="button" id="FilterSearchBtn" class="btn mt-2 btn-primary" style="width:100%;">Search</button>
  </form>

</div>



