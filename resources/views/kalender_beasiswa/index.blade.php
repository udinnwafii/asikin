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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal"data-target="#TambahKalenderBeasiswa">Tambah Kalender</button>
<!--Button To Page Soft Delete-->
<a href="{{ route('soft_delete') }}" type="button" class="btn btn-warning ml-auto">Lihat Soft Delete</a>
<!-- Modal -->
<div class="modal fade" id="TambahKalenderBeasiswa" tabindex="-1"
aria-labelledby="Tambah Kalender Beasiswa" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="TambahKalenderBeasiswa">Kalender Beasiswa</h5>
<button type="button" class="close" data-dismiss="modal"
aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ route('kalender_beasiswa.store') }}" method="post">
@csrf
<div class="form-group">
<h1>Kategori</h1>
<div>
    <label for="option_negara">Negara</label>
    <select class="form-control" name="id_negara[]" id="option_negara" multiple required>
        @foreach ($negara as $i)
            <option value="{{ $i->id }}">{{ $i->nama }}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="option_tingkat_studi">Tingkat Studi</label>
    <select class="form-control" name="id_tingkat_studi[]" id="option_tingkat_studi" multiple required>
        @foreach ($tingkat_studi as $i)
            <option value="{{ $i->id }}">{{ $i->nama }}
            </option>
        @endforeach
    </select>
</div>
<br>
<h1>Tentang</h1>
<label for="tanggal_registrasi">Tanggal Registrasi</label>
<input type="date" class="form-control" name="tanggal_registrasi" required>
<label for="deadline">Deadline</label>
<input type="date" class="form-control" name="deadline" required>
<label for="judul">Judul</label>
<input type="text" class="form-control" name="judul" required>
<label for="deskripsi">Deskripsi</label>
<textarea name="deskripsi" class="form-control" cols="15" rows="10" required></textarea>
<label for="jurusan">Jurusan</label>
<input type="text" class="form-control" name="jurusan" required>
<label for="jenis_beasiswa">Jenis Beasiswa</label>
<select name="jenis_beasiswa" class="form-control" required>
    <option value="">Pilih Jenis Beasiswa</option>
    <option value="full">Full</option>
    <option value="partial">Partial</option>
</select>
<br>
<h1>Keuntungan</h1>
<label for="keuntungan">Keuntungan</label>
<textarea name="keuntungan" class="form-control" cols="15" rows="10" required></textarea>
<br>
<h1>Persyaratan</h1>
<label for="umur">Umur</label>
<input type="text" class="form-control" name="umur" required>
<label for="gpa">GPA</label>
<input type="text" class="form-control" name="gpa" required>
<label for="tes_english">Tes English</label>
<input type="text" class="form-control" name="tes_english" required>
<label for="tes_bahasa_lain">Tes Bahasa Lain</label>
<input type="text" class="form-control" name="tes_bahasa_lain" required>
<label for="tes_standard">Tes Standard</label>
<input type="text" class="form-control" name="tes_standard" required>
<label for="dokumen">Dokumen</label>
<input type="text" class="form-control" name="dokumen" required>
<label for="lainnya">Lainnya</label>
<input type="text" class="form-control" name="lainnya" required>
<label for="status_tampil">Status Tampil</label>
<select name="status_tampil" class="form-control" required>
    <option value="">Pilih Status Tampil</option>
    <option value="1">Tampil</option>
    <option value="0">Tidak Tampil</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>
new MultiSelectTag('option_negara'); // id
new MultiSelectTag('option_tingkat_studi'); // id
</script>
</form>
</div>
</div>
</div>
<div class="table-responsive">
@php $no = 1; @endphp
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Tingkat Studi</th>
<th>Negara</th>
<th>Tanggal Registrasi</th>
<th>Deadline</th>
<th>Judul</th>
<th>Deskripsi</th>
<th>Jenis Beasiswa</th>
<th>Keuntungan</th>
<th>Umur</th>
<th>GPA</th>
<th>Tes English</th>
<th>Tes Bahasa Lain</th>
<th>Tes Standard</th>
<th>Dokumen</th>
<th>Lainnya</th>
<th>Status Tampil</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($data as $item)
<tr>
<td>{{ $no++ }}</td>
<td>
@foreach ($item->tingkat_studi as $tingkat) {{ $tingkat->nama }}<br> @endforeach
</td>
<td>
@foreach ($item->negara as $neg) {{ $neg->nama }}<br> @endforeach
</td>
<td>{{ date('d-m-Y', strtotime($item->tanggal_registrasi)) }}</td>
<td>{{ date('d-m-Y', strtotime($item->deadline)) }}</td>
<td>{{ $item->judul }}</td>
<td>{{ $item->deskripsi }}</td>
<td>{{ $item->jenis_beasiswa }}</td>
<td>{{ $item->keuntungan }}</td>
<td>{{ $item->umur }}</td>
<td>{{ $item->gpa }}</td>
<td>{{ $item->tes_english }}</td>
<td>{{ $item->tes_bahasa_lain }}</td>
<td>{{ $item->tes_standard }}</td>
<td>{{ $item->dokumen }}</td>
<td>{{ $item->lainnya }}</td>
<td>{{ $item->status_tampil }}</td>
<td>
<form action="{{ route('kalender_beasiswa.destroy', $item->id) }}"
    method="post">
    @csrf
    @method('DELETE')
    <!-- Edit Button -->
    <a href="#" data-toggle="modal"
        data-target="#EditKalenderBeasiswa{{ $item->id }}"
        class="btn btn-warning">Update</a>
    <!-- Delete Button -->
    <a data-toggle="modal" data-target="#DeleteKalenderBeasiswa{{ $item->id }}" class="btn btn-danger">Delete</a>
