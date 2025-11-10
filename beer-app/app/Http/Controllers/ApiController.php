<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function BatchStatus(Request $request)
    {
        try {
            return $this->HttpGetStatus("batch");
        } catch (\Exception $e) {
            // If we dont get a response return a mock json for testings, if the api project is not running
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'batchId' => 1,
                'beerType' => 1,
                'speed' => 450,
                'toProduceAmount' => 250,
                'producedAmount' => 125,
                'defectiveAmount' => 23,
                'userId' => 1,
                'failureRate' => 125 / 23.0,
            ]);
        }
    }

    public function MachineStatus(Request $request)
    {
        try {
            return $this->HttpGetStatus("machine");
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'Speed' => 450,
                'Ctrlcmd' => 0,
                'Temperature' => 31,
                'Vibration' => 3,
                'Humidity' => 10,
                'StopReason' => 0,
            ]);
        }
    }

    public function InventoryStatus(Request $request)
    {
        try {
            return $this->HttpGetStatus("inventory");
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'Barley' => 33200,
                'Hops' => 32000,
                'Malt' => 23750,
                'Wheat' => 30000,
                'Yeast' => 20000,
                'FillingInventory' => false,
            ]);
        }
    }

    private function HttpGetStatus(string $status)
    {
        $beerMachineApiBaseUrl = config('app.beermachine_api');
        $endPoint = "/status/$status";

        $response = Http::timeout(5)->get("{$beerMachineApiBaseUrl}{$endPoint}");

        if ($response->successful()) {
            return response()->json($response->json()); //200
        } elseif ($response->clientError()) {
            return response()->json($response->json()); //400
        } elseif ($response->serverError()) {
            return response()->json($response->json()); //500
        } else {
            throw new Exception("response failed");
        }
    }

    public function SendCommand(Request $request)
    {
        try {
            // Validate required fields
            $validated = $request->validate([
                'type' => 'required|string|max:255',
                'parameters' => 'sometimes|array' // Optional parameters (batch)
            ]);

            $commandData = [
                'Type' => $validated['type']
            ];

            if (isset($validated['parameters'])) {
                $commandData['Parameters'] = $validated['parameters'];
            }

            return $this->HttpPostCommand($commandData);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    private function HttpPostCommand(array $data)
    {
        // Call the BeerMachineApi running on host machine
        $beerMachineApiBaseUrl = config('app.beermachine_api');
        $endPoint = "/machine/command";

        $response = Http::timeout(5)->post("{$beerMachineApiBaseUrl}{$endPoint}", $data);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            throw new Exception("Command request failed with status: " . $response->status());
        }
    }
}
