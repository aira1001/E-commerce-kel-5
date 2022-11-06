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
                    Data Pelapor Kasus - <strong>EDIT DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/pelapor_kasus" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
 
                    <form method="post" action="/pelapor_kasus/update/{{ $pelapor_kasus->id }}">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                          <label>Perihal</label>
                          <input type="text" name="perihal" class="form-control" placeholder="Tuliskan perihal kasus">

                          @if($errors->has('perihal'))
                              <div class="text-danger">
                                  {{ $errors->first('perihal')}}
                              </div>
                          @endif

                        </div>

                        <div class="form-group">
                          <label>Deskripsi</label>
                          <textarea name="deskripsi" class="form-control" placeholder="Jabarkan detail deskripsi kasus tersebut"></textarea>

                           @if($errors->has('deskripsi'))
                              <div class="text-danger">
                                  {{ $errors->first('deskripsi')}}
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