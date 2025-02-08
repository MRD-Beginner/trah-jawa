<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="flex flex-col mt-10 items-center">
        <button data-bs-toggle="modal" data-bs-target="#AddModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ms15">Tambah</button>
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
                    @foreach ($trees as $tree)
                <tr class="border-separate border border-[#CFAD82] bg-[#FFE28B]">
                    <td class="py-3 px-4 text-center border border-[#CFAD82]">1</td>
                    <td class="py-3 px-4 border border-[#CFAD82] text-center">{{$tree->tree_name}}</td>
                    <td class="py-3 px-4 border border-[#CFAD82] text-center">{{ $tree->description }}</td>
                    <td class="py-3 px-8 border border-[#CFAD82] flex gap-5">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Detail</button>

                        
                            <button>
                                <button class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#EditModal-{{ $tree->id }}">
                                    Edit
                                </button>
                            </button>
                            
                            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                            
                            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Share</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk Simpan ke Laravel -->
                    <form action="{{ route('trees.store') }}" method="POST">
                        @csrf <!-- Token keamanan Laravel -->
                        
                        <div class="mb-3">
                            <label for="tree_name" class="form-label">Nama Trah</label>
                            <input type="text" class="form-control" id="tree_name" name="tree_name" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal-{{ $tree->id }}" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('trees.update', $tree->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="tree_name" class="form-label">Nama Trah</label>
                            <input type="text" class="form-control" id="tree_name" name="tree_name" value="{{ $tree->tree_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description">{{ $tree->description }}</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
