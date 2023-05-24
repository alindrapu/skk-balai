<h2>Personal Data</h2>
<h3>Enter ID Izin</h3>
<form method="POST" action="{{ route('showData') }}">
  @csrf
  <label for="id_izin">ID Izin: </label>
  <input type="text" name="id_izin" id="id_izin" required>
  <button type="submit">Submit</button>
