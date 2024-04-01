<?php

// MUHAMAD RIAN APRILAYAWAN

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
    function updateData(Request $request, $id)
    {
        // Mencari data temperatur berdasarkan ID
        $temperature = Temperature::find($id);
        // Jika data tidak ditemukan
        if (!$temperature) {
            return response()->json([
                "message" => "Data temperature tidak ditemukan"
            ], 404);
        }
        // Update data temperatur
        $temperature->value = $request->temperature;
        $temperature->save();
        return response()->json([
            "message" => "Data temperature berhasil diupdate",
            "data" => $temperature
        ], 200);
    }
    function deleteData($id)
    {
        // Mencari data temperatur berdasarkan ID
        $temperature = Temperature::find($id);
        // Jika data tidak ditemukan
        if (!$temperature) {
            return response()->json([
                "message" => "Data temperature tidak ditemukan"
            ], 404);
        }
        // Menghapus data temperatur
        $temperature->delete();
        return response()->json([
            "message" => "Data temperature berhasil dihapus"
        ], 200);
    }
}
