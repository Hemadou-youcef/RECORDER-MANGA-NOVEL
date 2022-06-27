<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getAllRecords(){
        $manga_list = DB::table('mangas')
            ->orderBy('state', 'DESC')
            ->orderBy('count', 'DESC')
            ->get();
        $novel_list = DB::table('novels')
            ->orderBy('state', 'DESC')
            ->orderBy('count', 'DESC')
            ->get();
        return view('home',compact('manga_list','novel_list'));
    }
}
