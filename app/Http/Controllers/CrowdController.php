<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjectCount;
use App\Models\Location;
use Carbon\Carbon;

class CrowdController extends Controller
{
    // Fetch all locations
    public function getLocations()
    {
        return response()->json(Location::all());
    }

    // Fetch latest crowd data for a specific location (only for 'person' type)
    public function getLatestCrowdData($location_id)
    {
        $latestCounts = ObjectCount::where('location_id', $location_id)
            ->where('type', 'person')
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('type');

        return response()->json($latestCounts->isNotEmpty() ? $latestCounts : ['message' => 'No data found'], 200);
    }

    // Fetch latest crowd summary for all locations (only for 'person' type)
    public function getCrowdSummary()
    {
        $latestCounts = ObjectCount::select('location_id', 'type', 'count', 'created_at')
            ->where('type', '1')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('location_id');

        $summary = [];
        foreach ($latestCounts as $locationId => $counts) {
            $location = Location::find($locationId);
            $summary[] = [
                'location' => $location ? $location->name : 'Unknown',
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
                'data' => $counts->unique('type')->values(),
            ];
        }

        return response()->json($summary, 200);
    }

    // Fetch weekly trend analysis data (only for 'person' type)
    public function getWeeklyTrend()
    {
        $weeklyTrend = ObjectCount::selectRaw('DATE(created_at) as date, type, SUM(count) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->where('type', 'person')
            ->groupBy('date', 'type')
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($weeklyTrend, 200);
    }
}
