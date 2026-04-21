<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-semibold mb-4">Stok Suku Cadang per Kategori</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Kategori</th>
                                <th class="py-2 px-4 border-b">Total Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stock as $item)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $item->bike_parts_sum_stok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h2 class="text-lg font-semibold mt-8 mb-4">Top 5 Suku Cadang dengan Stok Terendah</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nama Suku Cadang</th>
                                <th class="py-2 px-4 border-b">Kategori</th>
                                <th class="py-2 px-4 border-b">Merek</th>
                                <th class="py-2 px-4 border-b">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lowStock as $part)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $part->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $part->category->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $part->brand->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $part->stok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
