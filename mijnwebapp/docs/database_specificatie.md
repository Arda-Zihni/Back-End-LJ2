# Database specificatie JaminMagazijn

Alle tabellen gebruiken `InnoDB`. `Id` is de primaire sleutel. De velden `IsActief`, `Opmerkingen`, `DatumAangemaakt` en `DatumGewijzigd` zijn de systeemvelden.

## Product

| Kolomnaam | Datatype | Lengte | Nullable | Opmerking |
|---|---|---:|:---:|---|
| Id | TINYINT UNSIGNED | - | No | PK, AUTO_INCREMENT |
| Naam | VARCHAR | 100 | No | Productnaam |
| Barcode | VARCHAR | 13 | No | Uniek |
| Verkoopprijs | DECIMAL | 6,2 | No | Verkoopprijs inclusief twee decimalen |
| BTW | DECIMAL | 3,1 | No | BTW-percentage |
| IsActief | BIT | 1 | No | Systeemveld, default 1 |
| Opmerkingen | VARCHAR | 250 | Yes | Systeemveld |
| DatumAangemaakt | DATETIME | 6 | No | Systeemveld |
| DatumGewijzigd | DATETIME | 6 | No | Systeemveld |

## Allergeen

| Kolomnaam | Datatype | Lengte | Nullable | Opmerking |
|---|---|---:|:---:|---|
| Id | TINYINT UNSIGNED | - | No | PK, AUTO_INCREMENT |
| Naam | VARCHAR | 50 | No | Naam van het allergeen |
| IsActief | BIT | 1 | No | Systeemveld, default 1 |
| Opmerkingen | VARCHAR | 250 | Yes | Systeemveld |
| DatumAangemaakt | DATETIME | 6 | No | Systeemveld |
| DatumGewijzigd | DATETIME | 6 | No | Systeemveld |

## Leverancier

| Kolomnaam | Datatype | Lengte | Nullable | Opmerking |
|---|---|---:|:---:|---|
| Id | TINYINT UNSIGNED | - | No | PK, AUTO_INCREMENT |
| Naam | VARCHAR | 100 | No | Naam van de leverancier |
| Contactpersoon | VARCHAR | 100 | No | Contactpersoon |
| Mobiel | VARCHAR | 15 | No | Telefoonnummer |
| Email | VARCHAR | 100 | No | E-mailadres |
| IsActief | BIT | 1 | No | Systeemveld, default 1 |
| Opmerkingen | VARCHAR | 250 | Yes | Systeemveld |
| DatumAangemaakt | DATETIME | 6 | No | Systeemveld |
| DatumGewijzigd | DATETIME | 6 | No | Systeemveld |

## Magazijn

| Kolomnaam | Datatype | Lengte | Nullable | Opmerking |
|---|---|---:|:---:|---|
| Id | TINYINT UNSIGNED | - | No | PK, AUTO_INCREMENT |
| Naam | VARCHAR | 100 | No | Naam van het magazijn |
| Adres | VARCHAR | 100 | No | Straatnaam |
| Huisnummer | VARCHAR | 10 | No | Huisnummer en eventuele toevoeging |
| Postcode | VARCHAR | 7 | No | Nederlandse postcode |
| Plaats | VARCHAR | 50 | No | Plaatsnaam |
| IsActief | BIT | 1 | No | Systeemveld, default 1 |
| Opmerkingen | VARCHAR | 250 | Yes | Systeemveld |
| DatumAangemaakt | DATETIME | 6 | No | Systeemveld |
| DatumGewijzigd | DATETIME | 6 | No | Systeemveld |

## ProductPerAllergeen

| Kolomnaam | Datatype | Lengte | Nullable | Opmerking |
|---|---|---:|:---:|---|
| Id | TINYINT UNSIGNED | - | No | PK, AUTO_INCREMENT |
| ProductId | TINYINT UNSIGNED | - | No | FK naar Product.Id |
| AllergeenId | TINYINT UNSIGNED | - | No | FK naar Allergeen.Id |
| IsActief | BIT | 1 | No | Systeemveld, default 1 |
| Opmerkingen | VARCHAR | 250 | Yes | Systeemveld |
| DatumAangemaakt | DATETIME | 6 | No | Systeemveld |
| DatumGewijzigd | DATETIME | 6 | No | Systeemveld |

## ProductPerLeverancier

| Kolomnaam | Datatype | Lengte | Nullable | Opmerking |
|---|---|---:|:---:|---|
| Id | TINYINT UNSIGNED | - | No | PK, AUTO_INCREMENT |
| ProductId | TINYINT UNSIGNED | - | No | FK naar Product.Id |
| LeverancierId | TINYINT UNSIGNED | - | No | FK naar Leverancier.Id |
| IsActief | BIT | 1 | No | Systeemveld, default 1 |
| Opmerkingen | VARCHAR | 250 | Yes | Systeemveld |
| DatumAangemaakt | DATETIME | 6 | No | Systeemveld |
| DatumGewijzigd | DATETIME | 6 | No | Systeemveld |

## Relaties

- Een product kan meerdere allergenen hebben via `ProductPerAllergeen`.
- Een allergeen kan aan meerdere producten gekoppeld zijn via `ProductPerAllergeen`.
- Een product kan meerdere leveranciers hebben via `ProductPerLeverancier`.
- Een leverancier kan meerdere producten leveren via `ProductPerLeverancier`.
