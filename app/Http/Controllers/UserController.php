<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $batas = 5;
       
        $data_user = User::all(); 
        $no = 0;
        $jumlah = User::count();

        return view('user.user', compact('data_user','no','jumlah')); // compact adalah untukk mengirimkan variable ke view lewat
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        // DB :: table('users')->insert([
        //     'name' => $request->nama,
        //     'name' => $request->nama,
        //     'name' => $request->nama,
        // ])
        $user = new User;
        $user -> name = $request->nama;
        $user -> email = $request->get('email');
        $user -> password = Hash::make($request->password);
        $user -> level = $request->level;
        $user -> save();
        return redirect('/user')->with('simpan','Data Buku Berhasil di Simpan');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('delete','Data Buku Berhasil di Hapus');
    }
    public function edit($id){
        // $data_buku = Buku::all();
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function update($id,Request $request){
        // $this->validate($request,[
        //     'judul'     => 'required|string',
        //     'penulis'   => 'required|string|max:30',
        //     'harga'     => 'required|numeric',
        //     'tgl_terbit'=> 'required|date'
        // ]);
        $user = User::find($id);
        $user -> name = $request->nama;
        $user -> email = $request->get('email');
        $user -> password = Hash::make($request->password);
        $user -> level = $request->level;
        $user -> update();
        return redirect('/user')->with('update','Data Buku Berhasil di Perbarui');

    }

    public function search(Request $request){
        $cari = $request->kata;
        $data_user = User::where('name','like',"%".$cari."%"); 
        $no = 0;
        $jumlah = User::count();

        return view('user.search', compact('data_user','no','jumlah','cari')); 
    }

    
}
