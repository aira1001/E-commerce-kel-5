@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <br>
                        <?php
                        $id_role = Auth::user()->id_role;
                        ?>
                        @if ($id_role == 1)
                            <a href="{{ route('pra_kasus.index') }}">go to pra kasus dashboard</a>
                        @elseif ($id_role == 2)
                            <a href="{{ route('kasus.index') }}">go to kasus dashboard</a>
                        @elseif ($id_role == 4)
                            <a href="{{ route('pelaporanKasus.index') }}">go to pelaporan kasus dashboard</a>
                        @elseif ($id_role == 3)
                            <a href="{{ route('pejabatKasus.index') }}">go to kasus role pejabat dashboard</a>
                        @elseif ($id_role == 5)
                            <a href="{{ route('kasus.index') }}">go to kasus role pembuat tim dashboard</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
