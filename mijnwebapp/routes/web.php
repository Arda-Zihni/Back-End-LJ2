<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Homepage / Inloggen
Route::get('/', function () { return redirect('/login'); });
Route::get('/login', function () { return view('auth.custom_login'); })->name('login');
Route::post('/login', function () { return redirect('/leveranciers'); });

// USER STORY 1: Overzicht Leveranciers (Wireframe-01)
Route::get('/leveranciers', function () {
    $leveranciers = DB::table('JaminMagazijn.Leverancier as L')
        ->leftJoin('JaminMagazijn.ProductPerLeverancier as PPL', 'L.Id', '=', 'PPL.LeverancierId')
        ->select(
            'L.Id',
            'L.Naam',
            'L.ContactPersoon',
            'L.LeverancierNummer',
            'L.Mobiel',
            DB::raw('COUNT(DISTINCT PPL.ProductId) as AantalProducten')
        )
        ->groupBy('L.Id', 'L.Naam', 'L.ContactPersoon', 'L.LeverancierNummer', 'L.Mobiel')
        ->orderBy('AantalProducten', 'desc')
        ->get();

    return view('leverancier.index', compact('leveranciers'));
})->name('leverancier.index');

// USER STORY 1 & 2: Geleverde Producten (Wireframe-02 & Wireframe-03)
Route::get('/leverancier/{id}/producten', function ($id) {
    $leverancier = DB::table('JaminMagazijn.Leverancier')->where('Id', $id)->first();

    $producten = DB::table('JaminMagazijn.ProductPerLeverancier as PPL')
        ->join('JaminMagazijn.Product as P', 'PPL.ProductId', '=', 'P.Id')
        ->leftJoin('JaminMagazijn.Magazijn as M', 'P.Id', '=', 'M.ProductId')
        ->where('PPL.LeverancierId', $id)
        ->select(
            'P.Id as ProductId',
            'P.Naam as ProductNaam',
            'P.IsActief',
            'M.AantalAanwezig',
            'M.VerpakkingsEenheid',
            DB::raw('MAX(PPL.DatumLevering) as LaatsteLevering')
        )
        ->groupBy('P.Id', 'P.Naam', 'P.IsActief', 'M.AantalAanwezig', 'M.VerpakkingsEenheid')
        ->orderBy('M.AantalAanwezig', 'desc')
        ->get();

    if ($producten->isEmpty()) {
        return view('leverancier.geen_producten', compact('leverancier'));
    }

    return view('leverancier.producten', compact('leverancier', 'producten'));
})->name('leverancier.producten');

// USER STORY 2: Formulier Levering Product (Wireframe-04)
Route::get('/leverancier/{leverancierId}/product/{productId}/levering', function ($leverancierId, $productId) {
    $leverancier = DB::table('JaminMagazijn.Leverancier')->where('Id', $leverancierId)->first();
    $product = DB::table('JaminMagazijn.Product')->where('Id', $productId)->first();

    return view('leverancier.levering_form', compact('leverancier', 'product'));
})->name('leverancier.levering_form');

// USER STORY 2: Opslaan Levering Product + IsActief Check
Route::post('/leverancier/{leverancierId}/product/{productId}/levering', function (Request $request, $leverancierId, $productId) {
    $product = DB::table('JaminMagazijn.Product')->where('Id', $productId)->first();
    $leverancier = DB::table('JaminMagazijn.Leverancier')->where('Id', $leverancierId)->first();

    // Scenario 02: Product niet meer actief
    if (isset($product->IsActief) && !$product->IsActief) {
        $foutmelding = "Het product {$product->Naam} van de leverancier {$leverancier->Naam} wordt niet meer geproduceerd";
        return view('leverancier.levering_form', compact('leverancier', 'product', 'foutmelding'));
    }

    $aantal = $request->input('aantal_eenheden');
    $eerstvolgendeDatum = $request->input('datum_eerstvolgende');

    // 1. Voeg nieuwe levering toe
    DB::table('JaminMagazijn.ProductPerLeverancier')->insert([
        'LeverancierId' => $leverancierId,
        'ProductId' => $productId,
        'DatumLevering' => now(),
        'Aantal' => $aantal,
        'DatumEerstVolgendeLevering' => $eerstvolgendeDatum,
    ]);

    // 2. Update Magazijn voorraad & DatumGewijzigd
    DB::table('JaminMagazijn.Magazijn')
        ->where('ProductId', $productId)
        ->increment('AantalAanwezig', $aantal);

    return redirect()->route('leverancier.producten', $leverancierId);
})->name('leverancier.levering_store');