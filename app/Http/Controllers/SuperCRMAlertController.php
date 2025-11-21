<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SuperCRMAlertController extends Controller
{
    public function alertTemplates()
    {
        return view('superadmin.alert.templates-list');
    }

    public function sendNotification()
    {
        return view('superadmin.alert.send-notification');
    }


}
