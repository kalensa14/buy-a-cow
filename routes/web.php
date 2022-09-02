<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatisticController;
use App\Http\Middleware\AdminRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(static function () {
    Route::get('/dashboard', static function () {
        return view('dashboard', ['purchased' => Auth::user()->purchases->isNotEmpty()]);
    })->name('dashboard');

    Route::post('/purchase', [PurchaseController::class, 'store'])
        ->name('purchase.store');

    Route::get('/download', [DownloadController::class, 'show'])
        ->name('download.show');

    Route::get('/download/file', [DownloadFileController::class, 'show'])
        ->name('download-file.show');

    Route::get('/reports', [ReportController::class, 'show'])
        ->name('report.show');

    Route::get('/reports/chart', [Data\ChartController::class, 'get'])
        ->name('reports-chart.get');

    Route::get('/stats/data', [Data\StatisticController::class, 'get'])
        ->name('statistic.data')
        ->middleware(AdminRole::class);

    Route::get('/stats', [StatisticController::class, 'show'])
        ->name('statistic.show')
        ->middleware(AdminRole::class);
});

require __DIR__.'/auth.php';
