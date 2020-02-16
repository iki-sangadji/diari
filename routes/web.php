<?php

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

Route::get('/', 'GejalaController@pertanyaanPertama');
Route::get('/tambah-Gejala', 'PagesController@tambahGejala')->middleware('auth')->name("formTambahGejala");
Route::get('/pertanyaan', 'GejalaController@pertanyaanPertama')->name("pertanyaanPertama");
Route::post('/hasil-diagnosa', 'GejalaController@buatKesimpulan')->name("buatKesimpulan");
Route::post('/storeGejala', 'GejalaController@store')->name("storeGejala");
Route::get('/daftar-gejala', 'GejalaController@index')->name("tampilDaftarGejala");
Route::get('/edit-gejala/{id}', 'GejalaController@edit')->name("editGejala");
Route::post('/update-gejala/{id}', 'GejalaController@update')->name("updateGejala");
Route::get('/hapus-gejala{id}', 'GejalaController@destroy')->name("hapusGejala");

Route::get('/daftar-penyakit', 'PenyakitController@index')->name("daftarPenyakit");
Route::get('/penyakit/{nama}', 'PenyakitController@show')->name("tampilPenyakit");
Route::get('/tambah-penyakit', 'PagesController@tambahPenyakit')->middleware('auth')->name("formTambahPenyakit");
Route::post('/store-penyakit', 'PenyakitController@store')->name("storePenyakit");
Route::get('/edit-penyakit/{id}', 'PenyakitController@edit')->name("editPenyakit");
Route::post('/update-penyakit{id}', 'PenyakitController@update')->name("updatePenyakit");
Route::get('/hapus-penyakit{id}', 'PenyakitController@destroy')->name("hapusPenyakit");


Auth::routes();

Route::get('/home', 'GejalaController@pertanyaanPertama')->name('home');


