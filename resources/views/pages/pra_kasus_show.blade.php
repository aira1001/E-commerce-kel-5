<!doctype html>
@extends('template')

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>

@section('content')

    <body>
        <div class="content">
            <div class="container-fluid">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Email Statistics') }}</h4>
                            <p class="card-category">{{ __('Last Campaign Performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Bounce') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Unsubscribe') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-8"> --}}
                <div class="card ">
                    <div class="card-header ">
                        <a href="{{ route('pra_kasus.index') }}" class="btn btn-primary mr-2">Kembali</a>
                        <h1 class="display-4 mb-1">Detail Kasus </h1>
                        <div class="stats">
                            <i class="fa fa-history"></i> Last Updated
                            {{ date('Y-m-d H:i:s', strtotime($pra_kasus->updated_at)) }}
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Judul Kasus : </h5>
                                <p>{{ $pra_kasus->judul_kasus }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-3 font-weight-bold">Waktu Kejadian : </h5>
                                <div class="d-flex w-25 justify-content-between">
                                    <div>
                                        <h6 class="mb-1">date : </h6>
                                        <p>{{ date('Y-m-d', strtotime($pra_kasus->waktu_kejadian)) }}</p>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">time : </h6>
                                        <p>{{ date('H:i:s', strtotime($pra_kasus->waktu_kejadian)) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Tempat Kejadian : </h5>
                                <p>{{ $pra_kasus->tempat_kejadian }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Terlapor : </h5>
                                <p>{{ $pra_kasus->terlapor }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Korban : </h5>
                                <p>{{ $pra_kasus->korban }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Bagaimana Terjadi : </h5>
                                <p>{{ $pra_kasus->bagaimana_terjadi }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Saksi : </h5>
                                @foreach ($pra_kasus->saksi as $saksi)
                                    <div class="d-flex w-25 justify-content-between">
                                        <div>
                                            <h6 class="mb-1">Nama : </h6>
                                            <p>{{ $saksi->nama }}</p>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Umur : </h6>
                                            <p>{{ $saksi->umur }} tahun</p>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Asal : </h6>
                                            <p>{{ $saksi->asal }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Uraian singkat Kejadian : </h5>
                                <p>{{ $pra_kasus->uraian_singkat_kejadian }}</p>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-3 font-weight-bold">Dibuat Pada : </h5>
                                <div class="d-flex w-25 justify-content-between">
                                    <div>
                                        <h6 class="mb-1">date : </h6>
                                        <p>{{ date('Y-m-d', strtotime($pra_kasus->created_at)) }}</p>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">time : </h6>
                                        <p>{{ date('H:i:s', strtotime($pra_kasus->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item flex-column align-items-start">
                                <h5 class="mb-2 font-weight-bold">Barang Bukti : </h5>
                                @foreach ($pra_kasus->pelaporFile as $file)
                                    <div class="d-flex w-25 justify-content-between">
                                        <a href="{{ asset('/image/' . $file->path_file) }}" target="_blank">
                                            <img src="{{ asset('/image/' . $file->path_file) }}" alt="image"
                                                class="img-thumbnail">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li> --}}
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                            <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                            <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                        </div>
                        <hr>
                        {{-- <div class="stats">
                            <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                        </div> --}}
                    </div>
                </div>
                {{-- </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('2017 Sales') }}</h4>
                            <p class="card-category">{{ __('All products including Taxes') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartActivity" class="ct-chart"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Tesla Model S') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('BMW 5 Series') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> {{ __('Data information certified') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Tasks') }}</h4>
                            <p class="card-category">{{ __('Backend development') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Sign contract for "What are conference organizers afraid of?"') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Lines From Great Russian Literature? Or E-mails From My Boss?') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Create 4 Invisible User Experiences you Never Knew About') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Read "Following makes Medium better"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            disabled>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Unfollow 5 enemies from twitter') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task"
                                                    class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove"
                                                    class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        </div>
    </body>
@endsection

</html>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush
