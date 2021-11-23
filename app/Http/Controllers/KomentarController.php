<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Buku;
use App\Comentar;
class KomentarController extends Controller
{
    public function index(Request $request, $id ){
        $buku = Buku::find($id);
        $komentar = new Comentar;
        $komentar -> id_buku = $buku->id;
        $komentar -> id_user = Auth::user()->id;
        $komentar -> komentar = $request->komentar;

        $komentar -> save(); 

        Return back();
        
    }
}
