<?php

//halaman utama arsip surat
Route::get('/', 'ArsipSuratController@viewall')->name('arsipsurat');

//halaman about
Route::get('about', 'aboutController@index')->name('about');

//halaman tambah arsip surat
Route::get('arsipsurat/create', 'ArsipSuratController@create')->name('create');
Route::post('arsipsurat/store', 'ArsipSuratController@store')->name('store');

//halaman lihat surat
Route::get('arsipsurat/show/{id_arsipsurat}', 'ArsipSuratController@show')->name('show');

//halaman edit data surat
Route::get('arsipsurat/edit/{id_arsipsurat}', 'ArsipSuratController@edit')->name('edit');

//halaman update file surat
Route::post('arsipsurat/update/{id_arsipsurat}', 'ArsipSuratController@update')->name('update');

//hapus surat
Route::get('arsipsurat/delete/{id_arsipsurat}', 'ArsipSuratController@delete')->name('delete');
