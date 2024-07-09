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
@php
$no = 1;
@endphp
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
<button type="button" class="btn btn-primary" data-toggle="modal"
    data-target="#exampleModal">Tambah Kalender</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kalender Beasiswa</h5>
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
                            <label for="">Negara</label>
                            <select class="form-control" name="id_negara[]" id="option_negara" multiple>
                                @foreach ($negara as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="">Tingkat Studi</label>
                            <select class="form-control" name="id_tingkat_studi[]" id="option_tingkat_studi" multiple>
                                @foreach ($tingkat_studi as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <h1>Tentang</h1>
                        <label for="">Tanggal Registrasi</label>
                        <input type="date" class="form-control"name="tanggal_registrasi">
                        <label for="">Deadline</label>
                        <input type="date" class="form-control" name="deadline">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="judul">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="15" rows="10"></textarea>
                        <label for="">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan">

                        <label for="">Jenis Beasiswa</label>
                        <select name="jenis_beasiswa" class="form-control">
                            <option value="">Pilih Jenis Beasiswa</option>
                            <option value="full">Full</option>
                            <option value="partial">Partial</option>
                        </select>

                        <br>
                        <h1>Keuntungan</h1>
                        <label for="">Keuntungan</label>
                        <textarea name="keuntungan" class="form-control" cols="15" rows="10"></textarea>
                        <br>
                        <h1>Persyaratan</h1>
                        <label for="">Umur</label>
                        <input type="text" class="form-control" name="umur">
                        <label for="">GPA</label>
                        <input type="text" class="form-control" name="gpa">
                        <label for="">Tes English</label>
                        <input type="text" class="form-control" name="tes_english">
                        <label for="">Tes Bahasa Lain</label>
                        <input type="text" class="form-control" name="tes_bahasa_lain">
                        <label for="">Tes Standard</label>
                        <input type="text" class="form-control" name="tes_standard">
                        <label for="">Dokumen</label>
                        <input type="text" class="form-control" name="dokumen">
                        <label for="">Lainnya</label>
                        <input type="text" class="form-control" name="lainnya">

                        <label for="">Status Tampil</label>
                        <select name="status_tampil" class="form-control">
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
                new MultiSelectTag('option_negara')  // id
                new MultiSelectTag('option_tingkat_studi')  // id
            </script>
            </form>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tingkat Studi</th>
                <th>Negara</th>
                {{-- <th>Penulis</th> --}}
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
                    <td>{{ $item->tingkat_studi->nama }}</td>
                    <td>{{ $item->negara->nama }}</td>
                    {{-- <td>{{ $item->user->nama }}</td> --}}
                    <td>{{ $item->tanggal_registrasi }}</td>
                    <td>{{ $item->deadline }}</td>
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
                                data-target="#editModal{{ $item->id }}"
                                class="btn btn-warning">Update</a>
                            <!-- Delete Button -->
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
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
