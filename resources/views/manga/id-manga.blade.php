@extends('layout.master')
@section('title','RECORDER EDIT MANGA')
@section('content')
    <div>
        <a href="/manga"><button>BACK TO MANGA</button></a>
        <br/><br/>
            @if(!empty($manga))
                <form action="/edit-manga/{{ $manga->id }}" method="post">
                @csrf
                    <table id="dtable">
                        @if(Session::has('manga_edited'))
                            <tr>
                                <th colspan="7"><h1 class="posts">{{ strtoupper(Session::get('manga_edited')) }} :)</h1></th>
                            </tr>
                        @endif
                        <tr>
                            <th>MANGA NAME</th>
                            <th>MANGA LINK</th>
                            <th>MANGA STATE</th>
                            <th>MANGA COUNT</th>
                            <th colspan="2">OPTION</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="manga_name" placeholder="manga name" value="{{ $manga->name }}" /></td>
                            <td><input type="text" name="manga_link" placeholder="manga link" value="{{ $manga->link }}"/></td>
                            <td>
                                <select name="manga_state" >
                                    @if($manga->state == "R")
                                        <option value="R" selected>Read</option>
                                        <option value="UR">Unread</option>
                                    @elseif($manga->state = "UR")
                                        <option value="R">Read</option>
                                        <option value="UR" selected>Unread</option>
                                    @else
                                        <option value="R">Read</option>
                                        <option value="UR">Unread</option>
                                    @endif

                                </select>
                            </td>
                            <td><input type="number" min="0" name="manga_count" placeholder="manga count" value="{{ substr($manga->count,8) }}"/></td>
                            <td><input type="submit" value="EDIT"/></td>
                            <td><input type="reset" value="RESET"/></td>
                        </tr>
                    </table>
                </form>
            @else
                <h1 class="notification">:( THERE IS NO MANGA</h1>
            @endif

    </div>
@endsection
