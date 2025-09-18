<?php

use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/save-fcm-token', function (Request $request) {
    $request->validate(['token' => 'required|string']);

    UserToken::updateOrCreate(
        ['fcm_token' => $request->token],
        ['user_id' => auth()->id()]
    );

    return response()->json(['success' => true]);
});
