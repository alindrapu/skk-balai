<!-- getData.blade.php -->
<html>

<head>
  <title>Get Data</title>
</head>
<style>
  body{
    background-color: #DBE2EF;
    overflow: hidden;
  }

  *{
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;
  }

  .container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%; 
  }

  .heightcontainer{
    margin: auto;
  }

  .title{
    width: 100%;
    display: flex;
    justify-content: center;
  }

  .form{
    height: min-content;
  }

  h1{
    color: white;
  }

  label{
    color: white;
  }
 
  .input{
    padding-top: 20px;
  }
 
  input{
    height: 40px;
    width: 290px;
    border-color: white;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    margin-right: 10px;
    outline: none;
    background: transparent;
    padding: 5px;
    border-radius: 0;
  }

  input::placeholder {
    color: white;
  }

  button{
   border-color: white;
   border-radius: 0%;
   padding: 10px;
   background: white;
   border-radius: 5px;
  }

 .sidebar {
    width: 265px;
    /* background-color: #f2f2f2; */
    background-color: white;
    padding: 20px;
    height: 100vh;
    position: fixed;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    top: 0;
    left: 0;
    z-index: 1;
  }

  .logo{
    display: flex;
    justify-content: center;
    width: 100%;
  }

  img.lsp{
    width: 247px;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  .sidebar ul li {
      margin-top: 10px;
      margin-bottom: 10px;
  }

  .sidebar ul li a {
    text-decoration: none;
    color: #3F72AF;
    font-size: larger;
    transition: font-weight 0.1s ease-out;
  }

  .sidebar ul li a:hover {
    color: #3F72AF;
    font-weight: bold;
  }

  .kotak{
    width: 90%;
    height: 100%;
    background: #3F72AF;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    align-content: center;
    position: absolute;
    right: 0;
    top: 0;
    margin: auto;
  }
/* 
  .menus{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }
  li{
    width: 100%;
  } */
        
</style>

<body>
  @if (session('success'))
    <div>{{ session('success') }}</div>
  @endif

  <div class="sidebar">
    <div class="logo">
      <img src="https://lspgatensi.id/images/logo-color.webp" alt="Logo" class="lsp">
    </div>
    <ul class="menus">
        {{-- <li><a href="/"><p>Get Data</p></a></li>
        <li><a href="/data"><p>Verifikasi</p></a></li>
        <li><a href="/idBuatJadwal"><p>Buat Jadwal</p></a></li> --}}
        <li><a href="/">Get Data</a></li>
      <li><a href="/data">Verifikasi</a></li>
      <li><a href="/idBuatJadwal">Buat Jadwal</a></li>
    </ul>
  </div>

<div class="kotak">

  
  <div class="title">
    <h1>GET DATA</h1>
  </div>
<div class="form-id">
  
  <form action="{{ route('storeData') }}" method="POST">
    @csrf
    <div class="input">
      <input type="text" name="id_izin" placeholder="ID Izin">
      <button type="submit">Get Data</button>
    </div>
  <br>
</div>
{{-- <div class="pembagi">
  <h1>ATAU</h1>
</div> --}}
  
{{-- <div class="verifikasi-but">
  <a href="/data">
    <button class="button-28">Verifikasi Permohonan</button>
  </a>
  </div> --}}
  
  </div>
</body>

</html>
