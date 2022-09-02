<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DownloadController extends Controller
{
    public function show(): View
    {
        return view('download');
    }
}
