<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function BatchStatus(Request $request)
    {
        $batchStatus = [
            'batchId' => 1,
            'beerType' => 1,
            'speed' => 450,
            'toProduceAmount' => 250,
            'producedAmount' => 125,
            'defectiveAmount' => 23,
            'userId' => 1,
            'failureRate' => 125 / 23.0,
        ];
        return response()->json($batchStatus);
    }

    public function MachineStatus(Request $request)
    {
        $machineStatus = [
            'Speed' => 450,
            'Ctrlcmd' => 0,
            'Temperature' => 31,
            'Vibration' => 3,
            'Humidity' => 10,
            'StopReason' => 0,
        ];
        return response()->json($machineStatus);
    }

    public function InventoryStatus(Request $request)
    {
        // max 35000
        $inventoryStatus = [
            'Barley' => 33200,
            'Hops' => 32000,
            'Malt' => 23750,
            'Wheat' => 30000,
            'Yeast' => 20000,
            'FillingInventory' => false,
        ];
        return response()->json($inventoryStatus);
    }

    public function MainStatus(Request $request)
    {
        return response()->json([]);
    }
}
