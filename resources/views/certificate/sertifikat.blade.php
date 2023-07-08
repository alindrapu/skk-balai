<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat SKK </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

        }

        page {
            position: relative;
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);

        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }

        .page_1 {
            background-image: url('https://lpjk.pu.go.id/dev-sertifikat/assets/sertifikat/dpnbnsp.png');
            background-size: cover;
            background-repeat: no-repeat;
            box-sizing: border-box;
        }

        .page_2 {
            background-image: url('https://lpjk.pu.go.id/dev-sertifikat/assets/sertifikat/blkgbnsp2.png');
            background-size: cover;
            background-repeat: no-repeat;
            box-sizing: border-box;
        }

        .srtf-body {
            position: relative;
            top: 7cm;
            height: 700px;
            width: 15cm;
            margin-left: 3.3cm;
            margin-right: 3cm;
            z-index: 2;
            box-sizing: border-box;
        }

        .srtf-body2 {
            position: relative;
            top: 6cm;
            margin-left: 2.3cm;
            margin-right: 2cm;
            z-index: 2;
            box-sizing: border-box;
        }

        .unit-kompetensi {
            position: relative;
            top: 2.5cm;
            width: 95%;
            box-sizing: border-box;
            z-index: 2;
        }

        .watermark {
            color: lightgrey;
            font-size: 120pt;
            /* -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg); */
            position: absolute;
            margin-top: 200px;
            margin-left: -50px;
            z-index: -1;
        }

        .tanda-tangan {
            margin-top: 0.5cm;

            box-sizing: border-box;
            z-index: 2;
        }

        table {
            table-layout: fixed;
            border-collapse: collapse;
            border: 0;
        }

        td {
            padding: 0 1px;
        }

        th {
            padding: 2px;
        }

        header,
        footer {
            position: absolute;
            left: 0;
            right: 0;
            padding-right: 1.5cm;
            padding-left: 1.5cm;
        }

        header:after {
            content: "";
        }

        footer:after {
            content: "";
        }

        header {
            top: 0;
            padding-top: 10mm;
            padding-bottom: 3mm;
        }

        .no_blanko {
            position: absolute;
            margin-left: 0.5cm;
            margin-top: 0.5cm;
        }

        footer {
            bottom: 0.5cm;
            color: #000;
            padding-top: 3mm;
            padding-bottom: 5mm;
        }

        @media print {

            body,
            page {
                margin: 0;
                box-shadow: 0;
            }
        }
    </style>
</head>



