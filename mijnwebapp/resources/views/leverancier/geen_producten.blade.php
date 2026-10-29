<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url={{ route('leverancier.index') }}">
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

        <div class="bg-red-50 border border-red-300 text-red-700 p-6 rounded shadow text-center mb-6">
            <p class="font-bold text-lg">Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin</p>
            <p class="text-sm text-red-600 mt-2">U wordt over 3 seconden automatisch teruggestuurd...</p>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('leverancier.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Terug</a>
            <a href="{{ route('leverancier.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-300">Home</a>
        </div>
    </div>
</body>
</html>