<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\ArsipSurat;
use App\KategoriSurat;

class ArsipSuratController extends Controller
{
    //menampilkan data surat, dengan memanggil semua data yang ada pada tabel arsipsurat
    //dikembalikan ke view index pada folder arsipsurat
    public function viewall()
    {
        $arsipsurat = ArsipSurat::all();
        return view('arsipsurat.index', ['arsipsurat' => $arsipsurat]);
    }

    //create data surat, menambahkan data surat pada tabel arsipsurat
    //dikembalikan ke view create pada folder arsip surat
    public function create()
    {
        $kategorisurat = KategoriSurat::all();
        return view('arsipsurat.create', ['kategorisurat' => $kategorisurat]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'no_surat' => ['required', 'unique:users'],
        ]);
    }

    //upload file surat dalam bentuk pdf
    //terdapat pengaturan penamaan dan pemindahan lokasi penyimpanan file surat pada tabel arsipsurat
    public function store(Request $request)
    {
        $file_surat     = new ArsipSurat();
        $this->validate($request, [
            'file_surat' => 'required|file|mimes:pdf',
        ]);
        if($request->hasfile('file_surat'))
         {
            $file       = $request->file('file_surat');
            $name       = $file->getClientOriginalName();
            $folder     = '/public/files/';
            $path       = $folder.$name;
            $file->move('public/files',$name);
            $file_surat->file_surat = $path;
         }
        $file_surat->no_surat       = $request->no_surat;
        $file_surat->id_kategori    = $request->kategorisurat;
        $file_surat->judul          = $request->judul;
        $file_surat->file_surat     = $name;
        $file_surat->save();
        return redirect()->route('arsipsurat')->with('success','Data berhasil disimpan');
    }

    //read data surat, menampilkan seluruh data surat sesuai id yang dipilih, termasuk menampilkan file pdfnya
    public function show($id_arsipsurat)
    {
        $arsipsurat     = ArsipSurat::find($id_arsipsurat);
        $kategorisurat  = KategoriSurat::all();
        return view('arsipsurat.show', ['arsipsurat' => $arsipsurat, 'kategorisurat' => $kategorisurat]);
    }

    //edit data surat, untuk mengubah data surat sesuai id yang dipilih
    public function edit($id_arsipsurat)
    {
        $arsipsurat     = ArsipSurat::find($id_arsipsurat);
        $kategorisurat  = KategoriSurat::all();
        return view('arsipsurat.edit', ['arsipsurat' => $arsipsurat, 'kategorisurat' => $kategorisurat]);
    }

    //update file surat, mengubah file PDF surat yang sudah terupload sesuai id yang dipilih
    //terdapat pengaturan penamaan dan pemindahan lokasi penyimpanan file surat pada tabel arsipsurat
    public function update(Request $request, $id_arsipsurat)
    {
        $arsipsurat = ArsipSurat::find($id_arsipsurat);
        $this->validate($request, [
            'file_surat' => 'required|file|mimes:pdf',
        ]);
        if($arsipsurat->file_surat && file_exists(storage_path('/public/files/' . $arsipsurat->file_surat)))
        {
            \Storage::delete('/public/files/'.$arsipsurat->file_surat);
        }
        if($request->hasfile('file_surat'))
         {
            $file   = $request->file('file_surat');
            $name   = $file->getClientOriginalName();
            $folder = '/public/files/';
            $path   = $folder.$name;
            $file->move('public/files',$name);
            $arsipsurat->file_surat = $path;
         }
        $arsipsurat->file_surat = $name;
        $arsipsurat->save();
        return redirect()->route('show', ['id_arsipsurat' => $request->id_arsipsurat])->with('success','File berhasil diperbaharui');
    }

    //hapus data surat dari tabel arsipsurat
    public function delete($id_arsipsurat)
    {
        $arsipsurat = ArsipSurat::find($id_arsipsurat)->delete();
        return redirect('arsipsurat')->with('success','Data berhasil dihapus');
    }
}
