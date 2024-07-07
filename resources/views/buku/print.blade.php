<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="{{ public_path('print.css') }}">
</head>

<body class="">
    <div class="header">
        <div>
            <img src="{{ public_path('untag.png') }}" class="img" alt="Logo Untag" srcset="">
            <div class="title">
                <h1>
                    Universitas 17 Agustus 1945
                    <br>
                    Fakultas Teknik | Teknik Informatika
                </h1>
            </div>
        </div>
    </div>
    <h2>
        Laporan Buku
    </h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col" class="">Tahun Terbit</th>
                <th scope="col" class="">Deskripsi</th>
                <th scope="col" class="">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
                <tr>
                    <th class="" scope="row">{{ $buku->isbn }}</th>
                    <td class="">{{ $buku->nama_buku }}</td>
                    <td class="">{{ $buku->pengarang }}</td>
                    <td class="">{{ $buku->penerbit }}</td>
                    <td class="">{{ $buku->tahun_terbit }}</td>
                    <td class="">{{ $buku->deskripsi }}</td>
                    <td class="">{{ $buku->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
