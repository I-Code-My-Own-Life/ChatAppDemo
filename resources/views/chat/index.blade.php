@extends('layouts.app')

@section('content')
    <h1 style="text-align:center;">Chat with your friends</h1>
    {{-- Showing all the users :  --}}
    <div style="margin-left:44%; margin-top:50px;">
        @foreach ($users as $user )
            <div style="font-size:20px;" class="mx-3 my-3">
                <li><a style="text-decoration:none;" href="{{ route('chat.user',['user' => $user]) }}">{{ $user->name }}</a></li>
            </div>
        @endforeach
    </div>
@endsection
