@extends('layout.master')
@section('title','RECORDER ADD MANGA')
@section('content')
    <div>
        <a href="/manga"><button>BACK TO MANGA</button></a>
        <br/><br/>
        <form action="{{ route('manga.AddManga') }}" method="post">
            @csrf
        <table id="dtable">
            @if(Session::has('manga_added'))
                <tr>
                    <th colspan="7"><h1 class="posts">{{ strtoupper(Session::get('manga_added')) }} :)</h1></th>
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
                <td><input type="text" name="manga_name" placeholder="manga name"/></td>
                <td><input type="text" name="manga_link" placeholder="manga link"/></td>
                <td>
                    <select name="manga_state">
                        <option value="R">Read</option>
                        <option value="UR">Unread</option>
                    </select>
                </td>
                <td><input type="number" min="0" name="manga_count" placeholder="manga count"/></td>
                <td><input type="submit" value="ADD"/></td>
                <td><input type="reset" value="RESET"/></td>
            </tr>
        </table>
        </form>

    </div>
@endsection
