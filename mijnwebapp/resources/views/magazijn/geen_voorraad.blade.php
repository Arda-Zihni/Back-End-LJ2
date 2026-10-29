<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">
    <title>Leveringsinformatie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Leveringsinformatie</h1>

        <div class="bg-white p-6 rounded-lg shadow mb-6 space-y-2">
            <p><span class="font-bold">Naam product:</span> {{ $product->Naam ?? '' }}</p>
            <p><span class="font-bold">Barcode:</span> {{ $product->Barcode ?? '' }}</p>
            <p><span class="font-bold">Naam leverancier:</span> {{ $leverancier->LeverancierNaam ?? 'Basset' }}</p>
            <p><span class="font-bold">Contactpersoon leverancier:</span> {{ $leverancier->ContactPersoon ?? 'Joyce Stelterberg' }}</p>
            <p><span class="font-bold">Leverancier nummer:</span> {{ $leverancier->LeverancierNummer ?? 'L1023845773' }}</p>
            <p><span class="font-bold">Mobiel:</span> {{ $leverancier->Mobiel ?? '06-48293823' }}</p>
        </div>

        <div class="bg-red-50 border border-red-300 text-[#842029] p-6 rounded shadow text-center">
            <p class="font-bold text-lg">Er is van dit product op dit moment geen voorraad aanwezig.</p>
            <p class="mt-2 text-base">De verwachte eerstvolgende levering is: <span class="font-bold">{{ $verwachteDatum }}</span></p>
            <p class="text-sm text-red-700 mt-2">U wordt over 4 seconden automatisch teruggestuurd naar het overzicht...</p>
        </div>
    </div>
</body>
</html>
