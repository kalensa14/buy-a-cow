<?php

namespace App\Http\Controllers;

use App\Enums\ButtonClickValue;
use App\Events\ButtonClicked;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function store()
    {
        $user = Auth::user();

        if ($user->purchases->isNotEmpty()) {
            return response()->noContent(406);
        }

        $user->purchases()->create();

        event(new ButtonClicked($user, ButtonClickValue::BUY));

        return response()->noContent();
    }
}
