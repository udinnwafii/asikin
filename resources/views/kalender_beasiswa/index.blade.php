@extends('kalender_beasiswa.partials.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>DataTables</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kalender Beasiswa</li>
        </ol>
    </div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kalender Beasiswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <th>No</th>
                        <th>ID Kategori</th>
                        <th>ID User</th>
                        <th>Tangal Registrasi</th>
                        <th>Deadline</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Jenis Beasiswa</th>
                        <th>Keuntungan</th>
                        <th>Umur</th>
                        <th>GPD</th>
                        <th>Tes English</th>
                        <th>Tes Bahasa Lain</th>
                        <th>Tes Standard</th>
                        <th>Dokumen</th>
                        <th>Lainnya</th>
                        <th>Status Tampil</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>2</td>
                            <td>32 Febuari</td>
                            <td>32 Maret</td>
                            <td>Beasiswa Kambing</td>
                            <td>Kambing beasiswa</td>
                            <td>Full Beasiswa</td>
                            <td>Sate Kambing</td>
                            <td>19</td>
                            <td>9.0</td>
                            <td>TOELF 999 Poin</td>
                            <td>Bahasa German</td>
                            <td>Tes MTK</td>
                            <td>Sertifikat Kambing</td>
                            <td>-</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
