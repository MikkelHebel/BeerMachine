<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class BatchController extends Controller 
{
    public function expectedFailureRate(Request $request) 
    {
        $speed = $request->query('speed');

        if (!$speed) {
            return response()->json([
                'error' => true,
                'message' => 'Missing speed parameter!'
            ], 400);
        }

        // Fetches up to the last ten batches
        $batches = \App\Models\Batch::where('speed', $speed)
            ->where('amount_completed', '>', 0)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        // If fewer than three batches exists, the failure rate cannot be correctly calculated
        if ($batches->count() < 3) {
            return response()->json([
                'speed' => $speed,
                'expectedFailureRate' => null,
                'basedOn' => $batches->count(),
            ]);
        }

        // Calculate the average failure rate
        $averageFailureRate = $batches->map(function ($batch) {
            return $batch->failed / $batch->amount_completed;
        })->avg();

        return response()->json([
            'speed' => $speed,
            'expectedFailureRate' => $averageFailureRate,
            'basedOn' => $batches->count(),
        ]);
    }
}