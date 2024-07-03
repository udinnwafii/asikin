@extends('kalender_beasiswa.partials.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Kategori</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Kategori</li>
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
    <h3 class="card-title">Kategori</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <a type="Button" href="{{ route('kategori.create') }}" class="btn btn-info mb-2">Tambah Kategori</a>
        <thead>
            <th>No</th>
            <th>ID Tingkat Studi</th>
            <th>ID Negara</th>
            <th>Benua</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>S2</td>
                <td>Indonesia</td>
                <td>Asia</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
@endsection