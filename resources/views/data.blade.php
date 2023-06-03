<style>
  body{
    /* background: rgb(131,58,180);
    background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(192,44,105,1) 49%, rgba(253,29,29,1) 100%); */
    background-color: #DBE2EF;
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
 .kotak{
  width: 50%;
  height: 60%;
  background: #3F72AF;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  align-content: center;
  position: relative;
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


        
</style>

<div class="container">
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
</div>

