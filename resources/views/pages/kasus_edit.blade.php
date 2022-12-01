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
                    <a href="/kasus" class="btn btn-primary">Kembali</a>
                    <br />
                    <br />


                    <form method="post" action="/kasus/update/{{ $pra_kasus->id_pra_kasus }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama Pelapor</label>
                            <input type="text" name="username" class="form-control" readonly
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
                            <input type="text" name="nama_kasus" class="form-control" readonly
                                value="{{ $pra_kasus->judul_kasus }}">

                            @if ($errors->has('judul_kasus'))
                                <div class="text-danger">
                                    {{ $errors->first('judul_kasus') }}
                                </div>
                            @endif
                        </div>

                        {{-- <div class="form-group">

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

                        </div> --}}

                        <div class="form-group">
                            <label>Deskripsi Kasus</label>
                            <textarea name="deskripsi_kasus" class="form-control" readonly>{{ $pra_kasus->bagaimana_terjadi }}</textarea>

                            @if ($errors->has('deskripsi_kasus'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi_kasus') }}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Tindak Pidana</label>
                            <select class="block w-full mt-1" name="tindak_pidana">
                                <option value="pembunuhan" {{ $kasus->tindak_pidana == 'pembunuhan' ? 'selected' : '' }}>
                                    Pembunuhan
                                </option>
                                <option value="pencurian" {{ $kasus->tindak_pidana == 'pencurian' ? 'selected' : '' }}>
                                    Pencurian
                                </option>
                                <option value="pembegalan" {{ $kasus->tindak_pidana == 'pembegalan' ? 'selected' : '' }}>
                                    Pembegalan
                                </option>
                            </select>

                            @if ($errors->has('tindak_pidana'))
                                <div class="text-danger">
                                    {{ $errors->first('tindak_pidana') }}
                                </div>
                            @endif
                        </div>
                            
                        <select class="form-control{{ $errors->has('pegawai_pic') ? ' is-invalid' : '' }}" name="pegawai_pic">
                            @foreach($my_collection as $pegawai)
                            <option value="{{ $kasus->id_pegawai_pic }}">{{ $pegawai->nama }}</option>
                            @endforeach
                          </select>
              
                          @if ($errors->has('pegawai_pic'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('pegawai_pic') }}</strong>
                              </span>
                          @endif

                        {{-- <select class="form-control" name="pegawai_pic">
                            <option>Pegawai PIC (Person In Charge)</option>
                            @foreach ($items as $kasus => $id_pegawai_pic)
                                <option value="{{ $id_pegawai_pic }}" {{ ( $pegawai == $selectedID) ? 'selected' : '' }}> 
                                    {{ $value }} 
                                </option>
                            @endforeach    
                        </select> --}}

                        {{-- <div class="dropdown-divider"></div>
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
                        </script> --}}
                        <br>
                        <div class="form-group">
                            {{-- <h4>Biodata saksi</h4>
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
                            </div> --}}

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
