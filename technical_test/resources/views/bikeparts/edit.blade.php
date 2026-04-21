<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Suku Cadang') }}
        </h2>
    </x-slot>

    <div class="py-12">
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

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('bikeparts.update', $bikeParts->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" class="form-input w-full" value="{{ $bikeParts->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="brand_id" class="block text-gray-700 font-bold mb-2">Brand:</label>
                            <select name="brand_id" id="brand_id" class="form-select w-full" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $bikeParts->brand_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                          <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 font-bold mb-2">Category:</label>
                            <select name="category_id" id="category_id" class="form-select w-full" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $bikeParts->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="harga" class="block text-gray-700 font-bold mb-2">Harga:</label>
                            <input type="number" name="harga" id="harga" class="form-input w-full" value="{{ $bikeParts->harga }}" required>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
