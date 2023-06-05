<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Pasien</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>NO</th>
                <th>ID Pasien</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>NO HP</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pasien as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->id_pasien }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jenis_kelamin }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->password }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
