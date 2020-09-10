@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">

    <div class="content">
        <img src="/img/10guy.jpg" alt="10 guy">
        <div class="title m-b-md">
            MEME
        </div>
        <a href="{{ route('meme.create') }}">Create a Meme</a>
    </div>
</div>
@endsection