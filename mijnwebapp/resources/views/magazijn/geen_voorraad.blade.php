<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leveringsinformatie</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow mb-6 leading-relaxed">
                <p><strong>Naam product:</strong> {{ $product->Naam ?? '' }}</p>
                <p><strong>Barcode:</strong> {{ $product->Barcode ?? '' }}</p>
                <p><strong>Naam leverancier:</strong> {{ $leverancier->LeverancierNaam ?? 'Basset' }}</p>
                <p><strong>Contactpersoon leverancier:</strong> {{ $leverancier->ContactPersoon ?? 'Joyce Stelterberg' }}</p>
                <p><strong>Leverancier nummer:</strong> {{ $leverancier->LeverancierNummer ?? 'L1023845773' }}</p>
                <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel ?? '06-48293823' }}</p>
            </div>

            <div class="bg-red-50 border border-red-300 text-[#842029] p-6 rounded shadow text-center">
                <p class="font-bold text-lg">Er is van dit product op dit moment geen voorraad aanwezig.</p>
                <p class="mt-2 text-base">De verwachte eerstvolgende levering is: <span class="font-bold">{{ $verwachteDatum }}</span></p>
                <p class="text-sm text-red-700 mt-2">U wordt over 4 seconden automatisch teruggestuurd naar het overzicht...</p>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => window.location.assign(@js(route('magazijn.index'))), 4000);
    </script>
</x-app-layout>
