<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="flex flex-col mt-10 items-center">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ms15 sel">Tambah</button>
        <div class="overflow-x-auto items-center m-5 bg-[#FEEEBD] p-5 rounded-md">
            <table class="bg-white shadow-md">
                <thead class="bg-[#D54425] ">
                <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-center text-white border border-orange-300">No</th>
                    <th class="py-3 px-20 text-center text-white border border-orange-300">Nama Trah</th>
                    <th class="py-3 px-12 text-center text-white border border-orange-300">Jumlah keturunan</th>
                    <th class="py-3 px-4 text-center text-white border border-orange-300">Aksi</th>
                </tr>
                </thead>
                <tbody class="text-blue-gray-900">
                <tr class="border-separate border border-[#CFAD82] bg-[#FFE28B]">
                    <td class="py-3 px-4 text-center border border-[#CFAD82]">1</td>
                    <td class="py-3 px-4 border border-[#CFAD82] text-center">Keluarga Dalfi</td>
                    <td class="py-3 px-4 border border-[#CFAD82] text-center">100</td>
                    <td class="py-3 px-8 border border-[#CFAD82] flex gap-5">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Detail</button>

                        <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</button>

                        <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>

                        <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Share</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
