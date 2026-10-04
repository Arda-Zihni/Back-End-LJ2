<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Overzicht Allergenen</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow mb-6 leading-relaxed">
                <p><strong>Naam:</strong> {{ $product->Naam ?? '' }}</p>
                <p><strong>Barcode:</strong> {{ $product->Barcode ?? '' }}</p>
            </div>
            <div class="bg-red-50 border border-red-300 text-[#842029] p-6 rounded shadow text-center">
                <p class="font-bold text-lg">In dit product zitten geen allergenen</p>
                <p class="text-sm text-red-700 mt-2">U wordt over 4 seconden automatisch teruggestuurd naar het overzicht...</p>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => window.location.assign(@js(route('magazijn.index'))), 4000);
    </script>
</x-app-layout>
