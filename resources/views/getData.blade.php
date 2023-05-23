<!-- getData.blade.php -->
<html>

<head>
  <title>Get Data</title>
</head>

<body>
  @if (session('success'))
    <div>{{ session('success') }}</div>
  @endif

  <form action="{{ route('storeData') }}" method="POST">
    @csrf
    <input type="text" name="id_izin" placeholder="Enter ID Izin">
    <button type="submit">Get Data</button>
  </form>
</body>

</html>
