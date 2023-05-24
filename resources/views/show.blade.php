<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  img {
    max-width: 350px;
    object-fit: cover;
    border-radius: 5px;
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
</style>


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
        <td>{{ $personal->propinsi }}</td>
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
        <td><img src="{{ $personal->pas_foto }}" alt="Pas Foto" width="150" height="200"></td>
      </tr>
    @endforeach

  </tbody>
</table>


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