<body data-new-gr-c-s-check-loaded="14.1065.0" data-gr-ext-installed="" cz-shortcut-listen="true">
    <page class="page_1" size="A4">
        <div align="center">
            <div class="no_blanko">
                <h2>{{ $nomor_blangko_bnsp }}</h2>
            </div>
            <div align="center" class="srtf-body">
                <p style="text-align:center; margin-top:0; padding-top:10px; font-weight:bold; font-size:18px">
                    Nomor Sertifikat / <i>Certificate Number</i><br>
                    {{ $nomor_sertifikat_lengkap }} </p>
                <p style="text-align:center; font-size:18px">
                    Dengan ini menyatakan bahwa,<br>
                    <i>This is to certify that,</i>
                </p>
                <p style="text-align:center; font-weight:bold; font-size:20px;">
                    {{ $nama }} </p>
                <p style="text-align:center; font-weight:bold; font-size:18px;">
                    No.Reg. {{ $nomor_registrasi_lpjk }} </p>
                <p style="text-align:center; font-size:18px">
                    Telah Kompeten pada bidang:<br>
                    <i>Is competent in the area of:</i>
                </p>
                <p style="text-align:center; font-weight:bold; font-size: 20px; margin-top:35px;">
                    Jasa Konstruksi<br>
                    <span style="font-size:20px; "><i>Construction Services</i></span>
                </p>
                <p style="text-align:center; font-size:18px;">
                    Dengan Kualifikasi / Kompetensi:<br>
                    <i>With Qualification / Competency:</i>
                </p>
                <p style="text-align:center; font-weight:bold; font-size:22px;">
                    {{ $jabatan_kerja }}<br>
                    <i>{{ $jabatan_kerja_en }}
                    </i>
                </p>
                <p style="text-align:center; margin-top:-5px">
                    Sertifikat ini berlaku untuk 5 (lima) tahun<br>
                    <i>This certificate is valid for 5 (five) years</i>
                </p>
                <p style="text-align:center; font-size:18px">
                    Atas nama Badan Nasional Sertifikasi Profesi<br>
                    <i>On Behalf of Indonesia Professional Certification Authority</i><br>
                </p>
                <p style="text-align:center; font-size:18px">
                    <b>Lembaga Sertifikasi Profesi Gatensi Karya Konstruksi</b><br>
                    <i>Gatensi Karya Konstruksi Professional Certification Agency</i>
                </p>
                <p style="text-align:center;">
                <div style="margin-left: -57px;margin-top: -6px; border:5px solid #fff; width: 70px">
                    {{ $qr_ketua }}
                </div>
                {{-- <img src="" width="70px"
                        style="margin-left: -57px;margin-top: -6px; border:5px solid #fff;"> --}}
                <b style="margin-left: -54px;">Radinal Efendy, ST</b><br>
                </p>

                <p style="text-align:center;margin-left: -54px;margin-top:-15px">
                    <span style="font-size:15px; "><b>Ketua LSP</b><br></span>
                    <span style="font-size:13px; "><i>Chairman PCA</i></span>
                </p>
            </div>
        </div>
    </page>
    <pagebreak>
        <page class="page_2" size="A4">
            <header>
                <p style="text-align:center">
                    <img src="https://lspgatensi.id/files/balai/kjnasdkfnioquwSSww/image/pupr.png" width="70px">
                </p>
                <p style="text-align:center; margin-top:0px; font-weight:bold; font-size:20px; padding-top:-10px; ">
                    LEMBAGA PENGEMBANGAN<br>
                    JASA KONSTRUKSI<br>
                    <i>CONSTRUCTION SERVICES<br>
                        DEVELOPMENT BOARD</i>
                </p>
            </header>
            <div align="center" class="srtf-body2">
                <h3 style="text-align:center; font-weight:bold; padding-top:40px;">
                    Daftar Unit Kompetensi:<br>
                    <i style="font-size: 15px">List of Unit(s) of Competency:</i>
                </h3>
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td colspan=" 5" style="font-size:20px;">Klasifikasi</td>
                            <td colspan=" 1" style="font-size:20px;">:</td>
                            <td colspan="14" style="font-size:20px;">SIPIL</td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px; padding-bottom:10px;"><i>Classification</i></td>
                            <td colspan=" 1" style="font-size:20px; padding-bottom:10px;"><i>:</i></td>
                            <td colspan="14" style="font-size:20px; padding-bottom:10px;"><i>CIVIL</i></td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px;">Subklasifikasi</td>
                            <td colspan=" 1" style="font-size:20px;">:</td>
                            <td colspan="14" style="font-size:20px;">{{ $subklasifikasi }}</td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px; padding-bottom:10px;"><i>Subclassification</i>
                            </td>
                            <td colspan=" 1" style="font-size:20px; padding-bottom:10px;"><i>:</i></td>
                            <td colspan="14" style="font-size:20px; padding-bottom:10px;"><i>{{ $subklasifikasi_en }}


                                </i></td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px;">Kualifikasi</td>
                            <td colspan=" 1" style="font-size:20px;">:</td>
                            <td colspan="14" style="font-size:20px;">{{ $kualifikasi }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px; padding-bottom:10px;"><i>Qualification</i></td>
                            <td colspan=" 1" style="font-size:20px; padding-bottom:10px;"><i>:</i></td>
                            <td colspan="14" style="font-size:20px; padding-bottom:10px;"><i>{{ $kualifikasi_en }}
                                </i></td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px;">Jenjang</td>
                            <td colspan=" 1" style="font-size:20px;">:</td>
                            <td colspan="14" style="font-size:20px;">{{ $jenjang }}</td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px; padding-bottom:10px;"><i>Level</i></td>
                            <td colspan=" 1" style="font-size:20px; padding-bottom:10px;"><i>:</i></td>
                            <td colspan="14" style="font-size:20px; padding-bottom:10px;"><i>{{ $jenjang }}
                                    ({{ $jenjang_en }})</i></td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px;">Okupasi</td>
                            <td colspan=" 1" style="font-size:20px;">:</td>
                            <td colspan="14" style="font-size:20px;">{{ $jabatan_kerja }}</td>
                        </tr>
                        <tr>
                            <td colspan=" 5" style="font-size:20px; padding-bottom:10px;"><i>Occupation</i></td>
                            <td colspan=" 1" style="font-size:20px; padding-bottom:10px;"><i>:</i></td>
                            <td colspan="14" style="font-size:20px; padding-bottom:10px;">
                                <i>{{ $jabatan_kerja_en }}</i>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <footer>
                <div class="tanda-tangan">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;">
                        <tbody>
                            <tr>
                                <td colspan="7" style="width:35%; text-align:center;">
                                </td>
                                <td colspan="4" style="width:20%;"></td>
                                <td colspan="9" style="width:45%;text-align:center;">
                                    Ditetapkan di Jakarta, {{ $tanggal_ditetapkan }} </td>
                            </tr>
                            <tr>
                                <td colspan="7" style="width:35%; text-align:center;">
                                </td>
                                <td colspan="4" style="width:20%;"></td>
                                <td colspan="9" style="width:45%;text-align:center;padding-bottom:10px;">
                                    <i>Enacted in Jakarta, {{ $tanggal_ditetapkan_en }}</i>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7" style="width:35%; text-align:center; vertical-align:top;">
                                    <img src="{{ $pas_foto }}" width="100px">
                                    <!-- <img src="./Sertifikat SKK_files/blank.jpg" width="100px"> -->
                                    <figcaption style="font-size:16px; padding-top:5px;">{{ $nama }}
                                    </figcaption>
                                </td>
                                <td colspan="4" style="width:20%;"></td>
                                <td colspan="9" style="width:45%; text-align:center; vertical-align:top; ">
                                    <img src="data:image/png;base64,{{ $qr }}" width="60%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p style="text-align:justify; font-size:12px;">
                        Keterangan / <i>Remarks</i> :<br>
                    </p>
                    <ol style="margin-left:-0.7cm; font-size:12px;">
                        <li style="text-align:justify; line-height:120%">
                            Sertifikat ini sah berlaku setelah tercatat yang dibuktikan dengan nomor registrasi
                            Sertifikat Kompetensi Kerja Konstruksi. /<br>
                            <i>This certificate is valid upon being registered as evidenced by registration number of
                                Certificate of Competency of Contruction Works.</i>
                        </li>
                        <li style="text-align:justify; line-height:120%">
                            QR Code dan Data yang tertera dalam sertifikat ini dapat diverifikasi melalui sistem
                            informasi jasa konstruksi terintegrasi. /<br>
                            <i>QR Code and Data contained herein may be verified through an integrated information
                                system of construction service.</i>
                        </li>
                    </ol>
                    <p></p>
                </div>
            </footer>
        </page>
    </pagebreak>
    <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</body>

</html>
