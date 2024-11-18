@extends('layouts.app')
@section("content")
<table>
    <thead>
        <tr>
            <th>#</th>
            <th class="search-field">Gyártó</th>
        </tr>
    </thead>
    <tbody>
    <div>
        @foreach (range('A', 'Z') as $letter)
            <form action="{{ route('makers.letter', $letter) }}" method="POST" style="display:inline;">
                @csrf
                @method('GET')
                <button type="submit">{{ $letter }}</button>
            </form>
        @endforeach
    </div>
    <form action="{{route("makers/store")}}" method="post">
        @csrf
        @method('POST')
        <label for="name">Új név</label><br>
        <input type="text" name="name" id="name"><br>
        <button type="submit">Létrehozás</button>
    </form>
        @foreach($entities as $entity)
            <tr>
            @if (file_exists("logos/$entity->logo"))
                <td><img src="/logos/{{$entity->logo}}" alt=""></td>
            @else
                <td><img src="/logos/not_found.jpg" alt="" height="40px"></td>
            @endif
                <td id={{$entity->id}}>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
                <td>
                <form action="{{ route('carModels.idMaker', $entity->id) }}" method="GET">
                        @csrf
                        <button type="submit">details</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('makers/edit', $entity->id) }}" method="POST">
                        @csrf
                        <button type="submit"><img src="/edit.png" alt="" height="20px"></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('makers/destroy', $entity->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="/delete.png" alt="" height="20px"></button>
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
