@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Report</h3>
                </div>

                {{-- <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" action="{{ route('report.update', $report->id_report) }}" data-parsley-validate
                                class="form-horizontal form-label-left" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="id_report" class="form-control-label">ID Report</label>
                                    <input class="form-control" type="text" value="{{ $report->id_report }}" name="id_report"
                                        id="id_report">
                                </div>
                                <div class="form-group">
                                    <label for="id_pakar" class="form-control-label">ID Pakar</label>
                                    <select class="form-control" name="id_pakar" id="id_pakar" required>
                                        @foreach ($Pakar as $p)
                                            <option {{ $p->id_pakar == $PakarSaatIni->id_pakar ? 'selected' : '' }}
                                                value="{{ $p->id_pakar }}">
                                                {{ $p->id_pakar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pakar" class="form-control-label">Nama Pakar</label>
                                    <input class="form-control" type="text" value="{{ $report->nama_pakar }}" name="nama_pakar"
                                        id="nama_pakar">
                                </div>
                                <div class="form-group">
                                    <label for="id_pasien" class="form-control-label">ID Pasien</label>
                                    <select class="form-control" name="id_pasien" id="id_pasien" required>
                                        @foreach ($Pasien as $p)
                                            <option {{ $p->id_pasien == $PasienSaatIni->id_pasien ? 'selected' : '' }}
                                                value="{{ $p->id_pasien }}">
                                                {{ $p->id_pasien }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <input class="form-control" type="text" value="{{ $report->nama }}" name="nama"
                                        id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="kode_diagnosa" class="form-control-label">Kode Diagnosa</label>
                                    <select class="form-control" name="kode_diagnosa" id="kode_diagnosa" required>
                                        @foreach ($Diagnosa as $p)
                                            <option {{ $p->kode_diagnosa == $DiagnosaSaatIni->kode_diagnosa ? 'selected' : '' }}
                                                value="{{ $p->kode_diagnosa }}">
                                                {{ $p->Diagnosa }}
                                                {{ $p->kode_diagnosa }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_aturan" class="form-control-label">Kode Aturan</label>
                                    <select class="form-control" name="kode_aturan" id="kode_aturan" required>
                                        @foreach ($Aturan as $p)
                                            <option {{ $p->kode_aturan == $AturanSaatIni->kode_aturan ? 'selected' : '' }}
                                                value="{{ $p->kode_aturan }}">
                                                {{ $p->kode_aturan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="list_gejala" class="form-control-label">Gejala</label>
                                    <input class="form-control" type="text" value="{{ $report->list_gejala }}" name="list_gejala"
                                        id="list_gejala">
                                </div>
                                <div class="form-group">
                                    <label for="kode_penyakit" class="form-control-label">Kode Penyakit</label>
                                    <select class="form-control" name="kode_penyakit" id="kode_penyakit" required>
                                        @foreach ($Penyakit as $p)
                                            <option {{ $p->kode_penyakit == $PenyakitSaatIni->kode_penyakit ? 'selected' : '' }}
                                                value="{{ $p->kode_penyakit }}">
                                                {{ $p->kode_penyakit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penyakit" class="form-control-label">Penyakit</label>
                                    <input class="form-control" type="text" value="{{ $report->penyakit }}" name="penyakit"
                                        id="penyakit">
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-8">
                                        {{-- <button class="btn btn-primary" type="button">Cancel</button> --}}
                                        {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $('#id_pakar').change(function() {
            var id = $(this).val();
            var url = '{{ route('getDetailsPakar', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#nama_pakar').val(response.nama_pakar);
                    }
                }
            });
        });
        $('#id_pasien').change(function() {
            var id = $(this).val();
            var url = '{{ route('getDetailsPasien', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#nama').val(response.nama);
                    }
                }
            });
        });
        $('#kode_diagnosa').change(function() {
            var id = $(this).val();
            var url = '{{ route('getDetailsDiagnosa', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#diganosa').val(response.diganosa);
                    }
                }
            });
        });
        $('#kode_gejala').change(function() {
            var id = $(this).val();
            var url = '{{ route('getDetailsGejala', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#gejala').val(response.gejala);
                    }
                }
            });
        });
        $('#kode_penyakit').change(function() {
            var id = $(this).val();
            var url = '{{ route('getDetailsPenyakit', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#penyakit').val(response.penyakit);
                    }
                }
            });
        });
    </script>
@endpush
