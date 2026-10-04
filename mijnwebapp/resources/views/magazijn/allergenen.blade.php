<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Overzicht Allergenen</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow mb-6 leading-relaxed">
                <p><strong>Naam:</strong> {{ $product->Naam }}</p>
                <p><strong>Barcode:</strong> {{ $product->Barcode }}</p>
            </div>

            <div class="bg-white p-6 rounded shadow mb-6">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Naam</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Omschrijving</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allergenen as $allergeen)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $allergeen->Naam }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $allergeen->Omschrijving }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('magazijn.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug naar overzicht</a>
        </div>
    </div>
</x-app-layout>
