<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Make sure Auth is imported at the top of the file

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
