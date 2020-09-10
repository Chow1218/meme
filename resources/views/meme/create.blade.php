@extends('layouts.layout')

@section('content')
<div class="wrapper meme-create">
    <h1>Create a Meme</h1>
    <form action="/meme/all" method="POST">
        @csrf
        <label for="name">Name: </label>
        <input type="text" id="name" name="name">
        <label for="url">Url: </label>
        <input type="text" id="url" name="url">
        <br>
        <input type="submit" value="Create Meme">
    </form>
</div>
@endsection
