{{-- <!doctype html> --}}
@extends('template')
{{-- <html> --}}
{{--
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head> --}}

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
                    <form method="post" action="{{ route('kasus.update', $kasus->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nama Pelapor</label>
                            <input type="text" name="username" class="form-control" readonly
                                value="{{ $kasus->prakasus->user->name }}">

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
                                value="{{ $kasus->prakasus->judul_kasus }}">

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
                            <textarea name="deskripsi_kasus" class="form-control" readonly>{{ $kasus->prakasus->bagaimana_terjadi }}</textarea>

                            @if ($errors->has('deskripsi_kasus'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi_kasus') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status kasus</label>
                            <select class="custom-select w-100{{ $errors->has('status_kasus') ? ' is-invalid' : '' }}"
                                name="status_kasus">
                                <option value="" {{ is_null($kasus->statuskasus) ? 'selected' : '' }} selected hidden
                                    disabled>select option</option>
                                @foreach ($liststatus as $statuskasus)
                                    <option value="{{ $statuskasus->id }}"
                                        {{ $kasus->statuskasus?->id == $statuskasus->id ? 'selected' : '' }}>
                                        {{ $statuskasus->nama }}</option>
                                @endforeach
                                {{-- <option value="pembunuhan"
                                    {{ $kasus->statuskasus->nama == 'pembunuhan' ? 'selected' : '' }}>
                                    Pembunuhan
                                </option>
                                <option value="pencurian" {{ $kasus->statuskasus->nama == 'pencurian' ? 'selected' : '' }}>
                                    Pencurian
                                </option>
                                <option value="pembegalan"
                                    {{ $kasus->statuskasus->nama == 'pembegalan' ? 'selected' : '' }}>
                                    Pembegalan
                                </option> --}}
                            </select>

                            @error('status_kasus')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Pegawai PIC</label>
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
                            @if ($errors->has('pegawai_pic'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pegawai_pic') }}</strong>
                                </span>
                            @endif
                        </div> --}}

                        <div class="form-group">
                            <label>Lembaga PIC</label>
                            <select class="custom-select w-100{{ $errors->has('lembaga_pic') ? ' is-invalid' : '' }}"
                                name="lembaga_pic">
                                <option value="" {{ is_null($kasus->lembagakepolisian) ? 'selected' : '' }} hidden
                                    disabled>
                                    select option</option>
                                @foreach ($listlembaga as $lembagapic)
                                    <option value="{{ $lembagapic->id_lembaga }}"
                                        {{ $kasus->lembagakepolisian?->id_lembaga == $lembagapic->id_lembaga ? 'selected' : '' }}>
                                        {{ $lembagapic->nama_lembaga }}</option>
                                @endforeach
                            </select>
                            @error('status_kasus')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Perintah Disposisi</label>
                            <select
                                class="custom-select w-100{{ $errors->has('perintah_disposisi') ? ' is-invalid' : '' }}"
                                name="perintah_disposisi">
                                <option value="" {{ is_null($kasus->perintahdisposisi) ? 'selected' : '' }} hidden
                                    disabled>
                                    select option</option>
                                @foreach ($listperintah as $itemperintah)
                                    <option value="{{ $itemperintah->id_perintah }}"
                                        {{ $kasus->perintahdisposisi?->id_perintah == $itemperintah->id_perintah ? 'selected' : '' }}>
                                        {{ $itemperintah->perintah }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('perintah_disposisi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('perintah_disposisi') }}</strong>
                                </span>
                            @endif
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

{{-- </html> --}}
