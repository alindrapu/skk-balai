<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SURAT TUGAS') }}
        </h2>
    </x-slot>
    <div class="flex flex-wrap justify-center h-screen w-screen items-center">
        <form class="flex justify-center" action="{{ route('surat-tugas') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div
                class="flex flex-wrap justify-center bg-gray-800 border-slate-600 shadow-md w-2/5 rounded px-8 pt-6 pb-8 mb-4 gap-5">
                
                <div class="flex justify-between w-full">
                    <label class="text-white" for="jadwal_id">ID Jadwal BNSP</label>
                    <input type="number" name="jadwal_id" id="jadwal_id"
                        class="max-w-md form-control min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6 h-10 md:w-96"
                        required>
                </div>
                <div class="flex justify-between w-full">
                    <label class="text-white" for="asesor_id">ID Asesor BNSP</label>
                    <input type="number" name="asesor_id" id="asesor_id"
                        class="max-w-md form-control min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6 h-10 md:w-96"
                        required>
                </div>
                <div class="flex justify-between w-full">
                    <label class="text-white" for="skema_id">SURAT TUGAS</label>
                    <input type="file" name="surat_tugas" id="surat_tugas"
                        class="max-w-md form-control min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6 h-10 md:w-96"
                        required>
                </div>
                <div class="w-30">
                    <button type="submit"
                        class="flex-none h-10 rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Submit</button>
                </div>
            </div>


        </form>
    </div>
    </div>
</x-app-layout>