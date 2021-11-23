<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentar extends Model
{
    protected $table = 'comentar';

    public function buku(){
        return $this->belongsTo('App\Buku', 'id_buku', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
