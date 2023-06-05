@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Pakar</h3>
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
                            <form id="demo-form2" action="{{ route('pakar.update', $pakar->id_pakar) }}"
                                data-parsley-validate class="form-horizontal form-label-left" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_pakar" class="form-control-label">Nama Pakar</label>
                                    <input class="form-control" type="text" value="{{ $pakar->nama_pakar }}" name="nama_pakar"
                                        id="nama_pakar">
                                </div>
                                <div class="form-group">
                                    <label for="spesialis" class="form-control-label">Spesialis</label>
                                    <input class="form-control" type="text" value="{{ $pakar->spesialis }}" name="spesialis"
                                        id="spesialis">
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
