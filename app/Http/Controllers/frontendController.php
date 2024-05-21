<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function job_details()
    {
        return view('job_details');
    }
}
