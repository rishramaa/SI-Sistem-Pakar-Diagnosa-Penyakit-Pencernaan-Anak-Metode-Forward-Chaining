@extends('template')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Report</h3>
                </div>

                <div class="title_right">
                    <div class="form-group pull-right top_search">
                        <a href="{{ route('report.create') }}">
                            <button class="btn btn-primary"> <i class="fa fa-plus"></i></button>
                        </a>
                        <a target="_blank" href="{{ url('print-report') }}">
                            <button class="btn btn-success" type="button">Cetak PDF</button>
                        </a>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">ID Report </th>
                                        <th class="column-title">ID Pakar </th>
                                        <th class="column-title">Nama Pakar </th>
                                        <th class="column-title">ID Pasien </th>
                                        <th class="column-title">Nama </th>
                                        <th class="column-title">Kode Diagnosa </th>
                                        <th class="column-title">Kode Aturan </th>
                                        <th class="column-title">Gejala </th>
                                        <th class="column-title">Kode Penyakit </th>
                                        <th class="column-title">Penyakit </th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                    class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($report as $pgw)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_report }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_pakar }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_pakar }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_pasien }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->kode_diagnosa }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->kode_aturan }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->list_gejala }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->kode_penyakit }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pgw->penyakit }}</p>
                                            </td>
                                            <td>
                                                <form action="{{ route('report.destroy', $pgw->id_report) }}" method="POST">
                                                    <a href="{{ route('report.edit', $pgw->id_report) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <button class="btn btn-info" type="button">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $report->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
