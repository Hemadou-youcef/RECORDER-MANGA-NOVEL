<?php

namespace App\Http\Controllers;

use App\Models\manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MangaController extends Controller
{
    public function getAllMangaRecord(Request $request){
        # ADD PAGINATION
        $page = $request->query('page');
        if ($page == null) {
            $page = 1;
        }
        # GET NUMBER OF RECORDS
        $numberOfRecords = DB::table('mangas')->count();
        $numberOfPagination = intval($numberOfRecords / 10) + 1;
        if ($numberOfRecords % 10 == 0 && $numberOfRecords != 0) {
            $numberOfPagination = $numberOfPagination - 1;
        }
        # GET RECORDS
        $manga_list = DB::table('mangas')
            ->orderBy('state', 'DESC')
            ->orderBy('count', 'DESC')
            ->paginate(10);
        return view('manga.manga',compact('manga_list','numberOfPagination','page'));
    }
    public function getMangaById($id){
        $manga = manga::where('id',$id)->get()->first();
        return view('manga.id-manga',compact('manga'));
    }
    public function editMangaById(Request $request,$id){
//        $validateData = $request->validate([
//            'title' => 'required',
//            'body' => 'required'
//        ]);
        DB::table('mangas')->where('id',$id)->update([
            'name' => $request->manga_name,
            'link' => $request->manga_link,
            'state' => $request->manga_state,
            'count' => "chapter-" .  $request->manga_count
        ]);
        return back()->with('manga_edited','manga has been edited Successfully');
    }
    public function removeMangaById($id){
        manga::where('id',$id)->delete();
        return redirect("/");
    }
    public function addMangaForm(){
        return view("manga.add-manga");
    }
    public function addMangaAction(Request $request){
        $Delivery = new manga();

        $Delivery->name = request('manga_name');
        $Delivery->link = request('manga_link');
        $Delivery->state = request('manga_state');
        $Delivery->count = "chapter-" . request('manga_count');

        $Delivery->save();

        return back()->with('manga_added','manga has been created Successfully');
    }
}
