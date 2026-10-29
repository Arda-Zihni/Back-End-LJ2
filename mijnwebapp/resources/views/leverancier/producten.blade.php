<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Geleverde producten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Geleverde producten</h1>

        <div class="bg-white p-6 rounded-lg shadow mb-6 space-y-1">
            <p><span class="font-bold">Naam leverancier:</span> {{ $leverancier->Naam }}</p>
            <p><span class="font-bold">Contactpersoon:</span> {{ $leverancier->ContactPersoon }}</p>
            <p><span class="font-bold">Leverancier NR:</span> {{ $leverancier->LeverancierNummer }}</p>
            <p><span class="font-bold">Mobiel:</span> {{ $leverancier->Mobiel }}</p>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <table class="min-w-full divide-y divide-gray-200 text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Naam product</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Aantal in Magazijn</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Verpakkingseenheid</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Laatste levering</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase text-center">Nieuwe levering</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($producten as $p)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $p->ProductNaam }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $p->AantalAanwezig ?? 0 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ number_format($p->VerpakkingsEenheid, 1) }} kg</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $p->LaatsteLevering ? date('d-m-Y', strtotime($p->LaatsteLevering)) : '-' }}</td>
                            <td class="px-6 py-4 text-sm font-bold text-center">
                                <a href="{{ route('leverancier.levering_form', ['leverancierId' => $leverancier->Id, 'productId' => $p->ProductId]) }}" class="text-blue-600 text-xl hover:text-blue-800">+</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('leverancier.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Terug</a>
            <a href="{{ route('leverancier.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Home</a>
        </div>
    </div>
</body>
</html>