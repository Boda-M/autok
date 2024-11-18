@extends('layouts.app')
@section("content")
    <h1>CarModel Módosít</h1>
    <form action="{{route("carModels/update",$entity->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Név:</label><br>
        <input type="text" name="name" id="name" value="{{$entity->name}}"><br>
        <label for="idMaker">Gyártó id (eddig: {{$entity->maker->id}}: {{$entity->maker->name}}):</label><br>
        <input type="text" name="idMaker" id="idMaker" value="{{$entity->maker->id}}"><br>
        <button type="submit">Módosítás</button>
    </form>
@endsection
