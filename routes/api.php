<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Make sure Auth is imported at the top of the file

Route::options('/{any}', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Origin', 'https://lucid-proskuriakova.185-210-93-238.plesk.page')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization, Accept')
        ->header('Access-Control-Allow-Credentials', 'true')
        ->header('Access-Control-Max-Age', '86400');
})->where('any', '.*');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        $user = Auth::user();
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
        ]);
    }

    // Authentication failed
    return response()->json([
        'success' => false,
        'message' => 'Unauthorized',
    ], 401);
});

// Example route for testing CORS
Route::options('/login', function () {
    return response()->json(['status' => 'success'], 200);
});
