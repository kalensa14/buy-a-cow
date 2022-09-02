<?php

declare(strict_types=1);

namespace App\Http\Controllers\Data;

use App\Models\UserAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{

    function get(Request $request): JsonResponse
    {
        $query = UserAction::selectRaw('DATE(created_at) AS date, action, value')
            ->groupBy(['date', 'action', 'value'])
            ->selectRaw('COUNT(*) AS actions')
            ->where('user_id', Auth::user()->id);

        return response()->json($query->get()->map(static function ($row) {
            return [
                'date' => $row->date,
                'action' => $row->action->value . ($row->value ? ' '.$row->value : ''),
                'value' => $row->actions
            ];
        })->all());
    }
}
