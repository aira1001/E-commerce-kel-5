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
        <table align="center" border="0" cellpadding="1" style="width: 100%;">
            <tbody>
                <tr>
                    <td colspan="3">
                        <div align="center">

                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents( public_path('/assets/img/polisi.png') )) }}"
                                style="width:10%;">

                            <br>
                            <span style="font-family: Verdana; font-size: small;"><b>Laporan Polisi</b></span>
                            <hr class="new4">
                            <span
                                style="font-family: Verdana; font-size: small; float: left ; padding-left: 250px ; "><b>
                                    Nomor : </b></span>
                        </div>
                        </br>
                        <hr class="new5">
                        <div style="font-size: small;  text-decoration: underline; "> <b> Yang
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
                                    <td width="200"><span style="font-size: small;"><?php foreach ($surat as $value) {?>
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
                                    <td>
                                        <div style="font-size: small; padding-top : 0 px">bagaimana terjadi</div>
                                    </td>
                                    <td>
                                        <div style="font-size: small;">:</div>
                                    </td>
                                    <div style="font-size: small;"><?php foreach ($surat as $value) {?>
                                        {{$value->bagaimana_terjadi}}
                                        <?php }?>
                                    </div>
                                </tr>
                                <tr>
                                    <td><span style="font-size: small;">dilaporkan pada hari</span></td>
                                    <td><span style="font-size: small;">:</span></td>
                                    <td><span style="font-size: small;"></span></td>
                                </tr>
                            </tbody>
                    </td>

                </tr>
            </tbody>

        </table>
        <hr class="new5">
        <table border="0" cellpadding="1" style="width: 100%;">
            <tr>
                <td>
                    <table border="0" cellpadding="1" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="50"><span style="font-size: small;"> <b> Tindak Pidana Apa <b></span>
                                </td>
                                <td width="50"><span style="font-size: small; ">
                                        <b>Nama dan Alamat Saksi<b>
                                    </span></td>
                            </tr>
                            <tr>
                                <td width="50"><span style="font-size: small;">
                                        <b><?php foreach ($surat as $value) {?>
                                            {{$value->judul_kasus}}
                                            <?php }?> <b></span></td>
                                <td width="50"><span style="font-size: small; "> Nama saksi </span></td>
                            </tr>
                            <tr>
                                <td width="50"><span style="font-size: small;"> <b> pasal <b></span></td>
                                <td width="50"><span style="font-size: small; "> </span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

        <hr class="new5" style="width: 100%;"> <br>
        <table border="0" cellpadding="1" style="width: 100%;">
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="1" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="50"><span style="font-size: small;"> <b> Barang Bukti <b></span></td>
                                <td width="50"><span style="font-size: small;">
                                        <b>Uraian kejadian<b>
                                    </span></td>
                            </tr>
                            <tr>
                                <td width="20"><span style="font-size: small;"> <b>
                                            <?php foreach ($surat as $value) {?>
                                            {{$value->barang_bukti}} <?php }?> <b></span></td>
                                <td width="20"><span style="font-size: small; ">
                                        <?php foreach ($surat as $value) {?>
                                        {{$value->uraian_singkat_kejadian}} <?php }?> </span></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

        <hr class="new5" style="width: 100%;"> <br>
        <table cellpadding="1" style="width: 100%; ">
            <tbody>
                <span style="font-size: small;" style="width: 100%;">Pengadu/pelapor membenarkan semua keterangan dan
                    membubuhka tanda tanganya dibawah ini.</span>

                <div style="padding-right: 100px;" align="right"><br> <br>
                    <span style="font-size: small;">Mengetahui</span>
                </div>
            </tbody> <br><br><br><br><br>
            <div style="padding-right: 100px;" align="right">
                <span style="font-size: small;"><?php foreach ($surat as $value) {?> {{$value->name}}
                    <?php }?></span>
            </div>
        </table>

        <hr>

        <div style="font-size: small; padding-left: 5px"> <b> Tindakan yang diambil : </b>
        </div>

        <br>
        <table cellpadding="1" style="width: 100%;">
            <tr>
                <td colspan="2" valign="top">
                    <div align="justify">
                        <span style="font-size: small;"> - <span
                                style="font-size: small;"><?php foreach ($surat as $value) {?> {{$value->perintah}}
                                <?php }?> </span>

                            <hr class="new5">
                    </div>
                </td>
            </tr>
        </table>

        <table cellpadding="1" style="width: 100%;">
            <tr>
                <td style="padding-left: 60px;" align="center"> <span
                        style="font-size: small;"><B>Mengetahui</B></span><br> <span style="font-size: small;"><B>Kepala
                            Kepolisian
                            Sektor Solo</B></span> <BR><BR><BR><BR><BR> <span style="font-size: small;"><B>nama</B> <br> <br> <br> <br>
                </td>
                <td style="padding-right: 60px;" align="center"> <span
                        style="font-size: small;"><?php echo "<b >Solo, <b>" . date("d F Y"); ?> </span> <br> <span
                        style="font-size: small; "><B>Yang Menerima Laporan,</B></span> <br> <br> <br> <br> <br> <span
                        style="font-size: small;"><B>nama</B> <br> <br> <br> <br> </span>
                </td>
            </tr>
        </table>
    </div>
</body>