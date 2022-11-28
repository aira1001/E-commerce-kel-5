<!doctype html>
@extends('template')

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
@section('content')

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Pra Kasus - <strong>TAMBAH DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/pra_kasus" class="btn btn-primary">Kembali</a>
                    <br />
                    <br />

                    <form method="post" action="/pra_kasus/store" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Pelapor</label>
                            <input type="text" name="username" class="form-control" placeholder="Tuliskan nama Anda">

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
                            <input type="text" name="judul_kasus" class="form-control"
                                placeholder="Tuliskan judul kasus">

                            @if ($errors->has('judul_kasus'))
                                <div class="text-danger">
                                    {{ $errors->first('judul_kasus') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>waktu kejadian</label>
                            <div class="form-inline">
                                <input type="date" name="tgl_kejadian" class="form-control">
                                <input type="time" name="time_kejadian" class="form-control">
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
                                placeholder="Tuliskan tempat kejadian kasus">

                            @if ($errors->has('tempat_kejadian'))
                                <div class="text-danger">
                                    {{ $errors->first('tempat_kejadian') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>terlapor</label>
                            <input name="terlapor" class="form-control" placeholder="tuliskan terlapor" />

                            @if ($errors->has('terlapor'))
                                <div class="text-danger">
                                    {{ $errors->first('terlapor') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>korban</label>
                            <input name="korban" class="form-control" placeholder="tuliskan korban" />

                            @if ($errors->has('korban'))
                                <div class="text-danger">
                                    {{ $errors->first('korban') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>bagaimana terjadi</label>
                            <textarea name="bagaimana_terjadi" class="form-control" placeholder="tuliskan bagaimana terjadi"></textarea>

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

                        <script>
                            $(document).ready(function() {
                                let jmlSaksi = 1
                                $("#btn-tambah").click(function() {
                                    jmlSaksi++;
                                    $("#label-nama").clone().appendTo("#body-saksi")
                                    $("#nama_1").clone().attr({
                                        name: `addMoreInputFields[${jmlSaksi}][nama]`
                                    }).val('').appendTo("#body-saksi")
                                    $("#label-umur").clone().appendTo("#body-saksi")
                                    $("#umur_1").clone().attr({
                                        name: `addMoreInputFields[${jmlSaksi}][umur]`
                                    }).val('').appendTo("#body-saksi")
                                    console.log($("#umur_2").val());
                                })
                            })
                        </script>

                        <div class="form-group">
                            <h4>Biodata saksi</h4>
                            <div class="form-inline" id="body-saksi" style="width: 550px">
                                <label id="label-nama">nama:&nbsp;&nbsp; </label>
                                <input name="addMoreInputFields[0][nama]" id="nama_1" class="form-control mr-2 mb-2"
                                    placeholder="tuliskan nama saksi" />
                                <label id="label-umur">umur:&nbsp;&nbsp; </label>
                                <input name="addMoreInputFields[0][umur]" id="umur_1" type="number"
                                    class="form-control mb-2" placeholder="umur saksi" />
                            </div>
                            {{-- <a class="btn btn-danger btn-sm" id="btn-tambah">
                                <i class="fa fa-plus-square fa-2x" aria-hidden="true"></i> </a> --}}
                            <button type="button" id="btn-tambah" class="btn btn-primary btn-sm mt-2">
                                <i class="fa fa-plus-square fa-2x"></i>
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
                            <textarea name="uraian_singkat_kejadian" class="form-control" placeholder="tuliskan uraian singkat kejadian"></textarea>

                            @if ($errors->has('uraian_singkat_kejadian'))
                                <div class="text-danger">
                                    {{ $errors->first('uraian_singkat_kejadian') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success " value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
@endsection

</html>
