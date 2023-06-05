@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tambah Data Aturan</h3>
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
                            <form id="demo-form2" action="{{ route('aturan.store') }}" data-parsley-validate
                                class="form-horizontal form-label-left" method="POST">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kode Aturan
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="kode_aturan" id="first-name" required="required"
                                            class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Gejala</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="list_gejala" name="list_gejala" class="form-control" type="text"
                                            name="middle-name">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kode
                                        Penyakit</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="kode_penyakit" id="kode_penyakit" required>
                                            <option value="" selected>Pilih</option>
                                            @foreach ($Penyakit as $k)
                                                <option value="{{ $k->kode_penyakit }}">
                                                    {{ $k->kode_penyakit }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Penyakit</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="penyakit" name="penyakit" class="form-control" type="text"
                                            name="middle-name">
                                    </div>
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
