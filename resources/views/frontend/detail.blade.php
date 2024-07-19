@extends('frontend.partials.master')

@section('content')
<!-- Masthead-->
<header class="masthead" id="Homepage">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Detail Kalender Beasiswa</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Mulai Cari Beasiswa Untuk Studi Mu</p>
                <a class="btn btn-primary btn-xl" href="{{ route('kalender_beasiswa.index') }}">Dashboard</a>
            </div>
        </div>
    </div>
</header>

<!-- Detail Kalender Beasiswa -->
<section class="page-section" id="DetailKalenderBeasiswa">
    <div class="container">
        <h1>Tentang</h1>
        <ul class="list-group">
            @foreach ($data as $item)
            <li class="list-group-item">
                <div>
                    <strong>Tingkat Studi:</strong>
                    <ul>
                        @foreach ($item->tingkat_studi as $tingkat)
                            <li>{{ $tingkat->nama }}</li>
                        @endforeach
                    </ul>
                    <strong>Negara:</strong>
                    <ul>
                        @foreach ($item->negara as $neg)
                            <li>{{ $neg->nama }}</li>
                        @endforeach
                    </ul>
                    <strong>Tanggal Registrasi:</strong> {{ date('d-m-Y', strtotime($item->tanggal_registrasi)) }}<br>
                    <strong>Deadline:</strong> {{ date('d-m-Y', strtotime($item->deadline)) }}<br>
                    <strong>Judul:</strong> {{ $item->judul }}<br>
                    <strong>Deskripsi:</strong> {{ $item->deskripsi }}<br>
                    <strong>Jenis Beasiswa:</strong> {{ $item->jenis_beasiswa }}<br>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- Container Keuntungan --}}
    <div class="container">
        <h1>Keuntungan</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Keuntungan:</strong> {{ $item->keuntungan }}<br>
            </li>
        </ul>
        </div>

        {{-- Container Persyaratan --}}
    <div class="container">
        <h1>Persyaratan</h1>
        <ul class="list-group">
            <li class="list-group-item">
        <strong>Umur:</strong> {{ $item->umur }}<br>
        <strong>GPA:</strong> {{ $item->gpa }}<br>
        <strong>Tes English:</strong> {{ $item->tes_english }}<br>
        <strong>Tes Bahasa Lain:</strong> {{ $item->tes_bahasa_lain }}<br>
        <strong>Tes Standard:</strong> {{ $item->tes_standard }}<br>
        <strong>Dokumen:</strong> {{ $item->dokumen }}<br>
        <strong>Lainnya:</strong> {{ $item->lainnya }}<br>
            </li>
        </ul>
        </div>
</section>
<!-- /Kalender Beasiswa -->
@endsection
