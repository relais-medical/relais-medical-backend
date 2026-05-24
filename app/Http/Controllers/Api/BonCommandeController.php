<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BonCommande;
use Illuminate\Http\Request;

class BonCommandeController extends Controller
{
    public function index()
    {
        return BonCommande::with('client')->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['montant'] = $request->input('montant') ?: 0;
        
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bons_commande'), $filename);
            $data['fichier'] = $filename;
        }

        $bc = BonCommande::create($data);
        return BonCommande::with('client')->find($bc->id);
    }

    public function show($id)
    {
        return BonCommande::with('client')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $bc = BonCommande::findOrFail($id);
        $data = $request->all();
        $data['montant'] = $request->input('montant') ?: 0;
        $bc->update($data);
        return BonCommande::with('client')->find($bc->id);
    }

    public function destroy($id)
    {
        BonCommande::findOrFail($id)->delete();
        return response()->json(['message' => 'Bon de commande supprimé']);
    }
}