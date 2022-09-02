<?php

declare(strict_types=1);

namespace App\Http\Controllers\Data;

use App\Models\UserAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatisticController extends Controller
{

    function get(Request $request): JsonResponse
    {
        $query = UserAction::orderBy('created_at', 'DESC')
            ->with('user:id,name');

        return response()->json($query->get()->map(static function (UserAction $row) {
            return [
                'date' => $row->created_at->toDateString(),
                'user' => $row->user->name,
                'action' => $row->action->value,
                'extra' => $row->value,
            ];
        })->all());
    }
}
