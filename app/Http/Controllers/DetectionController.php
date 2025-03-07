<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetectionController extends Controller
{
    public function runDetection(Request $request)
    {
        // ----------------------------------------------------------------
        // 1. Run your YOLO detection process.
        // For example, you might execute a Python script:
        //
        // $command = 'python ' . base_path('scripts/run_yolo_detection.py');
        // exec($command, $output, $returnVar);
        //
        // For demonstration purposes, we'll simulate a delay:
        // ----------------------------------------------------------------
        sleep(2); // simulate detection delay

        // ----------------------------------------------------------------
        // 2. Define the expected location of the processed video.
        // Adjust the path to match your setup.
        // ----------------------------------------------------------------
        $videoPath = public_path('videos/video.mp4');

        if (!file_exists($videoPath)) {
            return response()->json([
                'message' => 'Detection completed, but video file not found.'
            ], 404);
        }

        // ----------------------------------------------------------------
        // 3. Create a URL for the video file.
        // ----------------------------------------------------------------
        $videoUrl = asset('videos/video.mp4');

        // ----------------------------------------------------------------
        // 4. Return a JSON response with the video URL.
        // ----------------------------------------------------------------
        return response()->json([
            'message'   => 'YOLO detection completed. Video is ready.',
            'video_url' => $videoUrl,
        ]);
    }
}
