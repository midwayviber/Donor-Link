<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// Define the chatbot route
Route::post('/chat', [ChatController::class, 'getReply']);

// Example route for authenticated users (you can leave this as is if not needed)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
