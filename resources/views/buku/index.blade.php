@extends('layout.layout')

@section('content')   
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
                
                <p align="right"> <a class="btn btn-primary" role="button" href="{{route('buku.create')}}">Tambah Buku</a></p>
                

                <div>{{ $data_buku->links() }}</div>
                <div> <strong>Jumlah Buku: {{ $jumlah }}</strong> </div>

                <br>  
                Total Harga : {{"Rp ".number_format($total_harga, 2, ',' , '.')}}
@endsection


