<?php

namespace App\Http\Controllers;

use App\Models\novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NovelController extends Controller
{
    public function getAllNovelsRecord(Request $request){
        # ADD PAGINATION
        $page = $request->query('page');
        if ($page == null) {
            $page = 1;
        }
        # GET NUMBER OF RECORDS
        $numberOfRecords = DB::table('novels')->count();
        $numberOfPagination = intval($numberOfRecords / 10) + 1;
        if ($numberOfRecords % 10 == 0 && $numberOfRecords != 0) {
            $numberOfPagination = $numberOfPagination - 1;
        }
        # GET RECORDS
        $novel_list = DB::table('novels')
            ->orderBy('state', 'DESC')
            ->orderBy('count', 'DESC')
            ->paginate(10 * $page);

        return view('novel.novel',compact('novel_list','numberOfPagination','page'));
    }
    public function getNovelById($id){
        $novel = novel::where('id',$id)->get()->first();
        return view('novel.id-novel',compact('novel'));
    }
    public function editNovelById(Request $request,$id){
//        $validateData = $request->validate([
//            'title' => 'required',
//            'body' => 'required'
//        ]);
        DB::table('novels')->where('id',$id)->update([
            'name' => $request->novel_name,
            'link' => $request->novel_link,
            'state' => $request->novel_state,
            'count' => "chapter-" .  $request->novel_count
        ]);
        return back()->with('novel_edited','novel has been edited Successfully');
    }
    public function removeNovelById($id){
        novel::where('id',$id)->delete();
        return redirect("/");
    }
    public function addNovelForm(){
        return view("novel.add-novel");
    }
    public function addNovelAction(){
        $Delivery = new novel();

        $Delivery->name = request('novel_name');
        $Delivery->link = request('novel_link');
        $Delivery->state = request('novel_state');
        $Delivery->count = "chapter-" . request('novel_count');

        $Delivery->save();

        return back()->with('novel_added','novel has been created Successfully');
    }
}
