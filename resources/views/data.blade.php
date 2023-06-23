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
    border-radius: 5px;
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

  .navbar {
        width: 100%;
        /* background-color: #f2f2f2; */
        background-color: white;
        padding: 20px;
        height: 10vh;
        position: fixed;
        display: flex;
        justify-content: space-around;
        top: 0;
        left: 0;
        gap: 20px;
        z-index: 1;
    }

    .logo {
        display: flex;
        justify-content: center;
    }

    img.lsp {
        width: 247px;
    }

    .navbar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .navbar ul li {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .navbar ul li a {
        text-decoration: none;
        color: #3F72AF;
        font-size: larger;
        transition: font-weight 0.1s ease-out;
    }

    .navbar ul li a:hover {
        color: #3F72AF;
        font-weight: bold;
    }

    .kotak {
        width: 100%;
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
    .menus{
        display: flex;
        gap: 20px;
        align-items: center;
    } 
</style>

<div class="navbar">
  <div class="logo">
    <img src="https://lspgatensi.id/images/logo-color.webp" alt="Logo" class="lsp">
  </div>
  <ul class="menus">
      <li><a href="/">Get Data</a></li>
      <li><a href="/data">Verifikasi</a></li>
      <li><a href="/idBuatJadwal">Buat Jadwal</a></li>
  </ul>
</div>


  <div class="kotak">
    <div class="title">
      <h1>VERIFIKASI</h1>
    </div>
    <div class="form">
      <form method="POST" action="{{ route('showData') }}">
        @csrf
        <!-- <label for="id_izin">ID Izin: </label><br> -->
        <div class="input">
          <input type="text" name="id_izin" placeholder="ID Izin" id="id_izin" required>
          <button type="submit">Verifikasi</button>
        </div>
    </div>
  </div>