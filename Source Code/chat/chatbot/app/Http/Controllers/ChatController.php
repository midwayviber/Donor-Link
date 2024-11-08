<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function getReply(Request $request)
    {
        // Validate the incoming request to make sure 'message' is provided
        $request->validate([
            'message' => 'required|string',
        ]);

        // Retrieve the user's message
        $userInput = $request->input('message');

        // Send the input to the cloud inference service with API key in headers
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('ZUFHVOC6DTSTQSKB7ACCTYOWMM2YLRHXCTOQ'),
        ])->post('https://api.vultrinference.com/', [
            'input' => $userInput
        ]);

        // Parse the response (adjust based on the structure of your response)
        $reply = $response->json('choices.0.message.content') ?? 'No response received';

        // Return the reply back to the frontend as JSON
        return response()->json(['reply' => $reply]);
    }
}
