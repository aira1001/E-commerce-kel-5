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
                   Daftar Kasus
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                            <tr>
                                <th scope="col">Nama Kasus</th>
                                <th scope="col">id_kasus</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php $nomer = 1;
                        foreach ($daftar as $value) {  ?>
                            <tbody>
                                <td>{{$value->judul_kasus}} </td>
                                <td>{{$value->id}}</td>
                                <td>
                                    <a href="{{url('disporsisi')}}/{{$value->id}}" class="btn btn btn-info">View Pdf</a>
                                </td>
                                <td>
                                    <a href="{{url('/disporsisi/cetak_pdf')}}/{{$value->id}}" class="btn btn btn-info"> Unduh Pdf</a>
                                </td>
                            </tbody>
                        <?php 
                        } ?>
                            
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection

</html>

