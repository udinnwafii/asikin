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
                            <div class="card-body">
                                <form action=" {{ route('kategori.store')}}" method="post">
                                    @csrf
                                    <h1>Kategori</h1>
                                    <a type="button" href=" {{ route('kategori.index') }} " class="btn btn-info">KEMBALI</a>
                                        <br>
                                        <label for="">Tingkat Studi</label>
                                        <select name="id_tingkal_studi" id="">
                                            <option value=""></option>
                                        </select>
                                        <label for="">Nama Negara</label>
                                        <select name="id_tingkal_studi" id="">
                                            <option value=""></option>
                                        </select>
                                        <label for="">Benua</label>
                                        <select name="id_tingkal_studi" id="">
                                            <option value=""></option>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-warning" >SIMPAN </button>
                                </form>
                            </div>
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
@endsection