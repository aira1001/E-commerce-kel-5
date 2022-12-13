@extends('layouts.app')

@section('content')

<head>
    <title>Laporan polisi</title>

    <style>
    hr.new4 {
        border: 1px solid black;
        width: 200px;
    }

    hr.new5 {
        border: 1px solid black;

    }
    </style>
</head>

<body>
    <div class="container" style=" border: 1px solid; width:100%; ">
        <!-- <div style=></div> -->
        <table align="center" border="0" cellpadding="1" style="width: 900px;">
            <tbody>
                <tr>
                    <td colspan="3">
                        <div align="center">


                            <img src="{{ asset('/assets/img/polisi.png')}}" alt="polisi" style="width:10%;">
                            <br>
                            <span style="font-family: Verdana; font-size: small;"><b>Laporan Polisi</b></span>
                            <hr class="new4">
                            <span
                                style="font-family: Verdana; font-size: small; float: left ; padding-left: 250px ;"><b>
                                    Nomor : </b></span>
                        </div>
                        </br>
                        <hr class="new5">
                        <div style="font-size: small; padding-left: 5px; text-decoration: underline; "> <b> Yang
                                Melaporkan
                                : </b>
                        </div>
                        <br>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table border="0" cellpadding="1">
                            <tbody>
                                <tr>
                                    <td width="93"><span style="font-size: small;">nama</span></td>
                                    <td width="8"><span style="font-size: small;">:</span></td>
                                    <td width="200"><span style="font-size: small;">
                                            <?php foreach ($surat as $value) {?> {{$value->name}} <?php }?> </span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">umur</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">pekerjaan</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"></span></td>
                                </tr>
                                <td><span style="font-size: small;">kewarganegaraan</span></td>
                                <td><span style="font-size: small;">:</span></td>
                                <td><span style="font-size: small;"></span></td>
                                <tr>
                                    <td><span style="font-size: small;">alamat</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"></span></td>
                                </tr>
                                <tr>

                                    <td><span style="font-size: small;">pekerjaan</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"></span></td>
                                </tr>

                            </tbody>
                        </table>
                        <hr class="new5">
                        <div style="font-size: small; padding-left: 5px"> <b> Hal Yang Dilaporkan : </b>
                        </div><br>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table border="0" cellpadding="1" style="width: 400px;">
                            <tbody>
                                <tr>
                                    <td width="93"><span style="font-size: small;">waktu kejadian</span></td>
                                    <td width="8"><span style="font-size: small;">:</span></td>
                                    <td width="200"><span
                                            style="font-size: small;"><?php foreach ($surat as $value) {?>
                                            {{$value->waktu_kejadian}} <?php }?></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">tempat kejadian</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"><?php foreach ($surat as $value) {?>
                                            {{$value->tempat_kejadian}} <?php }?></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">apa yang terjadi</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"><?php foreach ($surat as $value) {?>
                                            {{$value->judul_kasus}} <?php }?></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">siapa yang terlapor</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"><?php foreach ($surat as $value) {?>
                                            {{$value->terlapor}}
                                            <?php }?></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">siapa korban</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"><?php foreach ($surat as $value) {?>
                                            {{$value->korban}}
                                            <?php }?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <div class="row">
                                        <div class="col-6">
                                            <td><div style="font-size: small; padding-top : 0 px">bagaimana terjadi</div></td>
                                            <td><div style="font-size: small;">:</div></td>
                                        </div>
                                        <div class="col6">
                                            <td><br>
                                                <div style="font-size: small;"><?php foreach ($surat as $value) {?>
                                                    {{$value->bagaimana_terjadi}}
                                                    <?php }?> </div>
                                            </td>
                                        </div>
                                    </div>
                                </tr>
                                <td><span style="font-size: small;">dilaporkan pada hari</span></td>
                                <td><span style="font-size: small;">:</span></td>
                                <td><span style="font-size: small;"></span></td>


                            </tbody>
                        </table>

                        <hr class="new5" >
                        <table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table border="0" cellpadding="1" style="width: 400px;">
                            <tbody>
                                <tr>
                                    <td width="93"><span style="font-size: small;"> <b> Tindak Pidana Apa <b></span>
                                    </td>
                                    <td width="93"><span style="font-size: small; ">
                                            <center><b>Nama dan Alamat Saksi<b> </center>
                                        </span></td>
                                </tr>
                                <tr>
                                    <td width="93"><span style="font-size: small;">
                                            <b><?php foreach ($surat as $value) {?>
                                                {{$value->judul_kasus}}
                                                <?php }?> <b></span></td>
                                    <td width="93"><span style="font-size: small; "> Nama saksi </span></td>
                                </tr>
                                <tr>
                                    <td width="93"><span style="font-size: small;"> <b> pasal <b></span></td>
                                    <td width="93"><span style="font-size: small; "> </span></td>
                                </tr>

                            </tbody>
                        </table>
                        <hr class="new5" style="width: 225%;"> <br>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table border="0" cellpadding="1" style="width: 400px;">
                            <tbody>
                                <tr>
                                    <td width="93"><span style="font-size: small;"> <b> Barang Bukti <b></span></td>
                                    <td width="93"><span style="font-size: small; ">
                                            <center><b>Uraian kejadian<b> </center>
                                        </span></td>
                                </tr>
                                <tr>
                                    <td width="93"><span style="font-size: small;"> <b> <?php foreach ($surat as $value) {?>
                                            {{$value->uraian_singkat_kejadian}} <?php }?> <b></span></td>
                                    <td width="93"><span style="font-size: small; ">
                                            <?php foreach ($surat as $value) {?>
                                            {{$value->uraian_singkat_kejadian}} <?php }?> </span></td>
                                </tr>

                            </tbody>
                        </table>
                        <hr class="new5" style="width: 225%;">
                        <br>
                    </td>
                </tr>


                <table>
                    <tbody>
                        <pre><span style="font-size: small;">Pengadu/pelapor membenarkan semua keterangan dan membubuhka tanda tanganya dibawah ini.</span></pre>

                        <div style="padding-right: 100px;" align="right"><br> <br>
                            <span style="font-size: small;">Mengetahui</span>
                        </div>
                    </tbody> <br><br>
                    <div style="padding-right: 100px;" align="right">
                        <span style="font-size: small;"><?php foreach ($surat as $value) {?> {{$value->name}}
                            <?php }?></span>
                    </div>
                </table>
                <hr class="new5 ">
                <div style="font-size: small; padding-left: 5px"> <b> Tindakan yang diambil : </b>
                </div>
                </td>
                </tr>
                <br><br>

                <br>
                <tr>
                    <td colspan="2" valign="top">
                        <div align="justify">
                            <pre><span style="font-size: small;"> - <span style="font-size: small;"><?php foreach ($surat as $value) {?> {{$value->perintah}}
                            <?php }?> </span></pre>

                            <hr class="new5" >
                    </td>
                </tr>
                <table>
                    <div class="row">
                        <div class="col-6">

                            <div style="padding-left: 100px;" align="center">
                                <span style="font-size: small;"><B>Mengetahui</B></span>
                            </div>
                            <div style="padding-left: 100px;" align="center">
                                <span style="font-size: small;"><B>Kepala Kepolisian Sektor Solo</B></span>
                            </div>
                            <br><br>
                            <div style="padding-left: 100px;" align="center">
                                <span style="font-size: small;"><B>nama</B></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="padding-right: 100px;" align="center">
                                <span style="font-size: small;"><?php echo "<b >Solo, <b>". date("d F Y") ; ?> </span>
                            </div>
                            <div style="padding-right: 100px; text-align: center;" align="center">
                                <span style="font-size: small; "><B>Yang Menerima Laporan,</B></span>
                            </div>
                            <br><br>
                            <div style="padding-right: 100px; " align="center">
                                <span style="font-size: small;"><B>nama</B></span>
                            </div>
                        </div>
                    </div>
                </table><br><br><br><br>
    </div>
    </tbody>
    </table>
    </div>
</body>
@endsection