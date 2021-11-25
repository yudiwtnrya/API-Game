<?php

namespace App\Http\Controllers;

use App\Models\Gendre;
use Illuminate\Http\Request;

class GendreController extends Controller
{

    public function index()
    {
        $gendres = Gendre::all();
        $response = [
            'message' => "Data gendre",
            'data' => $gendres,
        ];
        return response($response, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $gendres = Gendre::create($request->all());
            $response = [
                'message' => "Gendre Tersimpan",
                'data' => $gendres,
            ];
            return response($response, 201);
        } catch (\Throwable $e) {
            return response([
                'message' => "Error " . $e,
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $gendres = Gendre::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $gendres->update($request->all());
            $response = [
                'message' => "Gendre Terupdate",
                'data' => $gendres,
            ];
            return response($response, 200);
        } catch (\Throwable $e) {
            return response([
                'message' => "Error " . $e,
            ], 500);
        }
    }

    public function destroy($id)
    {
        $gendres = Gendre::findOrFail($id);
        try {
            $gendres->delete();
            $response = [
                'message' => "Gendre Terhapus",
            ];
            return response($response, 200);
        } catch (\Throwable $e) {
            return response([
                'message' => "Error " . $e,
            ], 500);
        }
    }
}
