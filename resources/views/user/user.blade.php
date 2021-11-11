@extends('layout.layout')

@section('content')   
                <div class="title">
                    List User
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_user as $user)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{$user->level}}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapuss??')" style="padding : 0px 10px;">Hapus</button>
                                        </form>

                                        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}" role="button" style="padding : 0px 20px;">Edit</a>

                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>   
                </div>
                <p align="right"> <a class="btn btn-primary" role="button" href="{{route('user.create')}}">Tambah User</a></p>
                


                <div> <strong>Jumlah User: {{ $jumlah }}</strong> </div>


@endsection


