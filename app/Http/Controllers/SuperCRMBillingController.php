<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SuperCRMBillingController extends Controller
{
    public function invoices()
    {
        return view('superadmin.billing.invoice-list');
    }


}
