<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        $user = Auth::user();
        $token = $user->createToken('YourAppName')->plainTextToken; // Use plainTextToken, not accessToken

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
