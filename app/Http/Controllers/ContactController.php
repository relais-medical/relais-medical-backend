<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function store(Request $request) {
        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    public function destroy($id) {
        Contact::findOrFail($id)->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}