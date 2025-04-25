<div x-data="{ openModal: false }" class="p-4 text-center">
    <button @click="openModal = true"
        class="px-6 py-3 font-bold text-gray-700 transition bg-transparent border-2 border-gray-400 text-l hover:border-sky-400 hover:text-sky-400">
        + Divisi
    </button>

    <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="openModal = false"
            class="w-full max-w-md p-6 mx-4 transition-all bg-white rounded-lg shadow-lg"
            x-transition>
            <h2 class="mb-4 text-xl font-semibold">Tambah Divisi</h2>

            <form action="{{ route('devisi.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_divisi" class="block text-sm font-medium text-gray-700">Nama Divisi</label>
                    <input type="text" name="nama_divisi" id="nama_divisi" required
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm"></textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="openModal = false"
                        class="px-4 py-2 text-gray-800 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 text-white rounded bg-sky-500 hover:bg-sky-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
