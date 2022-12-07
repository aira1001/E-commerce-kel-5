@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
