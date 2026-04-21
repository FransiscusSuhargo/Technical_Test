<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Suku Cadang') }}
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
                <form method="GET" action="{{ route('bikeparts.index') }}" class="p-6">
                    <input type="text" name="search" placeholder="Search bike parts..."
                        value="{{ request('search') }}" placeholder="Cari suku cadang disini"
                        class="border rounded px-4 py-2 w-full">
                    <select name="category_id">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="brand_id">
                        <option value="">All Brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}"
                                {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
                    <a href="{{ route('bikeparts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Suku Cadang</a>
                </form>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if ($bikeParts->isEmpty())
                        <p class="p-6 text-gray-900">No bike parts found.</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Category</th>
                                    <th class="border px-4 py-2">Brand</th>
                                    <th class="border px-4 py-2">Stok</th>
                                    <th class="border px-4 py-2">Harga</th>
                                    <th class="border px-4 py-2">Detail</th>
                                    <th class="border px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bikeParts as $bikepart)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $bikepart->name }}</td>
                                        <td class="border px-4 py-2">{{ $bikepart->category->name }}</td>
                                        <td class="border px-4 py-2">{{ $bikepart->brand->name }}</td>
                                        <td class="border px-4 py-2">{{ $bikepart->stok }}</td>
                                        <td class="border px-4 py-2">{{ $bikepart->harga }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('bikeparts.show', $bikepart->id) }}"
                                                class="bg-green-500 text-white px-4 py-2 rounded">Detail</a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('bikeparts.destroy', $bikepart) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this bike part?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
