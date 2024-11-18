@extends('layouts.app')
@section("content")
    <h1>Karosszéria Módosít</h1>
    <form action="{{route("karosszeriak/update",$entity->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{$entity->name}}"><br>
        <button type="submit">Módosítás</button>
    </form>
@endsection
