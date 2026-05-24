<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    public function index() {
        return response()->json(Visite::with('client')->get());
    }

    public function store(Request $request) {
        $visite = Visite::create($request->all());
        return response()->json($visite, 201);
    }

    public function show($id) {
        $visite = Visite::with('client')->findOrFail($id);
        return response()->json($visite);
    }

    public function update(Request $request, $id) {
        $visite = Visite::findOrFail($id);
        $visite->update($request->all());
        return response()->json($visite);
    }

    public function destroy($id) {
        Visite::findOrFail($id)->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}