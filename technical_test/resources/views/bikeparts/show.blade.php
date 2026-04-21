<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Suku Cadang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                <p class="p-6 text-gray-900">
                    <strong>Name:</strong> {{ $bikePart->name }}
                </p>
                <p class="p-6 text-gray-900">
                    <strong>Category:</strong> {{ $bikePart->category->name }}
                </p>
                <p class="p-6 text-gray-900">
                    <strong>Brand:</strong> {{ $bikePart->brand->name }}
                </p>
                <p class="p-6 text-gray-900">
                    <strong>Stok:</strong> {{ $bikePart->stok }}
                </p>
                <p class="p-6 text-gray-900">
                    <strong>Harga:</strong> {{ $bikePart->harga }}
                </p>
                <p>
                    <a href="{{ route('bikeparts.edit', $bikePart->id) }}"
                        class="bg-blue-500 text-white px-4 py-2 m-3 rounded">Edit</a>
                    <a href="{{ route('bikeparts.destroy', $bikePart->id) }}"
                        class="bg-red-500 text-white px-4 py-2 rounded"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this bike part?')) { document.getElementById('delete-form').submit(); }">Delete</a>
                    <a href="{{ route('stockhistories.create', $bikePart->id) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded">Ubah Stok</a>
                </p>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div>
                    <h3 class="p-6 text-gray-900 font-bold">Riwayat Stok:</h3>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Tanggal</th>
                                <th class="py-2">Jumlah Perubahan</th>
                                <th class="py-2">Stok Setelah Perubahan</th>
                                <th class="py-2">Tipe</th>
                                <th class="py-2">Diubah Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bikePart->stockHistories as $history)
                                <tr>
                                    <td class="border px-4 py-2">{{ $history->created_at }}</td>
                                    <td class="border px-4 py-2">{{ $history->quantity }}</td>
                                    <td class="border px-4 py-2">{{ $history->stock_after }}</td>
                                    <td class="border px-4 py-2">{{ $history->type }}</td>
                                    <td class="border px-4 py-2">{{ $history->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
