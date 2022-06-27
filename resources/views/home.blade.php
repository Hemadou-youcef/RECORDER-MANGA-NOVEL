@extends('layout.master')
@section('title','RECORDER HOME')
@section('content')
    <table class="info">
        <tr>
            <th>MANGA NAME</th>
            <th>MANGA LINK</th>
            <th>STATE</th>
            <th>COUNT</th>
            <th colspan="3">options</th>
        </tr>
        @foreach($manga_list as $key => $manga)
            <tr>
                @if(strlen($manga->name) >= 40 )
                    <th>{{ substr($manga->name,0,20) }}...</th>
                @else
                    <th>{{ $manga->name }}</th>
                @endif
                @if(strlen($manga->link) >= 40 )
                    <td><a target="_blank" href="{{ $manga->link }}">{{ substr($manga->link,0,20) }}...</a></td>
                @else
                    <td><a target="_blank" href="{{ $manga->link }}">{{ $manga->link }}</a></td>
                @endif
                <th>
                    @if($manga->state == "R")
                        <span style="color:#47ea43;text-shadow:0px 0px 5px ">R</span>
                    @elseif($manga->state = "UR")
                        <span style="color:#ff4141;text-shadow:0px 0px 5px ">UR</span>
                    @else
                        {{ $manga->state }}
                    @endif
                </th>
                <td>{{ $manga->count }}</td>
                <th><a href="/edit-manga/{{ $manga->id }}"><button style="background-color: #7dd727">EDIT</button></a></th>
                <th><a href="/delete-manga/{{ $manga->id }}"><button style="background-color: red">DELETE</button></a></th>
            </tr>
        @endforeach
        <tr>
            <th colspan="6"><a href="add-manga"><button>ADD MANGA</button></a></th>
        </tr>
    </table>
    <br/><br/>
    <table class="info">
        <tr>
            <th>NOVEL NAME</th>
            <th>NOVEL LINK</th>
            <th>STATE</th>
            <th>COUNT</th>
            <th colspan="3">options</th>
        </tr>
        @foreach($novel_list as $key => $novel)
            <tr>
                @if(strlen($novel->name) >= 100 )
                    <th>{{ substr($novel->name,0,40) }}...</th>
                @else
                    <th>{{ $novel->name }}</th>
                @endif
                @if(strlen($novel->link) >= 40 )
                    <td><a target="_blank" href="{{ $novel->link }}">{{ substr($novel->link,0,20) }}...</a></td>
                @else
                    <td><a target="_blank" href="{{ $novel->link }}">{{ $novel->link }}</a></td>
                @endif
                <th>
                    @if($novel->state == "R")
                        <span style="color:#47ea43;text-shadow:0px 0px 5px ">R</span>
                    @elseif($novel->state = "UR")
                        <span style="color:#ff4141;text-shadow:0px 0px 5px ">UR</span>
                    @else
                        {{ $novel->state }}
                    @endif
                </th>
                <td>{{ $novel->count }}</td>
                <th><a href="/edit-novel/{{ $novel->id }}"><button style="background-color: #7dd727">EDIT</button></a></th>
                <th><a href="/delete-novel/{{ $novel->id }}"><button style="background-color: red">DELETE</button></a></th>
            </tr>
        @endforeach
        <tr>
            <th colspan="6"><a href="add-novel"><button>ADD NOVEL</button></a></th>
        </tr>
    </table>

@endsection
