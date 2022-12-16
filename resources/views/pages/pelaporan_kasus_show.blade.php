<!doctype html>
@extends('template')

@section('content')

    <body>
        @if (Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @elseif (Session::get('warning', false))
            <?php $data = Session::get('warning'); ?>
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @endif
        <div class="content">
            <div class="container-fluid">
                <div class="card ">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">
                            <?php $userRole = Auth::user()->id_role; ?>
                            @if ($userRole == 4)
                                <a href="{{ route('pelaporanKasus.index') }}" class="btn btn-primary mr-2">Kembali</a>
                                <a href="{{ route('pelaporanKasus.create', ['id' => $kasus->id]) }}"
                                    class="btn btn-success mr-2">tambah laporan</a>
                            @elseif ($userRole == 3)
                                <a href="{{ route('pejabatKasus.index') }}" class="btn btn-primary mr-2">Kembali</a>
                            @endif
                        </div>
                        <h1 class="display-4 mb-1">Detail Kasus </h1>
                        <div class="stats">
                            <i class="fa fa-history"></i> Last Updated
                            {{ date('Y-m-d H:i:s', strtotime($kasus->updated_at)) }}
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Nama Pelapor : </h5>
                                <p>{{ $kasus->prakasus->user->name }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Judul Kasus : </h5>
                                <p>{{ $kasus->prakasus->judul_kasus }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">pegawai PIC : </h5>
                                <div class="d-flex justify-content-between">
                                    <p>{{ $kasus->pegawaikasus->nama ?? ' '}}</p>
                                    @if ($userRole == 3)
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal2" data-whatever="@PIC">Add PIC</button>
                                    @endif
                                </div>
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
                                    <div class="d-flex w-25 justify-content-between">
                                        <div>
                                            <h6 class="mb-1">Nama : </h6>
                                            <p>{{ $saksi->nama }}</p>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Umur : </h6>
                                            <p>{{ $saksi->umur }} tahun</p>
                                        </div>
                                        <div>
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
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Perintah Disposisi : </h5>
                                <div class="d-flex justify-content-between">
                                    <p>{{ $kasus->perintahdisposisi->perintah }}</p>
                                    @if ($userRole == 3)
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal3" data-whatever="@perintah">Edit Perintah</button>
                                    @endif
                                </div>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-3 font-weight-bold">Pelaporan Kasus : </h5>
                                @foreach ($kasus->pelaporankasus as $listlaporan)
                                    <div class="row">

                                        <div class="col">
                                            <h6 class="mb-1">Perihal : </h6>
                                            <p>{{ $listlaporan->perihal }}</p>
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-1">Deskripsi : </h6>
                                            <p>{{ $listlaporan->deskripsi }}</p>
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-1">dibuat pada : </h6>
                                            <p>{{ $listlaporan->created_at }}</p>
                                        </div>
                                        @if ($userRole == 4)
                                            <button class="btn btn-danger" style="height: 40px; width: 84px;"
                                                data-toggle="modal" data-target="#exampleModal">Delete
                                            </button>
                                        @endif
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus laporan ini ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form class="form-inline" method="post"
                                                            action="{{ route('pelaporanKasus.destroy', $listlaporan->id_pelaporan) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Tambah Pegawai PIC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ url('pegawaiKasus') }}/{{ $kasus->id }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <select class="custom-select w-100{{ $errors->has('pegawai_pic') ? ' is-invalid' : '' }}"
                                    name="pegawai_pic">
                                    <option value="" {{ is_null($kasus->pegawaikasus) ? 'selected' : '' }} hidden
                                        disabled>select option</option>
                                    @foreach ($listpegawai as $pegawai)
                                        <option value="{{ $pegawai->id }}"
                                            {{ $kasus->pegawaikasus?->id == $pegawai->id ? 'selected' : '' }}>
                                            {{ $pegawai->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel3">Edit Perintah Disposisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ url('perintahKasus') }}/{{ $kasus->id }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <select
                                        class="custom-select w-100{{ $errors->has('perintah_disposisi') ? ' is-invalid' : '' }}"
                                        name="perintah_disposisi">
                                        <option value="" {{ is_null($kasus->perintahdisposisi) ? 'selected' : '' }}
                                            hidden disabled>select option</option>
                                        @foreach ($listperintah as $itemperintah)
                                            <option value="{{ $itemperintah->id_perintah }}"
                                                {{ $kasus->perintahdisposisi?->id_perintah == $itemperintah->id_perintah ? 'selected' : '' }}>
                                                {{ $itemperintah->perintah }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                                {{-- <a type="button" class="btn btn-primary" href="{{ url('perintahKasus')}}/{{$kasus->id}}">Send message</a> --}}
                            </div>
                        </form>
                    </div>
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
