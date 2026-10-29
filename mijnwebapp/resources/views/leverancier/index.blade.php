<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht leveranciers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Overzicht leveranciers</h1>

        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <table class="min-w-full divide-y divide-gray-200 text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Naam</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Contactpersoon</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Leveranciernummer</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Mobiel</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase text-center">Aantal verschillende producten</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase text-center">Toon producten</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($leveranciers as $l)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $l->Naam }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $l->ContactPersoon }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $l->LeverancierNummer }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $l->Mobiel }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 text-center">{{ $l->AantalProducten }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-center">
                                <a href="{{ route('leverancier.producten', $l->Id) }}" class="text-2xl hover:opacity-75">📦</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <a href="{{ url('/leveranciers') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Home</a>
        </div>
    </div>
</body>
</html>