<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Overzicht Magazijn Jamin</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Barcode</th>
                            <th class="border border-gray-300 px-4 py-2">Naam</th>
                            <th class="border border-gray-300 px-4 py-2">VerpakkingsEenheid</th>
                            <th class="border border-gray-300 px-4 py-2">AantalAanwezig</th>
                            <th class="border border-gray-300 px-4 py-2">Allergenen Info</th>
                            <th class="border border-gray-300 px-4 py-2">Leverantie Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($producten as $p)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $p->Barcode }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $p->Naam }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $p->VerpakkingsEenheid }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $p->AantalAanwezig ?? '0' }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('magazijn.allergenen', $p->ProductId) }}" class="text-red-600 font-bold text-lg">❌</a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('magazijn.levering', $p->ProductId) }}" class="text-blue-600 font-bold text-lg">❓</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>