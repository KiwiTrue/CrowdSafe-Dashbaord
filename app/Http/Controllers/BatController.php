<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BatController extends Controller
{
    public function runBatFile(Request $request)
    {
        // Full path to your BAT file
        $batFilePath = 'D:\yolo\yolov7\run-detection.bat';

        // Execute the BAT file.
        // The output and return value are captured in $output and $returnVar.
        exec($batFilePath, $output, $returnVar);

        // Optionally, you can log the output or perform further processing.
        // For this example, we'll return a JSON response.
        return response()->json([
            'message'    => 'BAT file executed successfully!',
            'output'     => $output,
            'returnCode' => $returnVar,
        ]);
    }
}
