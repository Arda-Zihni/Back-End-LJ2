<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return redirect('/magazijn');
});

Route::get('/magazijn', function () {
    $producten = DB::table('JaminMagazijn.Magazijn')
        ->join('JaminMagazijn.Product', 'Magazijn.ProductId', '=', 'Product.Id')
        ->select(
            'Product.Id as ProductId',
            'Product.Barcode',
            'Product.Naam',
            'Magazijn.VerpakkingsEenheid',
            'Magazijn.AantalAanwezig'
        )
        ->orderBy('Product.Barcode', 'asc')
        ->get();

    return view('magazijn.index', compact('producten'));
})->name('magazijn.index');

Route::get('/magazijn/levering/{productId}', function ($productId) {
    $magazijn = DB::table('JaminMagazijn.Magazijn')->where('ProductId', $productId)->first();

    $leverancier = DB::table('JaminMagazijn.ProductPerLeverancier')
        ->join('JaminMagazijn.Leverancier', 'ProductPerLeverancier.LeverancierId', '=', 'Leverancier.Id')
        ->where('ProductPerLeverancier.ProductId', $productId)
        ->select(
            'Leverancier.Naam as LeverancierNaam',
            'Leverancier.ContactPersoon',
            'Leverancier.LeverancierNummer',
            'Leverancier.Mobiel'
        )
        ->first();

    // Scenario 02: Geen voorraad aanwezig
    if (!$magazijn || is_null($magazijn->AantalAanwezig) || $magazijn->AantalAanwezig == 0) {
        $levering = DB::table('JaminMagazijn.ProductPerLeverancier')
            ->where('ProductId', $productId)
            ->orderBy('DatumEerstVolgendeLevering', 'asc')
            ->first();

        $verwachteDatum = ($levering && $levering->DatumEerstVolgendeLevering)
            ? date('d-m-Y', strtotime($levering->DatumEerstVolgendeLevering))
            : '30-10-2024';

        return view('magazijn.geen_voorraad', compact('leverancier', 'verwachteDatum'));
    }

    // Scenario 01: Wel voorraad
    $leveringen = DB::table('JaminMagazijn.ProductPerLeverancier')
        ->join('JaminMagazijn.Product', 'ProductPerLeverancier.ProductId', '=', 'Product.Id')
        ->where('ProductPerLeverancier.ProductId', $productId)
        ->select(
            'Product.Naam as ProductNaam',
            'ProductPerLeverancier.DatumLevering',
            'ProductPerLeverancier.Aantal',
            'ProductPerLeverancier.DatumEerstVolgendeLevering'
        )
        ->orderBy('ProductPerLeverancier.DatumLevering', 'asc')
        ->get();

    return view('magazijn.levering', compact('leverancier', 'leveringen'));
})->name('magazijn.levering');

Route::get('/magazijn/allergenen/{productId}', function ($productId) {
    $product = DB::table('JaminMagazijn.Product')->where('Id', $productId)->first();

    $allergenen = DB::table('JaminMagazijn.ProductPerAllergeen')
        ->join('JaminMagazijn.Allergeen', 'ProductPerAllergeen.AllergeenId', '=', 'Allergeen.Id')
        ->where('ProductPerAllergeen.ProductId', $productId)
        ->select('Allergeen.Naam', 'Allergeen.Omschrijving')
        ->orderBy('Allergeen.Naam', 'asc')
        ->get();

    if ($allergenen->isEmpty()) {
        return view('magazijn.geen_allergenen', compact('product'));
    }

    return view('magazijn.allergenen', compact('product', 'allergenen'));
})->name('magazijn.allergenen');