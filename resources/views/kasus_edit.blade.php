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
                    Data Kasus - <strong>EDIT DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/kasus" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
 
                    <form method="post" action="/kasus/update/{{ $kasus->id }}">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                          <label>Nama Kasus</label>
                          <input type="text" name="nama_kasus" class="form-control" placeholder="Tuliskan nama laporan kasus">

                          @if($errors->has('nama_kasus'))
                              <div class="text-danger">
                                  {{ $errors->first('nama_kasus')}}
                              </div>
                          @endif

                        </div>
 
                        <div class="form-group">
                          <label>Deskripsi Kasus</label>
                          <textarea name="deskripsi_kasus" class="form-control" placeholder="Jabarkan detail deskripsi kasus tersebut"></textarea>

                           @if($errors->has('deskripsi_kasus'))
                              <div class="text-danger">
                                  {{ $errors->first('deskripsi_kasus')}}
                              </div>
                          @endif

                        </div>

                        <div class="form-group">
                          <label>Tindak Pidana</label>
                          <textarea name="tindak_pidana" class="form-control" placeholder="Tindak pidana kasus"></textarea>

                           @if($errors->has('tindak_pidana'))
                              <div class="text-danger">
                                  {{ $errors->first('tindak_pidana')}}
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