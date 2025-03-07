@extends('layouts.app')

@section('content')


<div class="container mt-4">
    <!-- <h1 class="text-center">Real-Time Crowd Monitoring</h1> -->

    <!-- First Row-->
    <div class="row">       
        <div class="col-md-4 col-sm-12 video-container item">
            <h4>Video Stream Lounge</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="col-md-4 col-sm-12 video-container item">
            <h4>Video Parking</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="col-md-4 col-sm-12 video-container item">
            <h4>Video Parking</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
            </video>
        </div>
    </div>
        <!-- Second Row-->
        <div class="row">       
        <div class="col-md-4 col-sm-12 video-container item">
            <h4>Video Stream Lounge</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="col-md-4 col-sm-12 video-container item">
            <h4>Video Parking</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="col-md-4 col-sm-12 video-container item">
            <h4>Video Parking</h4>
            <video id="myVideo" width="640" height="360" controls>
            <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
            </video>
        </div>
    </div>


@endsection
