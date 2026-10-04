<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Magazijn Jamin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Overzicht Magazijn Jamin</h1>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 text-center">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase tracking-wider">Barcode</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase tracking-wider">Naam</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase tracking-wider">VerpakkingsEenheid</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase tracking-wider">AantalAanwezig</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase tracking-wider">Allergenen Info</th>
                        <th class="px-6 py-3 text-xs font-bold text-gray-700 uppercase tracking-wider">Leverantie Info</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($producten as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->Barcode }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->Naam }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($product->VerpakkingsEenheid, 1) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->AantalAanwezig ?? 0 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('magazijn.allergenen', $product->ProductId) }}" class="text-red-500 hover:text-red-700 text-lg font-bold">❌</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('magazijn.levering', $product->ProductId) }}" class="text-blue-500 hover:text-blue-700 text-xl font-bold">?</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>