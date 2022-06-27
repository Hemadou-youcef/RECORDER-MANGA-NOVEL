<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MangaController;
use \App\Http\Controllers\NovelController;
use \App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',[MainController::class,'getAllRecords'])->name('home.defaultAction');
#redirect to default action of controller

Route::get('/manga',[MangaController::class,'getAllMangaRecord'])->name('manga.defaultAction');
Route::get('/novels',[NovelController::class,'getAllNovelsRecord'])->name('novel.defaultAction');

Route::get('/add-manga',[MangaController::class,'addMangaForm'])->name('manga.formAddManga');
Route::post('/add-manga',[MangaController::class,'AddMangaAction'])->name('manga.AddManga');
Route::get('/delete-manga/{id}',[MangaController::class,'removeMangaById'])->name('manga.deleteManga');
Route::get('/edit-manga/{id}',[MangaController::class,'getMangaById'])->name('manga.showManga');
Route::post('/edit-manga/{id}',[MangaController::class,'editMangaById'])->name('manga.editManga');

Route::get('/add-novel',[NovelController::class,'addNovelForm'])->name('novel.formAddNovel');
Route::post('/add-novel',[NovelController::class,'AddNovelAction'])->name('novel.AddNovel');
Route::get('/delete-novel/{id}',[NovelController::class,'removeNovelById'])->name('novel.deleteNovel');
Route::get('/edit-novel/{id}',[NovelController::class,'getNovelById'])->name('novel.showNovel');
Route::post('/edit-novel/{id}',[NovelController::class,'editNovelById'])->name('novel.editNovel');

Route::get('/',function(){
    return redirect()->route('novel.defaultAction');
});

