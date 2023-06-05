<!DOCTYPE html>
<html>

<head>
    <title>Laporan Diagnosa</title>
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
        <h5 class="mb-2">Laporan Diagnosa</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Diagnosa</th>
                <th>Kode Penyakit</th>
                <th>Penyakit</th>
                <th>Keterangan Penyakit</th>
                <th>Keterangan Diagnosa</th>
                <th>Penanganan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($diagnosa as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->kode_diagnosa }}</td>
                    <td>{{ $p->kode_penyakit }}</td>
                    <td>{{ $p->penyakit }}</td>
                    <td>{{ $p->keterangan_penyakit }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ $p->penanganan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
