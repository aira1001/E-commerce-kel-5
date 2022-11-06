<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Kasus
                </div>
                <div class="card-body">
                    <a href="/kasus/create" class="btn btn-primary">Input Kasus Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kasus</th>
                                <th>Deskripsi Kasus</th>
                                <th>Tindak Pidana</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kasus as $k)
                            <tr>
                                <td>{{ $k->nama_kasus }}</td>
                                <td>{{ $k->deskripsi_kasus }}</td>
                                <td>{{ $k->tindak_pidana }}</td>
                                <td>
                                    <a href="/kasus/edit/{{ $k->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/kasus/delete/{{ $k->id }}" class="btn btn-danger">Hapus</a>
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