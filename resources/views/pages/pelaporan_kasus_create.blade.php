<!doctype html>
@extends('template')

@section('content')

    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data pelaporan kasus - <strong>TAMBAH DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/pelaporanKasus" class="btn btn-primary">Kembali</a>
                    <br />
                    <br />

                    <form method="post" action="{{ route('pelaporanKasus.store') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="perihal" class="form-control" placeholder="tuliskan perihal">

                            @if ($errors->has('perihal'))
                                <div class="text-danger">
                                    {{ $errors->first('perihal') }}
                                </div>
                            @endif

                        </div>
                        <div class="dropdown-divider"></div>

                        <div class="form-group">
                            <label>Dekripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Tuliskan Deskripsi laporan"></textarea>

                            @if ($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi') }}
                                </div>
                            @endif
                        </div>
                        <input type="hidden" name="id_kasus" value="{{request()->id}}">

                        <div class="form-group">
                            <input type="submit" class="btn btn-success " value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
@endsection
