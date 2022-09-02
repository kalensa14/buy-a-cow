<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ReportController extends Controller
{
    public function show(): View
    {
        return view('report');
    }
}
