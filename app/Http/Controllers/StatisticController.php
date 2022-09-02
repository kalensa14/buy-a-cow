<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StatisticController extends Controller
{
    public function show(): View
    {
        return view('statistic');
    }
}