</form>
</td>
</tr>
<!-- Edit Modal -->
<div class="modal fade" id="EditKalenderBeasiswa{{ $item->id }}"
tabindex="-1" aria-labelledby="EditKalenderBeasiswa"
aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="EditKalenderBeasiswa">Edit
            Beasiswa</h5>
        <button type="button" class="close"
            data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form
        action="{{ route('kalender_beasiswa.update', $item->id) }}"
        method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="form-group">
                <h1>Kategori</h1>
                <div>
                    <label
                        for="option_negara_{{ $item->id }}">Negara</label>
                    <select class="form-control"
                        name="id_negara[]" id="option_negara_{{ $item->id }}" multiple> @foreach ($negara as $i)
                            <option value="{{ $i->id }}"
                        {{ in_array($i->id, $item->negara->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $i->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label
                        for="option_tingkat_studi_{{ $item->id }}">Tingkat Studi</label>
                    <select class="form-control"
                        name="id_tingkat_studi[]"
                        id="option_tingkat_studi_{{ $item->id }}"
                        multiple>
                        @foreach ($tingkat_studi as $i)
                            <option value="{{ $i->id }}"
                                {{ in_array($i->id, $item->tingkat_studi->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $i->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <h1>Tentang</h1>
                <label for="tanggal_registrasi">Tanggal
                    Registrasi</label>
                <input type="date" class="form-control"
                    name="tanggal_registrasi"
                    value="{{ $item->tanggal_registrasi }}">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control"
                    name="deadline"
                    value="{{ $item->deadline }}">
                <label for="judul">Judul</label>
                <input type="text" class="form-control"
                    name="judul" value="{{ $item->judul }}">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" cols="15" rows="10">{{ $item->deskripsi }}</textarea>
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control"
                    name="jurusan" value="{{ $item->jurusan }}">
                <label for="jenis_beasiswa">Jenis Beasiswa</label>
                <select name="jenis_beasiswa"
                    class="form-control">
                    <option value="">Pilih Jenis Beasiswa
                    </option>
                    <option value="full"
                        {{ $item->jenis_beasiswa == 'full' ? 'selected' : '' }}>
                        Full</option>
                    <option value="partial"
                        {{ $item->jenis_beasiswa == 'partial' ? 'selected' : '' }}>
                        Partial</option>
                </select>
                <br>
                <h1>Keuntungan</h1>
                <label for="keuntungan">Keuntungan</label>
                <textarea name="keuntungan" class="form-control" cols="15" rows="10">{{ $item->keuntungan }}</textarea>
                <br>
                <h1>Persyaratan</h1>
                <label for="umur">Umur</label>
                <input type="text" class="form-control"
                    name="umur" value="{{ $item->umur }}">
                <label for="gpa">GPA</label>
                <input type="text" class="form-control"
                    name="gpa" value="{{ $item->gpa }}">
                <label for="tes_english">Tes English</label>
                <input type="text" class="form-control"
                    name="tes_english"
                    value="{{ $item->tes_english }}">
                <label for="tes_bahasa_lain">Tes Bahasa
                    Lain</label>
                <input type="text" class="form-control"
                    name="tes_bahasa_lain"
                    value="{{ $item->tes_bahasa_lain }}">
                <label for="tes_standard">Tes Standard</label>
                <input type="text" class="form-control"
                    name="tes_standard"
                    value="{{ $item->tes_standard }}">
                <label for="dokumen">Dokumen</label>
                <input type="text" class="form-control"
                    name="dokumen" value="{{ $item->dokumen }}">
                <label for="lainnya">Lainnya</label>
                <input type="text" class="form-control"
                    name="lainnya" value="{{ $item->lainnya }}">
                <label for="status_tampil">Status Tampil</label>
                <select name="status_tampil" class="form-control">
                    <option value="">Pilih Status Tampil
                    </option>
                    <option value="1"{{ $item->status_tampil == '1' ? 'selected' : '' }}>Tampil</option>
                    <option value="0"{{ $item->status_tampil == '0' ? 'selected' : '' }}>Tidak Tampil</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
        <script>
            new MultiSelectTag('option_negara_{{ $item->id }}'); // id
            new MultiSelectTag('option_tingkat_studi_{{ $item->id }}'); // id
        </script>
    </form>
</div>
</div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="DeleteKalenderBeasiswa{{ $item->id }}"
tabindex="-1" aria-labelledby="DeleteKalenderBeasiswa"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="DeleteKalenderBeasiswa">Delete Beasiswa</h5>
        <button type="button" class="close"
            data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Data Ini Akan di Simpan Di Soft Delete Selama 30 Hari!
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-dismiss="modal">Close</button>
        <!-- Form for delete action -->
        <form
            action="{{ route('kalender_beasiswa.destroy', $item->id) }}"
            method="post">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
</div>
</div>
@endforeach
</tbody>
</table>
</div>
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
