<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4>Tambah Galeri</h4>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post"' action="{{route('galeri.update', $galeri->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_galeri" class="form-label">Judul</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_galeri" value="{{$galeri->nama_galeri}}" >
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">Buku</label>
                <select name="id_buku" class="form-control">
                    <!-- <option selected >Pilih Buku</option> -->
                    @foreach ($buku as $data)
                        <option value="{{$data->id}}" selected>{{$data->judul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="" class="form-control" cols="30" rows="10" value="">{{$galeri->keterangan}}</textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label><br>
                <img id="frame" src="{{ asset('thumb/'.$galeri->foto) }}" style="width: 100px; height: 100px;"><br><br>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a class="btn btn-primary" role="button" href="/galeri">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
