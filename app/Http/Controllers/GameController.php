<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index()
    {
        $games = Game::all();
        $response = [
            'message' => "Data Game",
            'data' => $games,
        ];
        return response($response, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'realease_on' => 'required',
            'author_id' => 'required',
            'gendre_id'=> 'required'
        ]);

        try {
            $games = Game::create($request->all());
            $response = [
                'message' => "Game Tersimpan",
                'data' => $games,
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
        $games = Game::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'realease_on' => 'required',
            'author_id' => 'required',
            'gendre_id'=> 'required'
        ]);

        try {
            $games->update($request->all());
            $response = [
                'message' => "Game Terupdate",
                'data' => $games,
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
        $games = Game::findOrFail($id);
        try {
            $games->delete();
            $response = [
                'message' => "Game Terhapus",
            ];
            return response($response, 200);
        } catch (\Throwable $e) {
            return response([
                'message' => "Error " . $e,
            ], 500);
        }
    }
}
