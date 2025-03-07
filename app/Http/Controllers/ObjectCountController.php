<?php

namespace App\Http\Controllers;

use App\Models\ObjectCount;
use Illuminate\Http\Request;

class ObjectCountController extends Controller
{
    public function getRealTimeData()
    {
        $data = ObjectCount::where('object_type', 'person')
                ->orderBy('timestamp', 'desc')
                ->take(1)->get();
        return response()->json($data);
    }
}