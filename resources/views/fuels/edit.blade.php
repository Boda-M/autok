@extends('layouts.app')
@section("content")
    <h1>Üzemanyag Módosít</h1>
    <form action="{{route("fuels/update",$entity->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Új üzemanyag</label>
        <input type="text" name="name" id="name" value="{{$entity->name}}">
        <button type="submit">Módosítás</button>
    </form>
@endsection
