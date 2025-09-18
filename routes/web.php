<?php

use App\Http\Controllers\FirebaseController;
use App\Models\UserToken;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-fcm', function (FirebaseService $firebase) {
    $token = UserToken::latest()->value('fcm_token');
    if ($token) {
        $firebase->sendToDevice($token, "Halo 🚀", "Test notifikasi dari Laravel");
        return "Notif terkirim!";
    }
    return "Token belum ada";
});
