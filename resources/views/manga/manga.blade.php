@extends('layout.master')
@section('title','RECORDER MANGA')
@section('content')
    <table class="info">
        <tr>
            <th>MANGA NAME</th>
            <th>MANGA LINK</th>
            <th>STATE</th>
            <th>COUNT</th>
            <th colspan="2">options</th>
            <th><a href="add-manga"><button>ADD MANGA +</button></a></th>
        </tr>
        @foreach($manga_list as $key => $manga)
            <tr>
                @if(strlen($manga->name) >= 20 )
                    <th>{{ substr($manga->name,0,20) }}...</th>
                @else
                    <th>{{ $manga->name }}</th>
                @endif
                @if(explode("/",$manga->link)[2] == "")
                    <td><a target="_blank" href="{{ $manga->link }}">LOCAL FILE</a></td>
                @else
                    <td><a target="_blank" href="{{ $manga->link }}">{{ explode("/",$manga->link)[2] }}</a></td>
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
                <th colspan="2"><a href="/edit-manga/{{ $manga->id }}"><button style="background-color: #7dd727">EDIT</button></a></th>
                <th><a href="/delete-manga/{{ $manga->id }}"><button style="background-color: red">DELETE</button></a></th>
            </tr>
        @endforeach
    </table>
    <div id="pagination">
        @if($page != 1)
            <a href="/manga?page={{ $page - 1 }}"><</a>
        @endif
        @for ($i = 1; $i <= $numberOfPagination; $i++)
            <a href="/manga?page={{ $i }}">{{ $i }}</a>
        @endfor
        @if($page != $numberOfPagination)
            <a href="/manga?page={{ $page + 1 }}">></a>
        @endif
    </div>
@endsection
