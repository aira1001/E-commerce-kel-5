<!doctype html>
@extends('template')

@section('content')

    <body>
        <div class="content">
            <div class="container-fluid">

                <div class="card ">
                    <div class="card-header ">
                        <a href="{{ route('kasus.index') }}" class="btn btn-primary mr-2">Kembali</a>
                        <h1 class="display-4 mb-1">Detail Kasus </h1>
                        @if (Auth::user()->id_role == 5)
                            @if ($kasus->anggotaTim()->count() == null)
                                <a href="{{ route('team.create', $kasus->id) }}" class="btn btn-success">Buat Tim</a>
                            @endif
                        @endif
                        <div class="stats">
                            <i class="fa fa-history"></i> Last Updated
                            {{ date('Y-m-d H:i:s', strtotime($kasus->prakasus->updated_at)) }}
                        </div>
                        <p class="p-1 my-2 mx-2 text-white rounded" style="background: rgb(195, 164, 218)">
                            Tim Kasus:
                            @foreach ($kasus->anggotaTim as $key => $pegawai)
                                @if ($key != 0)
                                    <span>, </span>
                                @endif
                                <span>{{ $pegawai->nama }}</span>
                            @endforeach
                        </p>
                    </div>
                    <div class="card-body ">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Judul Kasus : </h5>
                                <p>{{ $kasus->prakasus->judul_kasus }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Lembaga PIC : </h5>
                                <p>{{ $kasus->lembagakepolisian->nama_lembaga ?? ' ' }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Pegawai PIC : </h5>
                                <p>{{ $kasus->pegawaikasus->nama ?? ' ' }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Status Kasus : </h5>
                                <p>{{ $kasus->statuskasus->nama ?? ' ' }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Perintah Disposisi : </h5>
                                <p>{{ $kasus->perintahdisposisi->perintah ?? ' ' }}</p>
                            </div>

                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-3 font-weight-bold">Waktu Kejadian : </h5>
                                    <div class="d-flex w-25 justify-content-between">
                                        <div>
                                            <h6 class="mb-1">date : </h6>
                                            <p>{{ date('Y-m-d', strtotime($kasus->prakasus->waktu_kejadian)) }}</p>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">time : </h6>
                                            <p>{{ date('H:i:s', strtotime($kasus->prakasus->waktu_kejadian)) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Tempat Kejadian : </h5>
                                    <p>{{ $kasus->prakasus->tempat_kejadian }}</p>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Terlapor : </h5>
                                    <p>{{ $kasus->prakasus->terlapor }}</p>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Korban : </h5>
                                    <p>{{ $kasus->prakasus->korban }}</p>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Bagaimana Terjadi : </h5>
                                    <p>{{ $kasus->prakasus->bagaimana_terjadi }}</p>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Saksi : </h5>
                                    @foreach ($kasus->prakasus->saksi as $saksi)
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="mb-1">Nama : </h6>
                                                <p>{{ $saksi->nama }}</p>
                                            </div class="col">
                                            <div class="col">
                                                <h6 class="mb-1">Umur : </h6>
                                                <p>{{ $saksi->umur }} tahun</p>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-1">Asal : </h6>
                                                <p>{{ $saksi->asal }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Uraian singkat Kejadian : </h5>
                                    <p>{{ $kasus->prakasus->uraian_singkat_kejadian }}</p>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-3 font-weight-bold">Dibuat Pada : </h5>
                                    <div class="d-flex w-25 justify-content-between">
                                        <div>
                                            <h6 class="mb-1">date : </h6>
                                            <p>{{ date('Y-m-d', strtotime($kasus->prakasus->created_at)) }}</p>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">time : </h6>
                                            <p>{{ date('H:i:s', strtotime($kasus->prakasus->created_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item flex-column align-items-start">
                                    <h5 class="mb-2 font-weight-bold">Barang Bukti : </h5>
                                    @foreach ($kasus->prakasus->pelaporFile as $file)
                                        <div class="d-flex w-25 justify-content-between">
                                            <a href="{{ asset('/image/' . $file->path_file) }}" target="_blank">
                                                <img src="{{ asset('/image/' . $file->path_file) }}" alt="image"
                                                    class="img-thumbnail">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li> --}}
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                            </div>
                            <hr>

                        </div>
                    </div>
                    {{-- </div> --}}
                </div>

            </div>
        </div>
    </body>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush
