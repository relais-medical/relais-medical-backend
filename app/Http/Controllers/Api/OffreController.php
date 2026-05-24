<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use App\Models\OffreProduit;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index()
    {
        return Offre::with(['client', 'produits'])->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $data = $request->except('produits');
        $offre = Offre::create($data);
        
        if ($request->has('produits')) {
            foreach ($request->produits as $produit) {
                OffreProduit::create([
                    'offre_id' => $offre->id,
                    'nom' => $produit['nom'],
                    'quantite' => $produit['quantite'],
                    'prix_unitaire' => $produit['prix_unitaire'],
                ]);
            }
        }

        $montant = $offre->produits()->get()->sum(function($p) {
            return $p->quantite * $p->prix_unitaire;
        });
        
        $offre->update(['montant_total' => $montant]);

        return Offre::with(['client', 'produits'])->find($offre->id);
    }

    public function show($id)
    {
        return Offre::with(['client', 'produits'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $offre = Offre::findOrFail($id);
        $offre->update($request->except('produits'));

        if ($request->has('produits')) {
            $offre->produits()->delete();
            foreach ($request->produits as $produit) {
                OffreProduit::create([
                    'offre_id' => $offre->id,
                    'nom' => $produit['nom'],
                    'quantite' => $produit['quantite'],
                    'prix_unitaire' => $produit['prix_unitaire'],
                ]);
            }
            $montant = $offre->produits()->get()->sum(function($p) {
                return $p->quantite * $p->prix_unitaire;
            });
            $offre->update(['montant_total' => $montant]);
        }

        return Offre::with(['client', 'produits'])->find($offre->id);
    }

    public function destroy($id)
    {
        Offre::findOrFail($id)->delete();
        return response()->json(['message' => 'Offre supprimée']);
    }
}