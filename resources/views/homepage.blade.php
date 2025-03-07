@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Welcome to CrowdSafe</h1>
    <p>Your AI-powered crowd monitoring system.</p>
    <a href="{{ route('live_feed') }}" class="btn btn-primary">Live Feed</a>
    <a href="{{ route('smart_surveillance') }}" class="btn btn-secondary">Smart Surveillance</a>
    <a href="{{ route('facial_recognition') }}" class="btn btn-warning">Facial Recognition</a>
    <a href="{{ route('dashboard') }}" class="btn btn-success">Dashboard</a>
</div>
@endsection
