<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addComment extends Controller
{
    public function addComment(Request $request){
        $comment = $request->validate([
            'review' => 'required'
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'review' => $request->review
        ]);
        return redirect()->back();
    }
}
