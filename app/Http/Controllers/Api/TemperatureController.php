<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temperature;

class TemperatureController extends Controller
{
    function getData()
    {
        $temperature = Temperature::all();

        return response()->json([
            "message" => "Data Temperature berhasil diambil",
            "data"    => $temperature
        ], 200);
    }

    function insertData(Request $request)
    {
        // ambil data 
        $value = $request->temperature;

        //menyimpan data ke database
        $temperature = Temperature::create([
            'value' => $value
        ]);

        // mengermbalikan response JSON 
        // dengan status code 200 - 201
        return response()->json([
            "message" => "Data Berhasil Ditambahkan!",
            "data" => $temperature
        ], 201);
    }
}