@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Aturan</h3>
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
                            <form id="demo-form2" action="{{ route('aturan.update', $aturan->kode_aturan) }}"
                                data-parsley-validate class="form-horizontal form-label-left" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="list_gejala" class="form-control-label">Gejala</label>
                                    <input class="form-control" type="text" value="{{ $aturan->list_gejala }}" name="list_gejala"
                                        id="list_gejala">
                                </div>
                                <div class="form-group">
                                    <label for="kode_penyakit" class="form-control-label">Penyakit</label>
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
                                    <input class="form-control" type="text" value="{{ $aturan->penyakit }}" name="penyakit"
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
