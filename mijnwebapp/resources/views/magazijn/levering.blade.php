<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leverings Informatie</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow mb-6 leading-relaxed">
                <p><strong>Naam Leverancier:</strong> {{ $leverancier->LeverancierNaam ?? '-' }}</p>
                <p><strong>Contactpersoon leverancier:</strong> {{ $leverancier->ContactPersoon ?? '-' }}</p>
                <p><strong>Leverancier nummer:</strong> {{ $leverancier->LeverancierNummer ?? '-' }}</p>
                <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel ?? '-' }}</p>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Naam Product</th>
                            <th class="border border-gray-300 px-4 py-2">Datum laatste levering</th>
                            <th class="border border-gray-300 px-4 py-2">Aantal</th>
                            <th class="border border-gray-300 px-4 py-2">Eerstvolgende levering</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leveringen as $l)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $l->ProductNaam }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ date('d-m-Y', strtotime($l->DatumLevering)) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $l->Aantal }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $l->DatumEerstVolgendeLevering ? date('d-m-Y', strtotime($l->DatumEerstVolgendeLevering)) : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>