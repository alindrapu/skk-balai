{{-- @php
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
  
@endphp --}}


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

  .logo-kecil {
    width: min-content;
    width: 90px;
  }

  .header {
    display: flex;
    align-items: center;
    height: max-content;
    flex-wrap: wrap;
    width: max-content;
    padding-bottom: 30px;
    column-gap: 47px;
    margin-left: 90px;
  }

  .isi {
    display: flex;
    align-items: flex-start;
    justify-content: space-evenly;
  }

  .sidebar {
    width: 265px;
    background-color: #f2f2f2;
    padding: 20px;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    text-decoration: none;
    color: #333;
}

.sidebar ul li a:hover {
    color: #3F72AF;
    font-weight: bold;
}
</style>


<div class="sidebar">
  <ul>
      <li><a href="/">Get Data</a></li>
      <li><a href="/data">Verifikasi</a></li>
      <li><a href="/idBuatJadwal">Buat Jadwal</a></li>
  </ul>
</div>

<div class="container">
    <div class="jadwal">
      <h1>INPUT JADWAL</h1>
  
      <form class="my-form" action="{{ route('storeJadwal') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="forms">
          <input type="hidden" name="id_izin" value={{ $id_izin }}>
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