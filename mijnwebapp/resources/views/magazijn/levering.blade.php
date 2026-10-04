<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Leveringsinformatie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Leveringsinformatie</h1>
        
        <div class="bg-white p-6 rounded-lg shadow mb-6 space-y-2">
            <p><strong>Naam leverancier:</strong> {{ $leverancier->LeverancierNaam ?? 'Onbekend' }}</p>
            <p><strong>Contactpersoon:</strong> {{ $leverancier->ContactPersoon ?? 'Onbekend' }}</p>
            <p><strong>Leveranciernummer:</strong> {{ $leverancier->LeverancierNummer ?? 'Onbekend' }}</p>
            <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel ?? 'Onbekend' }}</p>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <table class="min-w-full divide-y divide-gray-200 text-center">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Naam Product</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Datum Laatste Levering</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Aantal</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase">Eerstvolgende Levering</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($leveringen as $levering)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $levering->ProductNaam }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $levering->DatumLevering ? date('d-m-Y', strtotime($levering->DatumLevering)) : '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $levering->Aantal }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $levering->DatumEerstVolgendeLevering ? date('d-m-Y', strtotime($levering->DatumEerstVolgendeLevering)) : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('magazijn.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug naar overzicht</a>
    </div>
</body>
</html>