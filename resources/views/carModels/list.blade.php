@php
    use App\Models\CarModel;
@endphp
@extends('layouts.app')
@section("content")
<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="search-field">Modellek</th>
        </tr>
    </thead>
    <form action="{{route("carModels/store")}}" method="POST">
        @csrf
        @method('POST')
        <label for="name">Név:<br></label>
        <input type="text" name="name" id="name"><br>
        <label for="idMaker">Gyártó id:<br></label>
        
        <input type="text" name="idMaker" id="idMaker"><br>
        <button type="submit">Létrehozás</button>
    </form>
    <tbody>
        @foreach($entities as $entity)
            <tr>
                <td id={{$entity->id}}>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
                <td>{{$entity->idMaker}}</td>

                <td>{{$entity->maker->name}}</td>
                
                
                <td>
                    <form action="{{ route('carModels/edit', $entity->id) }}" method="POST">
                        @csrf
                        <button type="submit"><img src="edit.png" alt="" height="20px"></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('carModels/destroy', $entity->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="delete.png" alt="" height="20px"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="paginator">
    {{$entities->links()}}
</div>
@endsection