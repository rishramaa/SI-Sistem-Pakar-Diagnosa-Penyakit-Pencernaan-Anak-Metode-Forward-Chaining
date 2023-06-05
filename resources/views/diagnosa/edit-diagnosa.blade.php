@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Diagnosa</h3>
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
                            <form id="demo-form2" action="{{ route('diagnosa.store') }}" data-parsley-validate
                                class="form-horizontal form-label-left" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="item form-group">
                                            <label for="middle-name"
                                                class="col-form-label col-md-0 col-sm-0 label-align" style="padding-right: 5px">Keterangan</label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input id="middle-name" name="keterangan" value="{{ $diagnosa->keterangan }}" class="form-control"
                                                    type="text" name="middle-name">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="middle-name"
                                                class="col-form-label col-md-0 col-sm-0 label-align">Penanganan</label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input id="middle-name" name="penanganan" value="{{ $diagnosa->penanganan }}" class="form-control"
                                                    type="text" name="middle-name">
                                            </div>
                                        </div>
                                        @foreach ($gejala as $d)
                                            <div class="checkbox">
                                                <label class="">
                                                    <div class="icheckbox_flat-green checked" style="position: relative;">
                                                        <input type="checkbox" name="kode_gejala[]" class="flat"
                                                            value="{{ $d->kode_gejala }}"
                                                            style="position: absolute; opacity: 0;"><ins
                                                            class="iCheck-helper"
                                                            style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div> {{ $d->gejala }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  offset-md-4">
                                    <button type="submit" class="btn btn-success">Submit</button>
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
