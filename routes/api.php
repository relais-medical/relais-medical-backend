<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\VisiteController;
use App\Http\Controllers\Api\OffreController;
use App\Http\Controllers\Api\RapportController;
use App\Http\Controllers\Api\BonCommandeController;
use App\Http\Controllers\ContactController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Commerciaux
    Route::get('/users', function() {
        return response()->json(\App\Models\User::select('id', 'name', 'email')->get());
    });
    Route::post('/users', function(\Illuminate\Http\Request $request) {
        $user = \App\Models\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password ?? 'relais2026'),
        ]);
        return response()->json($user, 201);
    });
    Route::put('/users/{id}', function(\Illuminate\Http\Request $request, $id) {
        $user = \App\Models\User::findOrFail($id);
        $user->update($request->only(['name', 'email']));
        return response()->json($user);
    });
    Route::delete('/users/{id}', function($id) {
        \App\Models\User::findOrFail($id)->delete();
        return response()->json(['message' => 'Supprimé']);
    });

    Route::apiResource('clients', ClientController::class);
    Route::apiResource('visites', VisiteController::class);
    Route::apiResource('offres', OffreController::class);
    Route::apiResource('rapports', RapportController::class);
    Route::apiResource('bons-commande', BonCommandeController::class);
    Route::post('/contacts', [ContactController::class, 'store']);
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
});