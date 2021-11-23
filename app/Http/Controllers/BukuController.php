<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ini untuk memanggil model buku yang telah dibuat
use App\Buku;
use App\Galeri;
use App\Comentar;

class BukuController extends Controller
{
    // bikin fungsi nya

    public function index(){
        $batas = 5;
        // $data_buku = Buku::all()->sortByDesc('id'); // untuk menampilkan semua data pada tabel buku dan mengurutkan berdasarkan id nya
        $data_buku = Buku::orderBy('id','desc')->paginate($batas); // untuk menampilkan semua data pada tabel buku dan mengurutkan berdasarkan id nya secara ascending, jika desc maka descending
        $no = $batas * ($data_buku->currentPage() - 1);
        $jumlah = Buku::count();
        $total_harga = Buku::sum('harga');

        return view('buku.index', compact('data_buku','no','jumlah','total_harga')); // compact adalah untukk mengirimkan variable ke view lewat
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul'     => 'required|string',
            'penulis'   => 'required|string|max:30',
            'harga'     => 'required|numeric',
            'tgl_terbit'=> 'required|date'
        ]);
        $buku = new Buku;
        $buku -> judul = $request->judul;
        $buku -> penulis = $request->penulis;
        $buku -> harga = $request->harga;
        $buku -> tgl_terbit = $request->tgl_terbit;
        $buku -> save();
        return redirect('/buku')->with('simpan','Data Buku Berhasil di Simpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('delete','Data Buku Berhasil di Hapus');
    }
    public function edit($id){
        // $data_buku = Buku::all();
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));

    }
    public function update($id,Request $request){
        $this->validate($request,[
            'judul'     => 'required|string',
            'penulis'   => 'required|string|max:30',
            'harga'     => 'required|numeric',
            'tgl_terbit'=> 'required|date'
        ]);
        $buku = Buku::find($id);
        $buku -> judul = $request->judul;
        $buku -> penulis = $request->penulis;
        $buku -> harga = $request->harga;
        $buku -> tgl_terbit = $request->tgl_terbit;
        $buku -> update();
        return redirect('/buku')->with('update','Data Buku Berhasil di Perbarui');

    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas); 
        $no = $batas * ($data_buku->currentPage() - 1);
        $jumlah = Buku::count();

        return view('buku.search', compact('data_buku','no','jumlah','cari')); 
    }

    public function list(){

        $galeris = Galeri::all();
        $buku = Buku::paginate(10);

        return view('buku.list',compact('buku','galeris'));
    }

    public function galbuku($title)
    {
        $bukus = Buku::where('buku_seo', $title)->first();
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        $komentar = Comentar::where('id_buku',$bukus->id)->get();
        return view('buku.detail', compact('bukus', 'galeris','komentar'));
    }

    public function likefoto(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('suka');
        Return back();
    }


    


    public function __construct()
    {
        $this->middleware('auth');
    }


}
