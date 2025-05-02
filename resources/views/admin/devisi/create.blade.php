<!-- Modal Divisi -->
<div x-show="openDivisi" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="openDivisi = false" class="w-full max-w-xl p-6 bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-xl font-semibold text-gray-800">Tambah Data Divisi</h2>



        <form action="{{route('devisi.store')}}" method="POST">
            @csrf
            <!-- Nama Divisi -->
            <div class="mb-4">
                <label for="nama_divisi" class="block mb-1 text-sm font-medium text-gray-700">Nama Divisi</label>
                <input
                    type="text"
                    id="nama_divisi"
                    name="nama_divisi"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama divisi"
                    required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 text-sm font-medium text-gray-700">Deskripsi</label>
                <input
                    type="text"
                    id="deskripsi"
                    name="deskripsi"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan deskripsi"
                    required>
            </div>

            <!-- Aksi -->
            <div class="flex justify-end space-x-2">
                <button type="button"
                        @click="openDivisi = false"
                        class="px-4 py-2 text-white bg-gray-400 rounded hover:bg-gray-500">
                    Batal
                </button>
                <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
