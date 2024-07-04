@extends('kalender_beasiswa.partials.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Data Kategori</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Data Kategori</li>
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
<h3 class="card-title">Data Kategori</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Tambah Kategori
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_tingkat_studi">Tingkat Studi</label>
                <select class="form-control" name="id_tingkat_studi">
                    <option value="">Pilih Tingkat Studi</option>
                    @foreach ($tingkat_studi as $i)
                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                    @endforeach
                </select>
                <label for="id_negara">Negara</label>
                <select class="form-control" name="id_negara">
                    <option value="">Pilih Negara</option>
                    @foreach ($negara as $i)
                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                    @endforeach
                </select>
            </div>
            
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
</div>
</div>
</div>
</div>

@php
$no = 1;
@endphp

{{-- Table --}}
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
    <th>No</th>
    <th>Tingkat Studi</th>
    <th>Negara</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($data as $item)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $item->tingkat_studi->nama }}</td>
    <td>{{ $item->negara->nama }}</td>
    <td>
        <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <!-- Edit Button -->
            <a href="#" data-toggle="modal" data-target="#editModal{{ $item->id }}" class="btn btn-warning">Update</a>
            <!-- Delete Button -->
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>

<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Update Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_tingkat_studi">Tingkat Studi</label>
                        <select class="form-control" name="id_tingkat_studi">
                            <option value="">Pilih Tingkat Studi</option>
                            @foreach ($tingkat_studi as $i)
                            <option value="{{ $i->id }}" @if ($i->id == $item->id_tingkat_studi) selected @endif>{{ $i->nama }}</option>
                            @endforeach
                        </select>
                        <label for="id_negara">Negara</label>
                        <select class="form-control" name="id_negara">
                            <option value="">Pilih Negara</option>
                            @foreach ($negara as $i)
                            <option value="{{ $i->id }}" @if ($i->id == $item->id_negara) selected @endif>{{ $i->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
</tbody>
</table>
{{-- /Table --}}
</div>
<!-- /.card-body -->
</div>
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
