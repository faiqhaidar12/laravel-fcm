<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function sendTestNotification(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $this->firebase->sendToDevice(
            $request->token,
            "Hello dari Laravel 🚀",
            "Ini notifikasi test Firebase Cloud Messaging",
            ['custom_key' => 'custom_value']
        );

        return response()->json(['success' => true]);
    }
}
