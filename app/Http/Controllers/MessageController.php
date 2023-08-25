<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $messages = Message::with('user')->get();
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('chat.index',compact('messages','users'));
    }
    
    public function sendMessage(Request $request, $receiverId)
    {
        $sender = Auth::user();

        $message = Message::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiverId,
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($message, $sender, User::find($receiverId)))->toOthers();

        return back();
    }
}
