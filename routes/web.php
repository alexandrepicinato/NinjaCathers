<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landpage');
});

//cadastro
Route::post ('/new/' , [\App\Http\Controllers\UrlsAdmin::class , 'NewURL'])->name('NovaURL');

//VerLogs
Route::get ('/a/{id}' , [\App\Http\Controllers\UrlsAdmin::class , 'LogInfos'])->name('RedesenhaPagina');


Route::get ('/r/{iddebug}' , [\App\Http\Controllers\Scrapper::class , 'OnlyRedirect'])->name('RedesenhaPagina');
Route::get ('/d/{iddebug}' , [\App\Http\Controllers\Scrapper::class , 'RedrawPage'])->name('RedesenhaPagina');
Route::get ('/debug/{id}/url' , [\App\Http\Controllers\Scrapper::class , 'RedrawPage'])->name('RedesenhaPagina');
Route::post ('/debug/{id}/url' , [\App\Http\Controllers\Scrapper::class , 'RedrawPage'])->name('RedesenhaPagina');
