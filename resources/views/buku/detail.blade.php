@extends('layout.layout2')


@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
    <h2>Buku : {{ $bukus->judul }}</h2>
        <hr>
        <div class="row">
            @if(count($galeris) != 0)
            @foreach ($galeris as $galeri)
            <div class="col-md-4">
                <a href="{{ asset('thumb/'.$galeri->foto) }}" data-lightbox="image-1" data-title="{{ $galeri->keterangan }}">
                    <img src="{{ asset('thumb/'.$galeri->foto) }}" style="width:200px; height:150px;">
                </a>
                <p>
                    <h5>{{ $galeri->nama_galeri }}</h5>
                </p>  
            </div>
            @endforeach
                <form method="post" action="{{route('buku.komentar', $bukus->id)}}">
                    @csrf
                    <label for="">Komentar</label>
                    <textarea name="komentar" cols="30" rows="10"></textarea>
                    <button type="submit" class="btn btn-primary">Coment</button>
                </form>
                <br>
                @foreach($komentar as $komen)
                    <div class="card-body">
                        {{$komen->komentar}}
                    </div>
                @endforeach
            @else
            <p class="text-center lead w-100 text-info">Galeri Kosong</p>
            @endif
            <div>{{ $galeris->links() }}</div>
        </div>
    </div>
</section>
@endsection