
@extends('layouts.app')
@section("content")
<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="search-field">Karosszériák</th>
        </tr>
    </thead>
    <form action="{{route("colors/store")}}" method="post">
        @csrf
        @method('POST')
        <label for="name">Név:<br></label>
        <input type="text" name="name" id="name"><br>
        <label for="hexa_code">szín:<br></label>
        
        <input type="color" name="hexa_code" id="hexa_code" value="#ffffff"><br>
        <button type="submit">Létrehozás</button>
    </form>
    <tbody>
        @foreach($entities as $entity)
            <tr>
                <td id={{$entity->id}}>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
                <td>{{$entity->hexa_code}}</td>
                <td style="background-color: {{$entity->hexa_code}};" width=29px></td>
                <td>
                    <form action="{{ route('colors/edit', $entity->id) }}" method="POST">
                        @csrf
                        <button type="submit"><img src="edit.png" alt="" height="20px"></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('colors/destroy', $entity->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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