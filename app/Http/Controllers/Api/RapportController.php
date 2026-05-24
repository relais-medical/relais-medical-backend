<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index() {
        return response()->json(Rapport::with(['client', 'visite'])->get());
    }

    public function store(Request $request) {
        $data = $request->all();
        // Ajoute automatiquement l'utilisateur connecté
        $data['user_id'] = auth()->id();
        $rapport = Rapport::create($data);
        return response()->json($rapport, 201);
    }

    public function show($id) {
        $rapport = Rapport::with(['client', 'visite'])->findOrFail($id);
        return response()->json($rapport);
    }

    public function update(Request $request, $id) {
        $rapport = Rapport::findOrFail($id);
        $rapport->update($request->all());
        return response()->json($rapport);
    }

    public function destroy($id) {
        Rapport::findOrFail($id)->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}