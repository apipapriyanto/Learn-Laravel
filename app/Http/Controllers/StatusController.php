<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        Status::create([
            'user_id' => $request->user()->id,
            'status' => $request->status
        ]);

         return redirect()->back()->with("success", "Your Status Updated !!");
    }

    public function show(Status $status)
    {
        $status->load('comments');
        $comments = $status->comments()->latest()->get();

        return view('status.show', compact('status', 'comments'));
    }
}
