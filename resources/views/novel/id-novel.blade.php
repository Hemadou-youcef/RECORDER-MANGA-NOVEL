@extends('layout.master')
@section('title','RECORDER EDIT NOVEL')
@section('content')
    <div>
        <a href="/novels"><button>BACK TO NOVEL</button></a>
        <br/><br/>
            @if(!empty($novel))
                <form action="/edit-novel/{{ $novel->id }}" method="post">
                @csrf
                    <table id="dtable">
                        @if(Session::has('novel_edited'))
                            <tr>
                                <th colspan="7"><h1 class="posts">{{ strtoupper(Session::get('novel_edited')) }} :)</h1></th>
                            </tr>
                        @endif
                        <tr>
                            <th>NOVEL NAME</th>
                            <th>NOVEL LINK</th>
                            <th>NOVEL STATE</th>
                            <th>NOVEL COUNT</th>
                            <th colspan="2">OPTION</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="novel_name" placeholder="novel name" value="{{ $novel->name }}" /></td>
                            <td><input type="text" name="novel_link" placeholder="novel link" value="{{ $novel->link }}"/></td>
                            <td>
                                <select name="novel_state" >
                                    @if($novel->state == "R")
                                        <option value="R" selected>Read</option>
                                        <option value="UR">Unread</option>
                                    @elseif($novel->state = "UR")
                                        <option value="R">Read</option>
                                        <option value="UR" selected>Unread</option>
                                    @else
                                        <option value="R">Read</option>
                                        <option value="UR">Unread</option>
                                    @endif

                                </select>
                            </td>
                            <td><input type="number" min="0" name="novel_count" placeholder="manga count" value="{{ substr($novel->count,8) }}"/></td>
                            <td><input type="submit" value="EDIT"/></td>
                            <td><input type="reset" value="RESET"/></td>
                        </tr>
                    </table>
                </form>
            @else
                <h1 class="notification">:( THERE IS NO NOVEL</h1>
            @endif

    </div>
@endsection
