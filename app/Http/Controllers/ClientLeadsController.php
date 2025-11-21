<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;


class ClientLeadsController extends Controller
{
    public function addLeads()
    {
        return view('client.all-leads.add-leads');
    }

    public function allLeads()
    {
        return view('client.all-leads.all-leads');
    }


}
