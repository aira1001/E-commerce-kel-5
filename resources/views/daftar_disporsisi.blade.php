@extends('layouts.app')

@section('content')
<main class="main">
    <section class="section dashboard">
        <!-- <div class="row"> -->
            <div class="container ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1> <b>Daftar disporsisi </b></h1>
                </div>
                <div class="card" style="padding: 50px;">
                    <div class="d-flex flex-row-reverse bd-highlight">
                        </div>
                    <table class="table">
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
                                    <a href="{{url('disporsisi')}}/{{$value->id}}" class="btn btn btn-info">Open Data</a>
                                </td>
                            </tbody>
                        <?php $nomer++;
                        } ?>
                    </table>
                </div>
            </div>
        <!--     -->
    </section>
</main>

@endsection
