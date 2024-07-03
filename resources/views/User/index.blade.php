@extends('kalender_beasiswa.partials.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6"
<h1>User</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">User</li>
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
    <h3 class="card-title">User</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <th>No</th>
            <th>ID User</th>
            <th>ID Level User</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nomer Telepon</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>Kambing Hitam</td>
                <td>Kambing@gmail.com</td>
                <td>Kambing123</td>
                <td>12345678</td>
                <td>Jalan Kambing 123</td>
                <td>32 Febuari 1945</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
@endsection