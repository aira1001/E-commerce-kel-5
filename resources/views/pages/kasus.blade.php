<!doctype html>
@extends('template')
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>

@section('content')

    <body>
        <div class="container">
            @if (Session::get('success', false))
                <?php $data = Session::get('success'); ?>
                @if (is_array($data))
                    @foreach ($data as $msg)
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check"></i>
                            {{ $msg }}
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $data }}
                    </div>
                @endif
            @elseif (Session::get('warning', false))
                <?php $data = Session::get('warning'); ?>
                @if (is_array($data))
                    @foreach ($data as $msg)
                        <div class="alert alert-warning" role="alert">
                            <i class="fa fa-times"></i>
                            {{ $msg }}
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $data }}
                    </div>
                @endif
            @endif
            <div class="card mt-5" style="width: 75rem;  margin: auto">
                <div class="card-header text-center">
                    Data Kasus
                </div>
                <div class="card-body">
                    <a href="/pra_kasus/create" class="btn btn-primary">Input Kasus Baru</a>
                    <br />
                    <br />
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kasus</th>
                                <th scope="col">Deskripsi Kasus</th>
                                <th scope="col">Tindak Pidana</th>
                                <th scope="col">Status Kasus</th>
                                <th scope="col">Person In Charge</th>
                                <th scope="col">Lembaga PIC</th>
                                <th scope="col">Perintah Disposisi</th>
                                <th scope="col" class="border-right-0">Created At</th>
                                {{-- <th scope="col" class="border-right-0">Aksi</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kasus as $k)
                                <tr>
                                    <th scope="row">
                                        <td>{{ $k->nama_kasus }}</td>
                                        <td>{{ $k->deskripsi_kasus }}</td>
                                        <td>{{ $k->tindak_pidana }}</td>
                                        <td>{{ $k->id_status_kasus }}</td>
                                        <td>{{ $k->pegawai_kasus->nama }}</td>
                                        <td>{{ $k->lembaga_pic }}</td>
                                        <td>{{ $k->id_perintah }}</td>
                                        <td>{{ $k->created_at }}</td>
                                        {{-- <td>{{ $k->status }}</td> --}}
                                        {{-- <td>
                                            <div class="form-inline">
                                                <a href="{{ route('kasus.edit', $k->id_kasus) }}"
                                                    class="btn btn-warning mr-2">Edit</a>
                                                <a href="{{route('pelapor_kasus.destroy',$pk->id_pelapor)}}" class="btn btn-danger">Delete</a>
                                                <form class="form-inline" method="post"
                                                    action="{{ route('kasus.destroy', $k->id_kasus) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td> --}}
                                    </th>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection

</html>
