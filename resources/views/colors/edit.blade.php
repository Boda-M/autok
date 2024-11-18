@extends('layouts.app')
@section("content")
    <h1>Karosszéria Módosít</h1>
    <form action="{{route("colors/update",$entity->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{$entity->name}}"><br>
        <input type="color" name="hexa_code" id="hexa_code" value="{{$entity->hexa_code}}"><br>
        <button type="submit">Módosítás</button>
    </form>
@endsection
