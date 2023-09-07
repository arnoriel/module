<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Membuat CRUD menggunakan Laravel PHp dan MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
  <body>
    <div class="container">
        <br>
        <br>
        <center>
        <h5>Membuat CRUD dengan PHp dan MySQLI</h5>
        </center>
        <div class="card" style="margin: 5%;">
            <div class="card-header bg-success text-white">
                CRUD Menggunakan Laravel PHp dan MySQL
                <a href="{{route('post.create')}}" class="btn btn-sm btn-warning float-right">Tambah Post</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nomor</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    @php $no=1 @endphp
                    @foreach ($post as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td><img src="{{$item->gambar()}}" alt="" width="100px" height="60px"></td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>
                            <form action="{{route('post.destroy',$item->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <a href="{{route('post.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('post.show',$item->id)}}" class="btn btn-warning">Show</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>