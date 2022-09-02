<?php

declare(strict_types=1);

namespace App\Http\Controllers\Data;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class Controller extends \App\Http\Controllers\Controller
{
    abstract function get(Request $request): JsonResponse;
}
