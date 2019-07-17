<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Comment;
use App\Notifications\StatusCommentsNotification;

class StatusCommantController extends Controller
{
    public function store(Request $request, Status $status)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $comment = Comment::create([
            'user_id' => $status->user_id,
            'status_id' => $status->id,
            'message' => $request->message
        ]);

        $comment->load('user', 'status');

        $status->user->notify(new StatusCommentsNotification($comment));

        return redirect()->back()->with('success', "Your Comments Published !!");
    }
}
