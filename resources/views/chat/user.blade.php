@extends('layouts.app')

@section('content')
    <h2 style="text-align:center;">Send message to {{ $user->name }}</h2>
    {{-- Showing all the users :  --}}
    <div style="margin-left:37%; margin-top:50px;">
        <form method="post" action="{{route('message.send',['receiverId' => $user->id])}}">
            @csrf
            <input name="message" style="text-align:center;width:300px;" type="text" placeholder="Enter the message you want to send">
            <button style="margin:15px; width:70px; background:red" type="submit">Send</button>
        </form>
    </div>
@endsection
