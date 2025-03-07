<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrowdController;

// Fetch all locations
Route::get('/locations', [CrowdController::class, 'getLocations']);

// Fetch latest crowd data for a specific location (only 'person' type)
Route::get('/crowd-latest/{location_id}', [CrowdController::class, 'getLatestCrowdData']);

// Fetch latest crowd summary for all locations (only 'person' type)
Route::get('/crowd-summary', [CrowdController::class, 'getCrowdSummary']);

// Fetch weekly trend data for 'person' type
Route::get('/weekly-trend', [CrowdController::class, 'getWeeklyTrend']);
