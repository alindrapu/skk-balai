<!-- getData.blade.php -->
<html>

<head>
  <title>Get Data</title>
</head>
<style>
  body{
    background-color: #DBE2EF;
  }
  *{
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;
  }
  .container {
    width: 100%;
    height: 100%;
    display: flex;
    align-content: center;
  }
  .form-id{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  .verifikasi-but{
    align-items: flex-start;
    margin-top: 30px;
  }
  
 .kotak{
  width: 40%;
  height: 60%;
  background: #3F72AF;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  flex-wrap: wrap;
  align-content: center;
  position: relative;
  margin: auto;
 }
 
.kotak:before {
    content: "";
    z-index: -1;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: linear-gradient(14deg, #25234e 0%, #0400ff 100% );
    transform: translate3d(0px, 20px, 0) scale(0.95);
    filter: blur(20px);
    opacity: var(0.7);
    transition: opacity 0.3s;
    border-radius: inherit;
}

/* 
* Prevents issues when the parent creates a 
* stacking context. (For example, using the transform
* property )
*/
.kotak::after {
    content: "";
    z-index: -1;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: inherit;
    border-radius: inherit;
}

a {
  text-decoration: none;
  color: black;
}

input{
  border-radius: 1%;
  height: 40px;
  width: 290px;
  border-color: white;
  background-color: white;
  border-radius: 5px;
  color: black;
}
button{
  border-color: white;
  border-radius: 0%;
  padding: 10px;
  background: white;
  border-radius: 5px;
  height: 40px;
}
h1{
  color: white;
  margin: auto;
}
.pembagi{
  display: flex;
  justify-content: center;
  width: 100%;
}
/* CSS */
.button-28 {
  appearance: none;
  background-color: white;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #3B3B3B;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  
  line-height: normal;
  margin: 0;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  will-change: transform;
}

.button-28:disabled {
  pointer-events: none;
}

.button-28:hover {
  color: #fff;
  background-color: #1A1A1A;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}

.button-28:active {
  box-shadow: none;
  transform: translateY(0);
}
a:hover{
  color: white;
}
img{
  width: 350px;
  padding-bottom: 40px;
}
</style>

<body>
  @if (session('success'))
    <div>{{ session('success') }}</div>
  @endif

<div class="container">
<div class="kotak">
  <div class="logo">
    <img src="https://lspgatensi.id/images/logo-white.webp" alt="Logo">
  </div>
<div class="form-id">
  
  <form action="{{ route('storeData') }}" method="POST">
    @csrf
    <input class="input" type="text" name="id_izin" placeholder="ID Izin">
    <button type="submit">Get Data</button>
  </form>
  <br>
</div>
<div class="pembagi">
  <h1>ATAU</h1>
</div>
  
<div class="verifikasi-but">
  <button class="button-28"><a href="/data">Verifikasi Permohonan</button>
  </div>
  </div>
  </div>
</body>

</html>
