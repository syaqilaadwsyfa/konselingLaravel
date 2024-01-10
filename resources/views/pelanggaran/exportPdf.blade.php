<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }

    </style>
    <title>CETAK PELANGGARAN</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Pelanggaran</b></p>
        <table class="static" style="text-align: center; width: 95%;" border="1px" rules="all">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pelanggaran</th>
                <th>Tgl Pelanggaran</th>
            </tr>
            @foreach ($pelanggarans as $key => $pelanggaran)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>@forelse ($pelanggaran->siswa as $siswa)
                    {{ $siswa->nama }}
                @empty
                    hooh
                @endforelse</td>
                <td>{{ $pelanggaran->pelanggaran }}</td>
                <td>{{ $pelanggaran->tgl_pelanggaran }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
