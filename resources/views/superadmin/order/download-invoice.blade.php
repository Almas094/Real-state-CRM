<div id="DownloadInvoice" class="sdbr-sidebar-3x">
    <button class="sdbr-close-button" onclick="closeDownloadInvoiceBar()">&times;</button>
    <h2>Download Invoice</h2>
    <hr>
    <div class="crm-invoice-box">
      <div class="crm-header">
          <div class="crm-header-left">
                <h1>Invoice</h1>
                <p>Invoice #: <span id="invoice_number"></span></p>
                <p>Date: <span id="invoice_date"></span></p>
                <p>Due Date: <span id="invoice_due_date"></span></p>
          </div>
          <div class="crm-header-right">
                <h2 id="n_company_name"></h2>
                <p id="company_address"></p>
                <p id="company_email"></p>
          </div>
      </div>
      <div class="crm-main">
          <section class="crm-client-details">
                <h3>Bill To:</h3>
                <p id="client_name"></p>
                <p id="client_address"></p>
                <p id="client_email"></p>
                
          </section>
          <table class="crm-invoice-table">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Plan</th>
                      <th>No. Of Months </th>
                      <th>Sub Total</th>
                      <th>GST Amount</th>
                      <th>Discount Amount</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody id="invoice_items"></tbody>
          </table>
      </div>
      <div class="crm-footer">
          <div class="crm-footer-left">
              <h3>Payment Information</h3>
              <p>Bank: XYZ Bank</p>
              <p>Account #: 123456789</p>
              <p>IFSC: XYZB12345</p>
          </div>
          <div class="crm-footer-right">
              <h3>Total Amount</h3>
              <p id="n_invoice_total"></p>
          </div>
      </div>
      <button class="crm-print-btn" onclick="window.print()">Print Invoice</button>
    </div>
</div>

