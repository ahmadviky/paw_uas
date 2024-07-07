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
        Laporan Anggota
    </h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Tempat.Lahir</th>
                <th scope="col">Tgl. Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col" class="">Jenis Kelamin</th>
                <th scope="col" class="">No. Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $anggota)
                <tr>
                    <th class="" scope="row">{{ $anggota->nama }}</th>
                    <td class="">{{ $anggota->tempat_lahir }}</td>
                    <td class="">{{ $anggota->tanggal_lahir }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td class="">{{ $anggota->jenis_kelamin }}</td>
                    <td class="">{{ $anggota->no_telp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
