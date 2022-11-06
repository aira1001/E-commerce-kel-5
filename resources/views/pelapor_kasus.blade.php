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
                    Data Pelapor Kasus
                </div>
                <div class="card-body">
                    <a href="/pelapor_kasus/create" class="btn btn-primary">Input Pelapor Kasus Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Perihal</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelapor_kasus as $pk)
                            <tr>
                                <td>{{ $pk->perihal }}</td>
                                <td>{{ $pk->deskripsi }}</td>
                                <td>
                                    <a href="/pelapor_kasus/edit/{{ $pk->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/pelapor_kasus/delete/{{ $pk->id }}" class="btn btn-danger">Hapus</a>
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