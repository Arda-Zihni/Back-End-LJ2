<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Allergenen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Overzicht Allergenen</h1>
        
        <div class="bg-white p-6 rounded-lg shadow mb-6 space-y-2">
            <p><strong>Naam:</strong> {{ $product->Naam }}</p>
            <p><strong>Barcode:</strong> {{ $product->Barcode }}</p>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Naam</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Omschrijving</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($allergenen as $allergeen)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $allergeen->Naam }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $allergeen->Omschrijving }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('magazijn.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug naar overzicht</a>
    </div>
</body>
</html>