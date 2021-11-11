@extends('layout.layout')

@section('content')
            @if(count($data_buku))
                <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata " <strong>{{ $cari }}</strong> " </div>
                <div class="title">
                    List Buku Terhots
                </div>
                <div>
                    <div>
                        <form action="{{ route('buku.search') }}" method="get">
                            @csrf
                            <input type="text" name="kata" class="form-control" placeholder="Cari buku ..." style="width: 30%; background-color: var(--white); display: inline; margin-top: 10px; margin-bottom: 10px; float: right;" >
                            <button class="btn btn-primary" type="submit" style="display: inline; margin-top: 10px; margin-bottom: 10px; margin-right: 10px; float: right;">Cari</button>
                        </form>
                    </div class="table m-b-md">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Harga</th>
                                <th>Tanggal Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_buku as $buku)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{ $buku->id }}</td>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->penulis }}</td>
                                    <td>{{ number_format($buku->harga, 0, ',' , '.') }}</td>
                                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapuss??')" style="padding : 0px 10px;">Hapus</button>
                                        </form>

                                        <!-- <form action="{{ route('buku.edit',$buku->id) }}" method="get">
                                            @csrf
                                            <button onclick >Edit</button>
                                        </form> -->
                                        <a class="btn btn-primary" href="{{ route('buku.edit',$buku->id) }}" role="button" style="padding : 0px 20px;">Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>   
                </div>
                
                <div>
                    
                    <a class="btn btn-danger" role="button" href="/buku" style="float:left">Kembali </a> 
                    
                    <a class="btn btn-success" role="button" href="{{route('buku.create')}}" style="float:right" >Tambah Buku </a>
                </div>
                
                

                <div>{{ $data_buku->links() }}</div>

                <br>
                <br>
                @include('layout.menu')

                @else
                <div class="alert alert-warning"><h4>Data " {{ $cari }} " tidak ditemukan</h4>
                <a href="/buku" class="btn btn-danger">kembali</a></div>
                @endif
@endsection










<!--  -->