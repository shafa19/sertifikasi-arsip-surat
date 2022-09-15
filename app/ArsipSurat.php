<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    //membuat tabel bernama arsipsurat
    public $table = "arsipsurat";
    //atribut yang harus diisi
    protected $fillable = ['no_surat', 'judul', 'id_kategori', 'file_surat', 'created_at'];
    //penentuan primary key tabel arsipsurat
    protected $primaryKey = 'id_arsipsurat';

    public function kategorisurat()
    {
        //relasi antar tabel dimana tabel arsipsurat berelasi Many to 1 dengan tabel kategorisurat atribut id kategori
        return $this->belongsTo('App\KategoriSurat', 'id_kategori');
    }
}
