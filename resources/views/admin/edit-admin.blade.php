@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Data Admin</h3>
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
                            <form id="demo-form2" action="{{ route('admin.update', $admin->id_admin) }}"
                                data-parsley-validate class="form-horizontal form-label-left" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <input class="form-control" type="text" value="{{ $admin->nama }}" name="nama"
                                        id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" value="{{ $admin->username }}" name="username"
                                        id="username">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <textarea class="form-control" type="text" name="password" id="password">{{ $admin->password }}</textarea>
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
