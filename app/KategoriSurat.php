<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    //membuat tabel kategorisurat
    public $table = "kategorisurat";
    //memiliki atribut kategori
    protected $fillable = ['kategori'];
    //primary key id 
    protected $primaryKey = 'id_kategori';

    public function arsipsurat()
    {
        //relasi dengan tabel arsipsurat berupa 1 to Many
        return $this->hasMany('App\ArsipSurat');
    }
}
