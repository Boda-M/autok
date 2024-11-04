@extends('layouts.app')
@section("content")
    <h1>Gyártó Módosít</h1>
    <form action="{{route("makers/update",$entity->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Új név</label>
        <input type="text" name="name" id="name" value="{{$entity->name}}">
        <input type="text" name="logo" id="logo" value="{{$entity->logo}}">
        <button type="submit">Módosítás</button>
    </form>
@endsection
