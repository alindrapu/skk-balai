<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Pencatatan') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listTable').DataTable();
        });
    </script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg overflow-x-auto">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table id="listTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="w-[250px]">Nama</th>
                                <th>ID Izin</th>
                                <th>Klasifikasi</th>
                                <th>Subklasifikasi</th>
                                <th>Kualifikasi</th>
                                <th>ID Jadwal Asesmen BNSP</th>
                                <th>No. Blanko</th>
                                <th>Preview Sertifikat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPencatatan as $pencatatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pencatatan->nama }}</td>
                                    <td>{{ $pencatatan->id_izin }}</td>
                                    <td>{{ $pencatatan->id_klasifikasi }}</td>
                                    <td>{{ $pencatatan->subklasifikasi }}</td>
                                    <td>{{ $pencatatan->kualifikasi }}</td>
                                    <td>{{ $pencatatan->jadwal_id }}</td>
                                    <td>
                                        @if ($pencatatan->nomor_blangko_bnsp == '')
                                            <button class="p-2 bg-yellow-500 rounded">Get Blanko</button>
                                        @else
                                            {{ $pencatatan->nomor_blangko_bnsp }}
                                        @endif
                                    </td>
                                    <td><button class="p-2 bg-blue-400 rounded">Preview Sertifikat</button></td>
                                    <td><button class="p-2 bg-green-600 rounded">Menunggu Blanko</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
