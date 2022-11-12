<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src=""></script>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Data Pelapor Kasus - <strong>TAMBAH DATA</strong>
            </div>
            <div class="card-body">
                <a href="/kasus_reservation" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="/kasus_reservation/store">

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
                    {{-- <div class="form-group">
                            <label>barang bukti</label>
                            <textarea name="bagaimana_terjadi" class="form-control" placeholder="tuliskan bagaimana terjadi"></textarea>

                             @if ($errors->has('bagaimana_terjadi'))
                                <div class="text-danger">
                                    {{ $errors->first('bagaimana_terjadi')}}
                                </div>
                            @endif

                        </div> --}}

                    <div class="form-group">
                        <h4>Biodata saksi</h4>
                        <label>saksi 1</label>
                        <div class="form-inline" id="body-saksi">
                            <div id="saksi-1">
                                <input name="nama" class="form-control mr-2" placeholder="tuliskan nama saksi" />
                                <input name="umur" type="number" class="form-control" placeholder="umur saksi" />
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="TambahBarang()">
                            {{-- <span class="glyphicon glyphicon-plus"></span> --}}
                            tambah
                        </button>

                        {{-- @if ($errors->has('bagaimana_terjadi'))
                                <div class="text-danger">
                                    {{ $errors->first('bagaimana_terjadi')}}
                                </div>
                            @endif --}}

                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="form-group">
                        <label>uraian dingkat kejadian</label>
                        <textarea name="uraian_singkat_kejadian" class="form-control" placeholder="tuliskan uraian singkat kejadian"></textarea>

                        @if ($errors->has('bagaimana_terjadi'))
                            <div class="text-danger">
                                {{ $errors->first('bagaimana_terjadi') }}
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

</html>
