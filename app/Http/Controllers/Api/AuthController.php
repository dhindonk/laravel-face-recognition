<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function updateProfile(Request $request)
    {
        $userId = 1;

        $request->validate([
            'face_embedding' => 'required',
        ]);

        $user = User::find($userId);

        if (!$user) {
            return response(['message' => 'User not found'], 404);
        }

        $user->face_embedding = $request->face_embedding;
        $user->save();

        return response([
            'message' => 'Profile updated',
            'user' => $user,
        ], 200);
    }
}
