<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;


class ClientMasterController extends Controller
{
    public function configurationList()
    {
        return view('client.masters.configration-masters');
    }

    public function locationList()
    {
        return view('client.masters.location-masters');
    }

    public function sourceList()
    {
        return view('client.masters.source-masters');
    }

    public function dispositionList()
    {
        return view('client.masters.disposition-masters');
    }

    public function subdispositionList()
    {
        return view('client.masters.subdisposition-masters');
    }



}
