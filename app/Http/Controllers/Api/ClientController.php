<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        return response()->json(Client::all());
    }

    public function store(Request $request) {
        $client = Client::create($request->all());
        return response()->json($client, 201);
    }

    public function show($id) {
        $client = Client::with(['visites', 'offres', 'contacts', 'commercial'])->findOrFail($id);
        return response()->json($client);
    }

    public function update(Request $request, $id) {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return response()->json($client->load(['visites', 'offres', 'contacts', 'commercial']));
    }

    public function destroy($id) {
        Client::findOrFail($id)->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}