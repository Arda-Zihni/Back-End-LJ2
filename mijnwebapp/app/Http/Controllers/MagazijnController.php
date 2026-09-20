<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MagazijnController extends Controller
{
    // Overzicht Magazijn Jamin
    public function index()
    {
        $producten = DB::table('Magazijn')
            ->join('Product', 'Magazijn.ProductId', '=', 'Product.Id')
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
    }

    // User Story 1: Leveringsinformatie
    public function levering($productId)
    {
        $product = DB::table('Product')->where('Id', $productId)->first();
        $magazijn = DB::table('Magazijn')->where('ProductId', $productId)->first();

        // Scenario 02: Geen voorraad aanwezig (AantalAanwezig is NULL of 0)
        if (!$magazijn || is_null($magazijn->AantalAanwezig) || $magazijn->AantalAanwezig == 0) {
            $levering = DB::table('ProductPerLeverancier')
                ->where('ProductId', $productId)
                ->orderBy('DatumEerstVolgendeLevering', 'asc')
                ->first();

            $verwachteDatum = ($levering && $levering->DatumEerstVolgendeLevering)
                ? date('d-m-Y', strtotime($levering->DatumEerstVolgendeLevering))
                : '30-04-2023';

            return view('magazijn.geen_voorraad', compact('verwachteDatum'));
        }

        // Scenario 01: Wel voorraad aanwezig
        $leverancier = DB::table('ProductPerLeverancier')
            ->join('Leverancier', 'ProductPerLeverancier.LeverancierId', '=', 'Leverancier.Id')
            ->where('ProductPerLeverancier.ProductId', $productId)
            ->select(
                'Leverancier.Naam as LeverancierNaam',
                'Leverancier.ContactPersoon',
                'Leverancier.LeverancierNummer',
                'Leverancier.Mobiel'
            )
            ->first();

        $leveringen = DB::table('ProductPerLeverancier')
            ->join('Product', 'ProductPerLeverancier.ProductId', '=', 'Product.Id')
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
    }
}