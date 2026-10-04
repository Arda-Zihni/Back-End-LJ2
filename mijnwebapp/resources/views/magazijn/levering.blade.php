<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leveringsinformatie</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow mb-6 leading-relaxed">
                <p><strong>Naam leverancier:</strong> {{ $leverancier->LeverancierNaam ?? 'Onbekend' }}</p>
                <p><strong>Contactpersoon:</strong> {{ $leverancier->ContactPersoon ?? 'Onbekend' }}</p>
                <p><strong>Leveranciernummer:</strong> {{ $leverancier->LeverancierNummer ?? 'Onbekend' }}</p>
                <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel ?? 'Onbekend' }}</p>
            </div>

            <div class="bg-white p-6 rounded shadow mb-6">
                <table class="min-w-full border-collapse border border-gray-300 text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Naam Product</th>
                            <th class="border border-gray-300 px-4 py-2">Datum laatste levering</th>
                            <th class="border border-gray-300 px-4 py-2">Aantal</th>
                            <th class="border border-gray-300 px-4 py-2">Eerstvolgende levering</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leveringen as $levering)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $levering->ProductNaam }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $levering->DatumLevering ? date('d-m-Y', strtotime($levering->DatumLevering)) : '-' }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $levering->Aantal }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $levering->DatumEerstVolgendeLevering ? date('d-m-Y', strtotime($levering->DatumEerstVolgendeLevering)) : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('magazijn.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug naar overzicht</a>
        </div>
    </div>
</x-app-layout>
