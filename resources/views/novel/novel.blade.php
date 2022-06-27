@extends('layout.master')
@section('title','RECORDER NOVELS')
@section('content')
    
    <table class="info">
        
        <tr>
            <th>NOVEL NAME</th>
            <th>NOVEL LINK</th>
            <th>STATE</th>
            <th>COUNT</th>
            <th colspan="2">options</th>
            <th><a href="add-novel"><button>ADD NOVEL +</button></a></th>
        </tr>
        @foreach($novel_list as $key => $novel)
            <tr>
                @if(strlen($novel->name) >= 100 )
                    <th>{{ substr($novel->name,0,40) }}...</th>
                @else
                    <th>{{ $novel->name }}</th>
                @endif
                @if(explode("/",$novel->link)[2] == "")
                    <td><a target="_blank" href="{{ $novel->link }}">LOCAL FILE</a></td>
                @else
                    <td><a target="_blank" href="{{ $novel->link }}">{{ explode("/",$novel->link)[2] }}</a></td>
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
                <th colspan="2"><a href="/edit-novel/{{ $novel->id }}"><button style="background-color: #7dd727">EDIT</button></a></th>
                <th><a href="/delete-novel/{{ $novel->id }}"><button style="background-color: red">DELETE</button></a></th>
            </tr>
        @endforeach
    </table>
    <div id="pagination">
        @if($page != 1)
            <a href="/novels?page={{ $page - 1 }}"><</a>
        @endif
        @for ($i = 1; $i <= $numberOfPagination; $i++)
            <a href="/novels?page={{ $i }}">{{ $i }}</a>
        @endfor
        @if($page != $numberOfPagination)
            <a href="/novels?page={{ $page + 1 }}">></a>
        @endif
    </div>
        
@endsection
