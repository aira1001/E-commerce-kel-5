<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>

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
                        <i class="fa fa-check"></i>
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
                Data Pra kasus
            </div>
            <div class="card-body">
                <a href="/pra_kasus/create" class="btn btn-primary">Input reservasi kasus Baru</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>waktu kejadian</th>
                            <th>tempat kejadian</th>
                            <th>judul kasus</th>
                            {{-- <th>terlapor</th>
                            <th>korban</th> --}}
                            {{-- <th>bagaimana_terjadi</th>
                            <th>barang bukti</th> --}}
                            {{-- <th>saksi</th> --}}
                            <th>uraian singkat kejadian</th>
                            <th>tanggal lapor</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pra_kasus as $pk)
                            <tr>
                                <td>{{ $pk->waktu_kejadian }}</td>
                                <td>{{ $pk->tempat_kejadian }}</td>
                                <td>{{ $pk->judul_kasus }}</td>
                                {{-- <td>{{ $pk->terlapor }}</td>
                                <td>{{ $pk->korban }}</td> --}}
                                {{-- <td>{{ $pk->bagaimana_terjadi }}</td>
                                <td>{{ $pk->barang_bukti }}</td> --}}
                                {{-- <td>{{ $pk->saksi }}</td> --}}
                                <td>{{ $pk->uraian_singkat_kejadian }}</td>
                                <td>{{ $pk->created_at }}</td>
                                <td>{{ $pk->status }}</td>
                                <td>
                                    <div class="form-inline">
                                        <a href="/pelapor_kasus/edit/{{ $pk->id_pra_kasus }}"
                                            class="btn btn-warning mr-2">Edit</a>
                                        {{-- <a href="{{route('pelapor_kasus.destroy',$pk->id_pelapor)}}" class="btn btn-danger">Delete</a> --}}
                                        <form class="form-inline" method="post"
                                            action="{{ route('pra_kasus.destroy', $pk->id_pra_kasus) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
