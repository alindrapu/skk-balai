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
  height: min-content;
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
  border-radius: 1%;
  height: 40px;
  width: 290px;
  border-color: white;
  background-color: white;
  border-radius: 5px;
  color: black;
  margin: auto;
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
        
</style>

<div class="sidebar">
  <ul>
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
        <label for="id_izin">ID Izin: </label><br>
        <div class="input">
          <input type="text" name="id_izin" id="id_izin" required>
          <button type="submit">Submit</button>
        </div>
    </div>
  </div>