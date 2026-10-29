<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    @if(isset($foutmelding))
        <meta http-equiv="refresh" content="4;url={{ route('leverancier.producten', $leverancier->Id) }}">
    @endif
    <title>Levering Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Levering Product</h1>

        <div class="bg-white p-6 rounded-lg shadow mb-6 space-y-1">
            <p><span class="font-bold">Product:</span> {{ $product->Naam }}</p>
            <p><span class="font-bold">Leverancier:</span> {{ $leverancier->Naam }}</p>
            <p><span class="font-bold">Contactpersoon:</span> {{ $leverancier->ContactPersoon }}</p>
            <p><span class="font-bold">Mobiel:</span> {{ $leverancier->Mobiel }}</p>
        </div>

        @if(isset($foutmelding))
            <div class="bg-red-50 border border-red-300 text-red-700 p-6 rounded shadow text-center mb-6">
                <p class="font-bold text-lg">{{ $foutmelding }}</p>
                <p class="text-sm text-red-600 mt-2">U wordt over 4 seconden automatisch teruggestuurd...</p>
            </div>
        @else
            <form method="POST" action="{{ route('leverancier.levering_store', ['leverancierId' => $leverancier->Id, 'productId' => $product->Id]) }}" class="bg-white p-6 rounded-lg shadow mb-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Aantal producteenheden</label>
                    <input type="number" name="aantal_eenheden" required class="w-full border border-gray-300 p-2 rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Datum eerstvolgende levering</label>
                    <input type="date" name="datum_eerstvolgende" required class="w-full border border-gray-300 p-2 rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 font-bold w-full">Sla op</button>
            </form>
        @endif

        <div class="flex justify-between">
            <a href="{{ route('leverancier.producten', $leverancier->Id) }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Terug</a>
            <a href="{{ route('leverancier.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Home</a>
        </div>
    </div>
</body>
</html>