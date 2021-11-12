@extends('layout.layout')

@section('content')   
                <div class="title">
                    List Galeri Buku
                </div>
                <div>
                    <div>
                        <!-- <form action="{{ route('buku.search') }}" method="get">
                            @csrf
                            <input type="text" name="kata" class="form-control" placeholder="Cari buku ..." style="width: 30%; background-color: var(--white); display: inline; margin-top: 10px; margin-bottom: 10px; float: right;" >
                            <button class="btn btn-primary" type="submit" style="display: inline; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; float: right;">Cari</button>
                        </form> -->
                    </div class="table m-b-md">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Galeri</th>
                                <th>Judul Buku</th>
                                <th>Isi Galeri</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galeri as $data)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{ $data->nama_galeri }}</td>
                                    <td>{{ $data->buku->judul }}</td>
                                    <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px;"></td>
                                    <td>
                                        <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapuss??')" style="padding : 0px 10px;"><i class="fa fa-times"></i> Hapus</button>
                                        </form>

                                        <a class="btn btn-primary" href="{{ route('galeri.edit',$data->id) }}" role="button" style="padding : 0px 20px;"> <i class="fa fa-pencil-alt"></i>Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>   
                </div>
                
                <p align="right"> <a class="btn btn-primary" role="button" href="{{route('galeri.create')}}">Masukkan Galeri</a></p>
                

                <div>{{ $galeri->links() }}</div>

@endsection


