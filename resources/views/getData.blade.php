<!-- getData.blade.php -->
{{-- <html>

<head>
    <title>Get Data</title>
</head> --}}
{{-- <style>
    body {
        background-color: #DBE2EF;
        overflow: hidden;
    }

    * {
        font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
    }

    .heightcontainer {
        margin: auto;
    }

    .title {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .form {
        height: min-content;
    }

    h1 {
        color: white;
    }

    label {
        color: white;
    }

    .input {
        padding-top: 20px;
    }

    input {
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

    button {
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
</style> --}}

{{-- <body> --}}
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif
<x-app-layout>
    {{-- <div class="navbar">
        <div class="logo">
            <img src="https://lspgatensi.id/images/logo-color.webp" alt="Logo" class="lsp">
        </div>
        <ul class="menus">
           
            <li><a href="/">Get Data</a></li>
            <li><a href="/data">Verifikasi</a></li>
            <li><a href="/idBuatJadwal">Buat Jadwal</a></li>
        </ul>
    </div> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Get Data') }}
        </h2>
    </x-slot>
    {{-- <div class="kotak"> --}}
    <div class=" flex justify-center h-screen w-screen items-center">
        <div class="form-id ">
            <form action="{{ route('storeData') }}" method="POST">
                @csrf
                <div
                    class="md:flex sm:justify-center bg-gray-800 border-slate-600  shadow-md rounded px-8 pt-6 pb-8 mb-4 gap-5">
                    <input
                        class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6 h-10 md:w-96"
                        type="text" name="id_izin" placeholder="ID Izin">
                    <button
                        class="flex-none h-10 rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                        type="submit">Get Data</button>
                </div>
                <br>
        </div>
    </div>
    {{-- <div class="pembagi">
  <h1>ATAU</h1>
</div> --}}

    {{-- <div class="verifikasi-but">
  <a href="/data">
    <button class="button-28">Verifikasi Permohonan</button>
  </a>
  </div> --}}

    {{-- </div> --}}
</x-app-layout>
{{-- </body>

</html> --}}
