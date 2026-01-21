<?php

namespace App\Http\Controllers;

use App\Events\ReactionSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReactionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:wave,love,energy,joy'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
         broadcast(new ReactionSent($request->type));
        return response()->json([
            'success' => true,
            'type' => $request->type,
            'message' => 'Reaction sent successfully!'
        ]);

    }

}
