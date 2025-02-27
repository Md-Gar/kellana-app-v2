<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function passVariable($variable)
    {
        return view('apply.application_form', compact('variable'));
    }
}
