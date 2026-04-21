<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Stok') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('stockhistories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        Nama Suku Cadang: <strong>{{ $bikePart->name }}</strong>
                    </div>
                     <div class="mb-4">
                        Stok Suku Cadang Sekarang: <strong>{{ $bikePart->stok }}</strong>
                    </div>
                    <input type="hidden" name="bike_part_id" value="{{ $bikePart->id }}">
                    <div class="mb-4">
                        <label for="change" class="block text-gray-700 font-bold mb-2">Perubahan Stok:</label>
                        <input type="number" name="quantity" id="change" class="form-input w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 font-bold mb-2">Tipe :</label>
                        <select name="type" id="type" class="form-select w-full" required>
                            <option value="in">Tambah Stok</option>
                            <option value="out">Kurangi Stok</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Catatan :</label>
                        <textarea name="note" id="note" class="form-textarea w-full"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
