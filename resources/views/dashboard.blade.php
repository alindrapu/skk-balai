<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('List Permohonan') }}
    </h2>
  </x-slot>



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          Welcome, {{ Auth::user()->name }}!
        </div>
        {{-- <button type="submit" {{ action('ListPermohonanController', 'getListPermohonan') }}></button> --}}
      </div>
      <table class="table-auto">
        <thead>
          <tr>No</tr>
          <tr>ID Izin</tr>
          <tr>Nama</tr>
          <tr>NIK</tr>
          <tr>Created</tr>
          <tr>Updated</tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>
