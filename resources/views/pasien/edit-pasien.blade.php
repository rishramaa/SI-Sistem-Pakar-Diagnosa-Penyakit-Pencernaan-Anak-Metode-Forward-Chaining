@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Pasien</h3>
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
                            <form id="demo-form2" action="{{ route('pasien.update', $pasien->id_pasien) }}"
                                data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <textarea class="form-control" type="text" name="nama" id="nama">{{ $pasien->nama }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                    <textarea class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin">{{ $pasien->jenis_kelamin }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <textarea class="form-control" type="text" name="alamat" id="alamat">{{ $pasien->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="form-control-label">NO HP</label>
                                    <textarea class="form-control" type="text" name="no_hp" id="no_hp">{{ $pasien->no_hp }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <textarea class="form-control" type="text" name="username" id="username">{{ $pasien->username }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <textarea class="form-control" type="text" name="password" id="password">{{ $pasien->password }}</textarea>
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
