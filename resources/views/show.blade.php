@php
  $jenjangs = [
      '1' => 'SD',
      '2' => 'SMP',
      '3' => 'SMA',
      '4' => 'D1',
      '5' => 'D2',
      '6' => 'D3',
      '7' => 'D4',
      '8' => 'S1',
      '9' => 'S2',
      '10' => 'S3',
      '11' => 'Profesi',
      '12' => 'D4 Terapan',
      '13' => 'S1 Terapan',
      '14' => 'S2 Terapan',
      '15' => 'S3 Terapan',
      '16' => 'SMK Plus',
      '17' => 'SMK/STM',
      '18' => 'S2 & Spesialis 1',
      '19' => 'S3 & Spesialis 2',
      '99' => 'Non Pendidikan',
  ];
  $propinsis = [
      '11' => 'Aceh',
      '12' => 'Sumatera Utara',
      '13' => 'Sumatera Barat',
      '14' => 'Riau',
      '15' => 'Jambi',
      '16' => 'Sumatera Selatan',
      '17' => 'Bengkulu',
      '18' => 'Lampung',
      '19' => 'Kepulauan Bangka Belitung',
      '21' => 'Kepulauan Riau',
      '31' => 'DKI Jakarta',
      '32' => 'Jawa Barat',
      '33' => 'Jawa Tengah',
      '34' => 'DI Yogyakarta',
      '35' => 'Jawa Timur',
      '36' => 'Banten',
      '51' => 'Bali',
      '52' => 'Nusa Tenggara Barat',
      '53' => 'Nusa Tenggara Timur',
      '61' => 'Kalimantan Barat',
      '62' => 'Kalimantan Tengah',
      '63' => 'Kalimantan Selatan',
      '64' => 'Kalimantan Timur',
      '65' => 'Kalimantan Utara',
      '71' => 'Sulawesi Utara',
      '72' => 'Sulawesi Tengah',
      '73' => 'Sulawesi Selatan',
      '74' => 'Sulawesi Tenggara',
      '75' => 'Gorontalo',
      '76' => 'Sulawesi Barat',
      '81' => 'Maluku',
      '82' => 'Maluku Utara',
      '91' => 'Papua Barat',
      '94' => 'Papua',
  ];
  
@endphp


