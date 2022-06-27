@extends('layout.master')
@section('title','RECORDER ADD NOVEL')
@section('content')
    <div>
        <a href="/novels"><button>BACK TO NOVEL</button></a>
        <br/><br/>
        <form action="{{ route('novel.AddNovel') }}" method="post">
            @csrf
        <table id="dtable">
            @if(Session::has('novel_added'))
                <tr>
                    <th colspan="7"><h1 class="posts">{{ strtoupper(Session::get('novel_added')) }} :)</h1></th>
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
                <td><input type="text" name="novel_name" placeholder="novel name"/></td>
                <td><input type="text" name="novel_link" placeholder="novel link"/></td>
                <td>
                    <select name="novel_state">
                        <option value="R">Read</option>
                        <option value="UR">Unread</option>
                    </select>
                </td>
                <td><input type="number" min="0" name="novel_count" placeholder="novel count"/></td>
                <td><input type="submit" value="ADD"/></td>
                <td><input type="reset" value="RESET"/></td>
            </tr>
        </table>
        </form>

    </div>
@endsection
