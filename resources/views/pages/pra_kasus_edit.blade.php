<!doctype html>
@extends('layouts.app')
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

{{-- @extends("layouts.sidebar.sidebar") --}}
@section('content')
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Kasus - <strong>EDIT DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/pra_kasus" class="btn btn-primary">Kembali</a>
                    <br />
                    <br />


                    <form method="post" action="/pra_kasus/update/{{ $pra_kasus->id_pra_kasus }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama Pelapor</label>
                            <input type="text" name="username" class="form-control" placeholder="Tuliskan nama Anda"
                                value="{{ $pra_kasus->user->name }}">

                            @if ($errors->has('username'))
                                <div class="text-danger">
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                        </div>

                        <div class="dropdown-divider"></div>
                        <h4 class="mb-3">Detail Kejadian</h4>
                        <div class="form-group">
                            <label>Judul Kasus</label>
                            <input type="text" name="judul_kasus" class="form-control" placeholder="Tuliskan judul kasus"
                                value="{{ $pra_kasus->judul_kasus }}">

                            @if ($errors->has('judul_kasus'))
                                <div class="text-danger">
                                    {{ $errors->first('judul_kasus') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>waktu kejadian</label>
                            <div class="form-inline">
                                <input type="date" name="tgl_kejadian" class="form-control"
                                    value="{{ date('Y-m-d', strtotime($pra_kasus->waktu_kejadian)) }}">
                                <input type="time" name="time_kejadian" class="form-control"
                                    value="{{ date('H:i:s', strtotime($pra_kasus->waktu_kejadian)) }}">
                            </div>

                            @if ($errors->has('tgl_kejadian'))
                                <div class="text-danger">
                                    {{ $errors->first('tgl_kejadian') }}
                                </div>
                            @elseif ($errors->has('time_kejadian'))
                                <div class="text-danger">
                                    {{ $errors->first('time_kejadian') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>tempat kejadian</label>
                            <input type="text" name="tempat_kejadian" class="form-control"
                                placeholder="Tuliskan tempat kejadian kasus" value="{{ $pra_kasus->tempat_kejadian }}">

                            @if ($errors->has('tempat_kejadian'))
                                <div class="text-danger">
                                    {{ $errors->first('tempat_kejadian') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>terlapor</label>
                            <input name="terlapor" class="form-control" placeholder="tuliskan terlapor"
                                value="{{ $pra_kasus->terlapor }}" />

                            @if ($errors->has('terlapor'))
                                <div class="text-danger">
                                    {{ $errors->first('terlapor') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>korban</label>
                            <input name="korban" class="form-control" placeholder="tuliskan korban"
                                value="{{ $pra_kasus->korban }}" />

                            @if ($errors->has('korban'))
                                <div class="text-danger">
                                    {{ $errors->first('korban') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>bagaimana terjadi</label>
                            <textarea name="bagaimana_terjadi" class="form-control" placeholder="tuliskan bagaimana terjadi">{{ $pra_kasus->bagaimana_terjadi }}</textarea>

                            @if ($errors->has('bagaimana_terjadi'))
                                <div class="text-danger">
                                    {{ $errors->first('bagaimana_terjadi') }}
                                </div>
                            @endif

                        </div>
                        <div class="dropdown-divider"></div>
                        <div>
                            <label>barang bukti</label>
                            <input type="file" name="filename[]" multiple>
                        </div>
                        <div class="dropdown-divider"></div>

                        <script>
                            $(document).ready(function() {
                                let jmlSaksi = 0
                                $("#btn-tambah").click(function() {
                                    jmlSaksi++;
                                    $("#label-nama").clone().appendTo("#table-saksi")
                                    $("#nama_1").clone().attr({
                                        name: `addMoreInputFields[${jmlSaksi}][nama]`
                                    }).val('').appendTo("#table-saksi")
                                    $("#label-umur").clone().appendTo("#table-saksi")
                                    $("#umur_1").clone().attr({
                                        name: `addMoreInputFields[${jmlSaksi}][umur]`
                                    }).val('').appendTo("#table-saksi")
                                    console.log($("#umur_2").val());
                                })
                            })
                        </script>
                        <br>
                        <div class="form-group">
                            <h4>Biodata saksi</h4>
                            <div id="table-saksi" class="form-inline" style="width: 550px">
                                @foreach ($pra_kasus->saksi as $saksi)
                                    <div class="form-inline" id="body-saksi" style="width: 550px">
                                        <label id="label-nama">nama:&nbsp;&nbsp; </label>
                                        <input name="addMoreInputFields[{{ $saksi->id_saksi }}][nama]" id="nama_1"
                                            class="form-control mr-2 mb-2" placeholder="tuliskan nama saksi"
                                            value="{{ $saksi->nama }}" />
                                        <label id="label-umur">umur:&nbsp;&nbsp; </label>
                                        <input name="addMoreInputFields[{{ $saksi->id_saksi }}][umur]" id="umur_1"
                                            type="number" class="form-control mb-2" placeholder="umur saksi"
                                            value="{{ $saksi->umur }}" />
                                    </div>
                                @endforeach
                            </div>


                            <button type="button" id="btn-tambah" class="btn btn-primary mt-2">
                                {{-- <span class="glyphicon glyphicon-"></span> --}}
                                tambah
                            </button>
                            @if ($errors->has('addMoreInputFields.*.nama'))
                                <div class="text-danger">
                                    {{ $errors->first('addMoreInputFields.*.nama') }}
                                </div>
                            @elseif($errors->has('addMoreInputFields.*.umur'))
                                <div class="text-danger">
                                    {{ $errors->first('addMoreInputFields.*.umur') }}
                                </div>
                            @endif

                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-group">
                            <label>uraian singkat kejadian</label>
                            <textarea name="uraian_singkat_kejadian" class="form-control" placeholder="tuliskan uraian singkat kejadian">{{ $pra_kasus->uraian_singkat_kejadian }}</textarea>

                            @if ($errors->has('uraian_singkat_kejadian'))
                                <div class="text-danger">
                                    {{ $errors->first('uraian_singkat_kejadian') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
@endsection

</html>
