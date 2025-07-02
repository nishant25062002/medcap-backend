<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'message' => 'required|string|max:1000'
            ]);

            $feedback = Feedback::create([
                'user_id' => Auth::id(),
                'message' => $request->message,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Feedback submitted successfully.',
                'data' => $feedback
            ], 201);

        } catch (\Exception $e) {
            Log::error('Feedback submission error: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'error' => 'Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
