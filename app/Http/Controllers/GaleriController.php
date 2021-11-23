<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Buku;
use File;
use Image;
use Illuminate\Support\Str;

class GaleriController extends Controller
{   
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $batas = 4;
        $galeri = Galeri::orderBy('id','asc')->paginate($batas); 
        $no = $batas * ($galeri->currentPage() - 1);

        return view('galeri.index', compact('galeri', 'no')); 
    }

    public function create(){
        $buku = Buku::all();
        $galeri = Galeri::all();
        return view('galeri.create' , compact('buku','galeri'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_galeri'     => 'required|string',
            'keterangan'   => 'required|string',
            'foto'     => 'required|image|mimes:jpeg,jpg,png'
        ]);
        $galeri = new Galeri;
        $galeri -> nama_galeri = $request->nama_galeri;
        $galeri -> keterangan = $request->keterangan;
        $galeri -> id_buku = $request->id_buku;
        $galeri -> galeri_seo = Str::slug($request->nama_galeri);


        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('simpan','Data Galeri Buku Berhasil di Simpan');
    }

    public function destroy($id){
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('delete','Data Buku Berhasil di Hapus');
    }
    public function edit($id){
        $buku = Buku::all();
        $galeri = Galeri::find($id);
        return view('galeri.edit', compact('galeri','buku'));

    }
    public function update($id,Request $request){
        $this->validate($request,[
            'nama_galeri'     => 'required|string',
            'keterangan'   => 'required|string',
            'foto'     => 'required|image|mimes:jpeg,jpg,png'
        ]);
        $galeri = Galeri::find($id);
        $galeri -> nama_galeri = $request->nama_galeri;
        $galeri -> keterangan = $request->keterangan;
        $galeri -> id_buku = $request->id_buku;
        $galeri -> galeri_seo = Str::slug($request->nama_galeri);


        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/',$namafile);

        $galeri->foto = $namafile;
        $galeri->update();
        return redirect('/galeri')->with('update','Data Buku Berhasil di Perbarui');

    }
    



}
