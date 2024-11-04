@extends('layouts.app')
@section("content")
<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="search-field">Üzemanyag</th>
        </tr>
    </thead>
    <form action="{{route("fuels/store")}}" method="post">
        @csrf
        @method('POST')
        <label for="name">Új üzemanyag</label>
        <input type="text" name="name" id="name">
        <button type="submit">Létrehozás</button>
    </form>
    <tbody>
        @foreach($entities as $entity)
            <tr>
                <td id={{$entity->id}}>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
                <td>
                    <form action="{{ route('fuels/edit', $entity->id) }}" method="POST">
                        @csrf
                        <button type="submit"><img src="edit.png" alt="" height="20px"></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('fuels/destroy', $entity->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="delete.png" alt="" height="20px"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection