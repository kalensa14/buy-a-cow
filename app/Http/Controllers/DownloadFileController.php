<?php

namespace App\Http\Controllers;

use App\Enums\ButtonClickValue;
use App\Events\ButtonClicked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadFileController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function show(): StreamedResponse
    {
        event(new ButtonClicked(Auth::user(), ButtonClickValue::DOWNLOAD));

        return Storage::disk('local')->download('/downloads/dummy.exe');
    }
}
