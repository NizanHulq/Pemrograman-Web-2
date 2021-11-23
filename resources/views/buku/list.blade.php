@extends('layout.layout2')

@section('content')   
    <div class="title">
        List Buku
    </div>
    <div class="row mt-3">
        @foreach($galeris as $data)
        <div class="col-md-4">
            <div class="card">
                <a href="/detail-buku/{{ $data->buku->buku_seo }}">
                    <img src="{{ asset('images/'.$data->foto) }}" class="card-img-top" alt="{{ $data->buku->judul }}" style="width:200px; height:150px;">
                </a>
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ $data->buku->judul }}</h5>
                    <p class="mb-1">Penulis : {{ $data->buku->penulis }}</p>
                    <p class="mb-3">Harga : Rp {{ number_format($data->buku->harga, 0, ',', '.') }}</p>
                    <a href="{{route('buku.detail' , $data->buku->buku_seo)}}" class="btn btn-primary"><i class="bi bi-eye"></i>
                    </a>

                    <form action="{{ route('buku.destroy', $data->buku->id) }}" method="post">
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapuss??')" style="padding : 0px 10px;"><i class="bi bi-trash">
                        </i>Hapus</button>
                    </form>
                    <a class="btn btn-primary" href="{{ route('buku.edit',$data->buku->id) }}" role="button" style="padding : 0px 20px;"><i class="bi bi-pencil-square">
                    </i>Edit</a>

                    <a href="{{ route('like.foto', $data->buku->id)}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-thumbs-up"></i> like
                        <span class="badge badge-primary">{{$data->buku->suka}}</span>
                    </a>
                </div>
            </div>
        </div>    
        @endforeach 
    </div>
    
    <p align="right"> <a class="btn btn-primary" role="button" href="{{route('buku.create')}}">Tambah Buku</a></p>
@endsection


