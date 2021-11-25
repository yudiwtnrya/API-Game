<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        $response = [
            'message' => "Data Author",
            'data' => $authors,
        ];
        return response($response, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        try {
            $authors = Author::create($request->all());
            $response = [
                'message' => "Author Tersimpan",
                'data' => $authors,
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
        $authors = Author::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        try {
            $authors->update($request->all());
            $response = [
                'message' => "Author Terupdate",
                'data' => $authors,
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
        $authors = Author::findOrFail($id);
        try {
            $authors->delete();
            $response = [
                'message' => "Author Terhapus",
            ];
            return response($response, 200);
        } catch (\Throwable $e) {
            return response([
                'message' => "Error " . $e,
            ], 500);
        }
    }
}
