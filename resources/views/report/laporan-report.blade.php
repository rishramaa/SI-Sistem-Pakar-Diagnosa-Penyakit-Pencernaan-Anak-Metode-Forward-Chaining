<!DOCTYPE html>
<html>

<head>
    <title>Laporan Report</title>
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
        <h5 class="mb-2">Laporan Report</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>NO</th>
                <th>ID Report</th>
                <th>ID Pakar</th>
                <th>Nama Pakar</th>
                <th>ID Pasien</th>
                <th>Nama</th>
                <th>Kode Diagnosa</th>
                <th>Kode Aturan</th>
                <th>Gejala</th>
                <th>Kode Penyakit</th>
                <th>Penyakit</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($report as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->id_report }}</td>
                    <td>{{ $p->id_pakar }}</td>
                    <td>{{ $p->nama_pakar }}</td>
                    <td>{{ $p->id_pasien }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->kode_diagnosa }}</td>
                    <td>{{ $p->kode_aturan }}</td>
                    <td>{{ $p->list_gejala }}</td>
                    <td>{{ $p->kode_penyakit }}</td>
                    <td>{{ $p->penyakit }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