<style>
  body {
    background-color: #112D4E;
  }

  * {
    font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
  }

  form.my-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 40px;
  }
  /* form.my-form:first-child{
    margin-top: 90px;
  } */
  .my-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #DBE2EF;
  }

  .forms {
    padding-bottom: 20px;
  }

  .form-group {
    margin-bottom: 15px;
    width: 100%;
  }

  label {
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .form-control-file {
    padding-top: 4px;
  }

  .btn {
    display: inline-block;
    padding: 8px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
  }

  .btn:hover {
    background-color: #0056b3;
    color: #fff;
  }

  table {
    width: 740px;
    border-collapse: collapse;
    margin: auto;
  }

  label {
    font-weight: 600;
    color: black;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #fff;
  }

  img {
    max-width: 350px;
    object-fit: cover;
    border-radius: 5px;
  }

  .forms {
    display: flex;
    flex-wrap: wrap;
  }

  /* Modal styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  h1 {
    text-align: center;
    color: #fff;
  }
  .container{
    width: 80%;
    padding: 32px 20px 90px;

    background-color: #3F72AF;
    border-radius: 10px;
    margin: 30px auto;
  }

  .proyek {
    align-items: flex-start;
  }

  .pendidikan {
    align-items: flex-start;
  }

  .bodyproyek {
    margin-top: 30px;
  }

  input {
    color: black;
  }

  tbody {
    border: none;
    border-radius: 30px;
  }

  th {
    background: #DBE2EF;
    color: black;
    width: 180px;
    border-color: rgba(0, 0, 0, 0.189);
    font-weight: 600;
  }

  td {
    background: #F9F7F7;
    color: black;
    border-color: rgba(0, 0, 0, 0.189);

  }

  th:last-child {
    border-color: transparent;
  }

  .input {
    padding-right: 20px;
  }
  .logo-kecil{
    width: min-content;
    width: 90px;
  }
  .header{
    display: flex;
    align-items: center;
    height: max-content;
    flex-wrap: wrap;
    width: max-content;
    padding-bottom: 30px;
    column-gap: 47px;
    margin-left: 90px;
  }
  .isi{
    display: flex;
    align-items: flex-start;
    justify-content: space-evenly;
  }
</style>



<div class="container">
<<<<<<< HEAD
  <div class="header">
    <img class="logo-kecil" src="./images/logodoang.png" alt="Logo"  />
    <h1>DATA KLASIFIKASI KUALIFIKASI</h1>
  
  </div>
<div class="isi">
<div class="data personal ">
  
<table>
  <tbody>
    @foreach ($klasifikasikualifikasis as $klasifikasikualifikasi)
      <tr>
        <th>LSP</th>
        @if ($klasifikasikualifikasi->lsp === 16)
          <td>LSP Gatensi Karya Konstruksi</td>
        @endif
      </tr>
      <tr>
        <th>Subklasifikasi</th>
        @if ($klasifikasikualifikasi->subklasifikasi === 'SI01')
          <td>Gedung</td>
        @endif
      </tr>
      <tr>
        <th>Kualifikasi</th>
        <td>{{ $klasifikasikualifikasi->kualifikasi }}</td>
      </tr>
      <tr>
        <th>Jabatan Kerja</th>
        @if ($klasifikasikualifikasi->jabatan_kerja === 'SI012027')
          <td>Pelaksana Lapangan Pekerjaan Gedung</td>
        @endif
      </tr>
      <tr>
        <th>Jenjang</th>
        <td>{{ $klasifikasikualifikasi->jenjang }}</td>
      </tr>
      <tr>
        <th>Asosiasi</th>
        @if ($klasifikasikualifikasi->asosiasi === 187)
          <td>GATENSI</td>
        @endif
      </tr>
      <tr>
        <th>KTA</th>
        @if ($klasifikasikualifikasi->kta === '')
          <td> - </td>
        @else
          <td> {{ $klasifikasikualifikasi->kta }} </td>
        @endif
      </tr>
      <tr>
        <th>TUK</th>
        <td>{{ $klasifikasikualifikasi->tuk }}</td>
      </tr>
      <tr>
        <th>Jenis Permohonan</th>
        <td>{{ $klasifikasikualifikasi->jenis_permohonan }}</td>
      </tr>
      <tr>
        <th>No. Registrasi Asosiasi</th>
        <td>{{ $klasifikasikualifikasi->no_registrasi_asosiasi }}</td>
      </tr>
      <tr>
        <th>Klasifikasi</th>
        <td>{{ $klasifikasikualifikasi->klasifikasi }}</td>
      </tr>
      {{-- <tr>
=======
  <div class="data personal ">
    <h1>DATA KLASIFIKASI KUALIFIKASI</h1>

    <table>
      <tbody>
        @foreach ($klasifikasikualifikasis as $klasifikasikualifikasi)
          <tr>
            <th>LSP</th>
            @if ($klasifikasikualifikasi->lsp === 16)
              <td>LSP Gatensi Karya Konstruksi</td>
            @endif
          </tr>
          <tr>
            <th>Subklasifikasi</th>
            @if ($klasifikasikualifikasi->subklasifikasi === 'SI01')
              <td>Gedung</td>
            @endif
          </tr>
          <tr>
            <th>Kualifikasi</th>
            <td>{{ $klasifikasikualifikasi->kualifikasi }}</td>
          </tr>
          <tr>
            <th>Jabatan Kerja</th>
            @if ($klasifikasikualifikasi->jabatan_kerja)
              <?php
              $jabatanKerja = \App\Models\MasterJabatanKerja::where('id_jabatan_kerja', $klasifikasikualifikasi->jabatan_kerja)->first();
              ?>
              <td>{{ $jabatanKerja ? $jabatanKerja->jabatan_kerja : '' }}</td>
            @endif
          </tr>
          <tr>
            <th>Jenjang</th>
            <td>{{ $klasifikasikualifikasi->jenjang }}</td>
          </tr>
          <tr>
            <th>Asosiasi</th>
            @if ($klasifikasikualifikasi->asosiasi === 187)
              <td>GATENSI</td>
            @endif
          </tr>
          <tr>
            <th>KTA</th>
            @if ($klasifikasikualifikasi->kta === '')
              <td> - </td>
            @else
              <td> {{ $klasifikasikualifikasi->kta }} </td>
            @endif
          </tr>
          <tr>
            <th>TUK</th>
            <td>{{ $klasifikasikualifikasi->tuk }}</td>
          </tr>
          <tr>
            <th>Jenis Permohonan</th>
            <td>{{ $klasifikasikualifikasi->jenis_permohonan }}</td>
          </tr>
          <tr>
            <th>No. Registrasi Asosiasi</th>
            <td>{{ $klasifikasikualifikasi->no_registrasi_asosiasi }}</td>
          </tr>
          <tr>
            <th>Klasifikasi</th>
            <td>{{ $klasifikasikualifikasi->klasifikasi }}</td>
          </tr>
          {{-- <tr>
>>>>>>> cee029bba21a2c764e7f083c672c37d88dbd7dca
        <th>No. Registrasi</th>
        <td>{{ $proyek->no_registrasi }}</td>
      </tr> --}}
        @endforeach
      </tbody>
    </table>

    {{-- Show Data Personal --}}
    <h1>DATA PERSONAL</h1>
    <div class=" my-5">
      <table>
        <tbody>
          @foreach ($personals as $personal)
            <tr>
              <th>ID Izin</th>
              <td>{{ $personal->id_izin }}</td>
            </tr>
            <tr>
              <th>NIK</th>
              <td>{{ $personal->nik }}</td>
            </tr>
            <tr>
              <th>Nama</th>
              <td>{{ $personal->nama }}</td>
            </tr>
            <tr>
              <th>Tempat Lahir</th>
              <td>{{ $personal->tempat_lahir }}</td>
            </tr>
            <tr>
              <th>Tanggal Lahir</th>
              <td>{{ $personal->tanggal_lahir }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $personal->email }}</td>
            </tr>
            <tr>
              <th>Telepon</th>
              <td>{{ $personal->telepon }}</td>
            </tr>
            <tr>
              <th>NPWP</th>
              <td>{{ $personal->npwp }}</td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <td>{{ $personal->jenis_kelamin }}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>{{ $personal->alamat }}</td>
            </tr>
            <tr>
              <th>Negara</th>
              <td>{{ $personal->negara }}</td>
            </tr>
            <tr>
              <th>Propinsi</th>
              <td>{{ $propinsis[$personal->propinsi] ?? '' }}</td>
            </tr>
            <tr>
              <th>Kabupaten</th>
              <td>{{ $personal->kabupaten }}</td>
            </tr>
            <tr>
              <th>Kodepos</th>
              <td>{{ $personal->kodepos }}</td>
            </tr>
            <tr>
              <th>KTP</th>
              <td><a href="#" onclick="openModal('{{ $personal->ktp }}')"> View</td>
            </tr>
            <tr>
              <th>File NPWP</th>
              <td><a href="#" onclick="openModal('{{ $personal->file_npwp }}')"> View</td>
            </tr>
            <tr>
              <th>Pas Foto</th>
              <td><a href="#" onclick="openModal('{{ $personal->pas_foto }}')"> View</td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
  <div class="input personal">

    {{-- Verifikasi Button --}}
    <form class="my-form" action="{{ route('hitVerifikasi', ['id_izin' => $id_izin]) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary">Verifikasi
      </button>
    </form>

    {{-- Validasi Button --}}
    <form class="my-form" action="{{ route('hitValidasi', ['id_izin' => $id_izin]) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary">Validasi
      </button>
    </form>

    {{-- Form Input Data Personal --}}
    <h1>INPUT DATA PERSONAL</h1>
    <form class="my-form" action="{{ route('storePersonal', ['id_izin' => $id_izin]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="forms">
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="negara">Negara:</label>
          <input type="text" name="negara" id="negara" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="kodepos">Kode Pos:</label>
          <input type="text" name="kodepos" id="kodepos" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="ktp">KTP:</label>
          <input type="file" name="ktp" id="ktp" class="form-control-file" required>
        </div>

        <div class="form-group">
          <label for="surat_pernyataan_kebenaran_data">Surat Pernyataan Kebenaran Data:</label>
          <input type="file" name="surat_pernyataan_kebenaran_data" id="surat_pernyataan_kebenaran_data"
            class="form-control-file">
        </div>

        <div class="form-group">
          <label for="file_npwp">File NPWP:</label>
          <input type="file" name="file_npwp" id="file_npwp" class="form-control-file">
        </div>

        <div class="form-group">
          <label for="pas_foto">Pas Foto:</label>
          <input type="file" name="pas_foto" id="pas_foto" class="form-control-file" required>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

    {{-- Form Input Data Registrasi --}}
    <h1>INPUT DATA REGISTRASI</h1>
    <form class="my-form" action="{{ route('storeRegistrasi', ['id_izin' => $id_izin]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="tuk">TUK:</label>
        <input type="text" name="tuk" id="tuk" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>
</div>
</div>

<div class="container pendidikan">
  <div class="data pendidikan">
    {{-- Show Data Pendidikan --}}
    <h1>DATA PENDIDIKAN</h1>
    <table>
      <tbody>
        @foreach ($pendidikans as $pendidikan)
          <tr>
            <th>Nama Sekolah</th>
            <td>{{ $pendidikan->nama_sekolah_perguruan_tinggi }}</td>
          </tr>
          <tr>
            <th>Program Studi</th>
            <td>{{ $pendidikan->program_studi }}</td>
          </tr>
          <tr>
            <th>No. Ijazah</th>
            <td>{{ $pendidikan->no_ijazah }}</td>
          </tr>
          <tr>
            <th>Tahun Lulus</th>
            <td>{{ $pendidikan->tahun_lulus }}</td>
          </tr>
          <tr>
            <th>Jenjang</th>
            <td>{{ $jenjangs[$pendidikan->jenjang] ?? '' }}</td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td>{{ $pendidikan->alamat }}</td>
          </tr>
          <tr>
            <th>Negara</th>
            <td>{{ $pendidikan->negara }}</td>
          </tr>
          <tr>
            <th>Provinsi</th>
            <td>{{ $propinsis[$pendidikan->propinsi] }}</td>
          </tr>
          <tr>
            <th>Kabupaten</th>
            <td>{{ $pendidikan->kabupaten }}</td>
          </tr>
          <tr>
            <th>Scan Ijazah</th>
            <td><a href="#" onclick="openModal('{{ $pendidikan->scan_ijazah_legalisir }}')">View</td>
          </tr>
          <tr>
            <th>Surat Keterangan</th>
            <td><a href="#" onclick="openModal('{{ $pendidikan->scan_surat_keterangan }}')">View</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="input pendidikan">
    {{-- Form Input Data Pendidikan --}}
    <h1>INPUT DATA PENDIDIKAN</h1>

    <form class="my-form" action="{{ route('storePendidikan', ['id_izin' => $id_izin]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="forms">
        <div class="form-group">
          <label for="nama_sekolah_perguruan_tinggi">Nama Sekolah/ Perguruan Tinggi:</label>
          <input type="text" name="nama_sekolah_perguruan_tinggi" id="nama_sekolah_perguruan_tinggi"
            class="form-control" required>
        </div>

        <div class="form-group">
          <label for="program_studi">Program Studi:</label>
          <input type="text" name="program_studi" id="program_studi" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="no_ijazah">No Ijazah:</label>
          <input type="text" name="no_ijazah" id="no_ijazah" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="tahun_lulus">Tahun Lulus:</label>
          <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="jenjang">Jenjang: S1 (8), SMK (17), SMA (3)</label>
          <input type="number" name="jenjang" id="jenjang" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="scan_ijazah_legalisir">Scan Ijazah:</label>
          <input type="file" name="scan_ijazah_legalisir" id="scan_ijazah_legalisir" class="form-control-file">
        </div>

        <div class="form-group">
          <label for="scan_surat_keterangan">Scan Surat Keterangan:</label>
          <input type="file" name="scan_surat_keterangan" id="scan_surat_keterangan" class="form-control-file">
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<div class="container proyek">
  <div class="data proyek">
    {{-- Show Data Proyek --}}
    <h1>DATA PROYEK</h1>
    <table>
      <tbody>
        @foreach ($proyeks as $proyek)
          <tr class="bodyproyek">
            <th>Nama Proyek</th>
            <td>{{ $proyek->nama_proyek }}</td>
          </tr>
          <tr>
            <th>Lokasi Proyek</th>
            <td>{{ $propinsis[$proyek->lokasi_proyek] }}</td>
          </tr>
          <tr>
            <th>Tanggal Awal</th>
            <td>{{ $proyek->tanggal_awal }}</td>
          </tr>
          <tr>
            <th>Tanggal Akhir</th>
            <td>{{ $proyek->tanggal_akhir }}</td>
          </tr>
          <tr>
            <th>Jabatan</th>
            <td>{{ $proyek->jabatan }}</td>
          </tr>
          <tr>
            <th>Nilai Proyek</th>
            <td>{{ number_format($proyek->nilai_proyek, 0, '.', '.') }}</td>
          </tr>
          <tr>
            <th>Surat Referensi Kerja</th>
            <td><a href="#" onclick="openModal('{{ $proyek->surat_referensi }}')">View</td>
          </tr>
          <tr>
            <th>Jenis Pengalaman</th>
            <td>{{ $proyek->jenis_pengalaman }}</td>
          </tr>
          <tr>
            <th>Pemberi Kerja</th>
            <td>{{ $proyek->pemberi_kerja }}</td>
          </tr>
          <tr>
            <th>NIK</th>
            <td>{{ $proyek->nik }}</td>
          </tr>
          {{-- <tr>
        <th>No. Registrasi</th>
        <td>{{ $proyek->no_registrasi }}</td>
      </tr> --}}
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="input proyek">
    <h1>INPUT DATA PROYEK</h1>
    <form class="my-form" action="{{ route('storeProyek', ['id_izin' => $id_izin]) }}" method="POST"
      enctype="multipart/form-data">
      <div class="forms">
        @csrf

        <div class="form-group">
          <label for="nama_proyek">Nama Proyek</label>
          <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="lokasi_proyek">Lokasi Proyek: isi 35 (Jawa Timur)</label>
          <input type="text" name="lokasi_proyek" id="lokasi_proyek" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="tanggal_awal">Tanggal Awal:</label>
          <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="tanggal_akhir">Tanggal Akhir:</label>
          <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="jabatan">Jabatan:</label>
          <input type="text" name="jabatan" id="jabatan" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="nilai_proyek">Nilai Proyek</label>
          <input type="text" name="nilai_proyek" id="nilai_proyek" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="surat_referensi">Surat Referensi Kerja:</label>
          <input type="file" name="surat_referensi" id="surat_referensi" class="form-control-file">
        </div>

        {{-- <div class="form-group">
    <label for="jenis_pengalaman">Jenis Pengalamn</label>
    <input type="text" name="jenis_pengalaman" id="jenis_pengalaman" class="form-control" required>
  </div> --}}

        <div class="form-group">
          <label for="pemberi_kerja">Pemberi Kerja</label>
          <input type="text" name="pemberi_kerja" id="pemberi_kerja" class="form-control" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>




    </form>
  </div>
</div>


<div class="container">
  <div class="jadwal">
    <h1>INPUT JADWAL</h1>

    <form class="my-form" action="{{ route('buatJadwal', ['id_izin' => $id_izin]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="forms">

        <div class="form-group">
          <label for="jadwal_id">ID Jadwal BNSP</label>
          <input type="number" name="jadwal_id" id="jadwal_id" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="asesor_id">ID Asesor BNSP</label>
          <input type="number" name="asesor_id" id="asesor_id" class="form-control" required>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>


    </form>
  </div>
</div>

{{-- Generate Data Sertifikat --}}
<form class="my-form" action="{{ route('storeProyek', ['id_izin' => $id_izin]) }}" method="POST"
  enctype="multipart/form-data">
  <div class="forms">



























    <div id="pdfModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <iframe id="pdfViewer" src="" width="100%" height="500px"></iframe>
      </div>
    </div>

    <script>
      function openModal(pdfUrl) {
        var modal = document.getElementById('pdfModal');
        var pdfViewer = document.getElementById('pdfViewer');
        pdfViewer.src = pdfUrl;
        modal.style.display = 'block';
      }

      function closeModal() {
        var modal = document.getElementById('pdfModal');
        var pdfViewer = document.getElementById('pdfViewer');
        pdfViewer.src = '';
        modal.style.display = 'none';
      }
    </script>
