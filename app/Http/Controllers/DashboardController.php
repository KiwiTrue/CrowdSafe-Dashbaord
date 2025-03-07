<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard() {
        return view('dashboard');
    }

    public function showLiveFeed() {
        return view('live_feed');
    }

    public function showSmartSurveillance() {
        return view('smart_surveillance');
    }

    public function showFacialRecognition() {
        return view('facial_recognition');
    }
}
