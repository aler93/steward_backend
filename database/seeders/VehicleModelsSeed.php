<?php

namespace Database\Seeders;

use App\Models\VehicleBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleModelsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chevy = VehicleBrand::where("name", "=", "Chevrolet")->first();

        $chevrolets = [
            [
                "brand_id" => $chevy->id,
                "model"    => "Agile",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Astra",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Blazer",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Bolt",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Camaro",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Captiva",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Caravan",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Celta",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Chevette",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Classic",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Cobalt",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Cruze",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "D20",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Impala",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Kadett",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Malibu",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Marajó",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Meriva",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Montana",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Monza",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Omega",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Onix",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Opala",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "S10",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Silverado",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Tahoe",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Tracker",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Trailblazer",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Vectra",
            ],
            [
                "brand_id" => $chevy->id,
                "model"    => "Zafira",
            ],
        ];

        DB::table("vehicle_models")->insert($chevrolets);
        $restart = count($chevrolets) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");

        $cadi = VehicleBrand::where("name", "=", "Cadillac")->first();
        $cadillacs = [
            [
                "brand_id" => $cadi->id,
                "model"    => "CTS-V",
            ],
            [
                "brand_id" => $cadi->id,
                "model"    => "Eldorado",
            ],
            [
                "brand_id" => $cadi->id,
                "model"    => "Escalade",
            ],
        ];

        DB::table("vehicle_models")->insert($cadillacs);
        $restart = $restart + count($cadillacs) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");

        $Chrysler = VehicleBrand::where("name", "=", "Chrysler")->first();
        $chryslers = [
            [
                "brand_id" => $Chrysler->id,
                "model"    => "300c",
            ],
            [
                "brand_id" => $Chrysler->id,
                "model"    => "300m",
            ],
            [
                "brand_id" => $Chrysler->id,
                "model"    => "Caravan",
            ],
            [
                "brand_id" => $Chrysler->id,
                "model"    => "Gran Caravan",
            ],
            [
                "brand_id" => $Chrysler->id,
                "model"    => "Pacifica",
            ],
            [
                "brand_id" => $Chrysler->id,
                "model"    => "Pt Cruiser",
            ],
            [
                "brand_id" => $Chrysler->id,
                "model"    => "Stratus",
            ],
        ];

        DB::table("vehicle_models")->insert($chryslers);
        $restart = $restart + count($chryslers) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Dodge = VehicleBrand::where("name", "=", "Dodge")->first();
        $dodges = [
            [
                "brand_id" => $Dodge->id,
                "model"    => "Challenger",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "Charger",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "Dakota",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "Dart",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "Durango",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "Journey",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "RAM",
            ],
            [
                "brand_id" => $Dodge->id,
                "model"    => "Viper",
            ],
        ];

        DB::table("vehicle_models")->insert($dodges);
        $restart = $restart + count($dodges) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Ford = VehicleBrand::where("name", "=", "Ford")->first();
        $fords = [
            [
                "brand_id" => $Ford->id,
                "model"    => "Belina",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Bronco",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Corcel",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Corcel II",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Courier",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Del Rey",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Ecoline",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Ecosport",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Edge",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Escort",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Explorer",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "F-1000",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "F-150",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "F-250",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "F-350",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "F-4000",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "F-75",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Fiesta",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Focus",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Fusion",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Ka",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Maverik",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Mondeo",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Mustang",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Mustang Mach-e",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Pampa",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Ranger",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Taurus",
            ],
            [
                "brand_id" => $Ford->id,
                "model"    => "Versailles",
            ],
        ];

        DB::table("vehicle_models")->insert($fords);
        $restart = $restart + count($fords) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Jeep = VehicleBrand::where("name", "=", "Jeep")->first();
        $jeeps = [
            [
                "brand_id" => $Jeep->id,
                "model"    => "Cherokee",
            ],
            [
                "brand_id" => $Jeep->id,
                "model"    => "Commander",
            ],
            [
                "brand_id" => $Jeep->id,
                "model"    => "Compass",
            ],
            [
                "brand_id" => $Jeep->id,
                "model"    => "Gladiator",
            ],
            [
                "brand_id" => $Jeep->id,
                "model"    => "Grand Cherokee",
            ],
            [
                "brand_id" => $Jeep->id,
                "model"    => "Renegade",
            ],
            [
                "brand_id" => $Jeep->id,
                "model"    => "Wrangler",
            ],
        ];

        DB::table("vehicle_models")->insert($jeeps);
        $restart = $restart + count($jeeps) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $GMC = VehicleBrand::where("name", "=", "GMC")->first();
        $GMCs = [
            [
                "brand_id" => $GMC->id,
                "model"    => "3500 HD",
            ],
            [
                "brand_id" => $GMC->id,
                "model"    => "Sierra",
            ],
        ];

        DB::table("vehicle_models")->insert($GMCs);
        $restart = $restart + count($GMCs) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Lucid = VehicleBrand::where("name", "=", "Lucid")->first();
        $lucids = [
            [
                "brand_id" => $Lucid->id,
                "model"    => "Air",
            ],
        ];

        DB::table("vehicle_models")->insert($lucids);
        $restart = $restart + count($lucids) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Tesla = VehicleBrand::where("name", "=", "Tesla")->first();
        $teslas = [
            [
                "brand_id" => $Tesla->id,
                "model"    => "Model S",
            ],
            [
                "brand_id" => $Tesla->id,
                "model"    => "Model Y",
            ],
            [
                "brand_id" => $Tesla->id,
                "model"    => "Model X",
            ],
            [
                "brand_id" => $Tesla->id,
                "model"    => "Model 3",
            ],
            [
                "brand_id" => $Tesla->id,
                "model"    => "Cybertruck",
            ],
        ];

        DB::table("vehicle_models")->insert($teslas);
        $restart = $restart + count($teslas) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Rivian = VehicleBrand::where("name", "=", "Rivian")->first();
        $rivians = [
            [
                "brand_id" => $Rivian->id,
                "model"    => "R1s",
            ],
            [
                "brand_id" => $Rivian->id,
                "model"    => "R1t",
            ],
            [
                "brand_id" => $Rivian->id,
                "model"    => "R2",
            ],
            [
                "brand_id" => $Rivian->id,
                "model"    => "R3",
            ],
            [
                "brand_id" => $Rivian->id,
                "model"    => "Fleet",
            ],
        ];

        DB::table("vehicle_models")->insert($rivians);
        $restart = $restart + count($rivians) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Kenworth = VehicleBrand::where("name", "=", "Kenworth")->first();
        $kenworths = [
            [
                "brand_id" => $Kenworth->id,
                "model"    => "T680",
            ],
            [
                "brand_id" => $Kenworth->id,
                "model"    => "W900",
            ],
            [
                "brand_id" => $Kenworth->id,
                "model"    => "W990",
            ],
        ];

        DB::table("vehicle_models")->insert($kenworths);
        $restart = $restart + count($kenworths) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Peterbilt = VehicleBrand::where("name", "=", "Peterbilt")->first();
        $Peterbilts = [
            [
                "brand_id" => $Peterbilt->id,
                "model"    => "388",
            ],
            [
                "brand_id" => $Peterbilt->id,
                "model"    => "579",
            ],
        ];

        DB::table("vehicle_models")->insert($Peterbilts);
        $restart = $restart + count($Peterbilts) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $WesternStar = VehicleBrand::where("name", "=", "Western Star")->first();
        $WesternStars = [
            [
                "brand_id" => $WesternStar->id,
                "model"    => "49x",
            ],
            [
                "brand_id" => $WesternStar->id,
                "model"    => "4900",
            ],
        ];

        DB::table("vehicle_models")->insert($WesternStars);
        $restart = $restart + count($WesternStars) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Hummer = VehicleBrand::where("name", "=", "Hummer")->first();
        $hummers = [
            [
                "brand_id" => $Hummer->id,
                "model"    => "H1",
            ],
            [
                "brand_id" => $Hummer->id,
                "model"    => "H2",
            ],
            [
                "brand_id" => $Hummer->id,
                "model"    => "EV",
            ],
        ];

        DB::table("vehicle_models")->insert($hummers);
        $restart = $restart + count($hummers) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Honda = VehicleBrand::where("name", "=", "Honda")->first();
        $hondas = [
            [
                "brand_id" => $Honda->id,
                "model"    => "Accord",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "City",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "Civic",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "CR-V",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "Fit",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "HR-V",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "Odyssey",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "Pilot",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "Prelude",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "Ridge",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "S2000",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "WR-V",
            ],
            [
                "brand_id" => $Honda->id,
                "model"    => "ZR-V",
            ],
        ];

        DB::table("vehicle_models")->insert($hondas);
        $restart = $restart + count($hondas) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Toyota = VehicleBrand::where("name", "=", "Toyota")->first();
        $toyotas = [
            [
                "brand_id" => $Toyota->id,
                "model"    => "Bandeirante",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Camry",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Corolla",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Corolla Cross",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Etios",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Hilux",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Land Cruiser",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Prius",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "RAV4",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Supra",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Tundra",
            ],
            [
                "brand_id" => $Toyota->id,
                "model"    => "Yaris",
            ],
        ];

        DB::table("vehicle_models")->insert($toyotas);
        $restart = $restart + count($toyotas) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Mazda = VehicleBrand::where("name", "=", "Mazda")->first();
        $mazdas = [
            [
                "brand_id" => $Mazda->id,
                "model"    => "Furai",
            ],
            [
                "brand_id" => $Mazda->id,
                "model"    => "RX-5",
            ],
            [
                "brand_id" => $Mazda->id,
                "model"    => "RX-7",
            ],
        ];

        DB::table("vehicle_models")->insert($mazdas);
        $restart = $restart + count($mazdas) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Nissan = VehicleBrand::where("name", "=", "Mazda")->first();
        $nissans = [
            [
                "brand_id" => $Nissan->id,
                "model"    => "350z",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "370z",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Altima",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Frontier",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Grand Livina",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "GT-R",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Kicks",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Leaf",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Livina",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "March",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Pathfinder",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Sentra",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Tiida",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "Versa",
            ],
            [
                "brand_id" => $Nissan->id,
                "model"    => "X-Trail",
            ],
        ];

        DB::table("vehicle_models")->insert($nissans);
        $restart = $restart + count($nissans) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Subaru = VehicleBrand::where("name", "=", "Subaru")->first();
        $subarus = [
            [
                "brand_id" => $Subaru->id,
                "model"    => "Forester",
            ],
            [
                "brand_id" => $Subaru->id,
                "model"    => "Imprenza",
            ],
            [
                "brand_id" => $Subaru->id,
                "model"    => "Legacy",
            ],
            [
                "brand_id" => $Subaru->id,
                "model"    => "Outback",
            ],
        ];

        DB::table("vehicle_models")->insert($subarus);
        $restart = $restart + count($subarus) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Mitsubishi = VehicleBrand::where("name", "=", "Mitsubishi")->first();
        $mits = [
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "3000 GT",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "ASX",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "Eclipse",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "Eclipse Cross",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "L200",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "Lancer",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "Outlander",
            ],
            [
                "brand_id" => $Mitsubishi->id,
                "model"    => "Pajero",
            ],
        ];

        DB::table("vehicle_models")->insert($mits);
        $restart = $restart + count($mits) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Lexus = VehicleBrand::where("name", "=", "Lexus")->first();
        $lex = [
            [
                "brand_id" => $Lexus->id,
                "model"    => "ES 300h",
            ],
            [
                "brand_id" => $Lexus->id,
                "model"    => "RX 500h",
            ],
            [
                "brand_id" => $Lexus->id,
                "model"    => "NX 300h",
            ],
        ];

        DB::table("vehicle_models")->insert($lex);
        $restart = $restart + count($lex) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Suzuki = VehicleBrand::where("name", "=", "Suzuki")->first();
        $suzukis = [
            [
                "brand_id" => $Suzuki->id,
                "model"    => "Jimny",
            ],
            [
                "brand_id" => $Suzuki->id,
                "model"    => "Samurai",
            ],
            [
                "brand_id" => $Suzuki->id,
                "model"    => "SX4",
            ],
        ];

        DB::table("vehicle_models")->insert($suzukis);
        $restart = $restart + count($suzukis) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Acura = VehicleBrand::where("name", "=", "Acura")->first();
        $acuras = [
            [
                "brand_id" => $Acura->id,
                "model"    => "Integra",
            ],
            [
                "brand_id" => $Acura->id,
                "model"    => "NSX",
            ],
        ];

        DB::table("vehicle_models")->insert($acuras);
        $restart = $restart + count($acuras) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Kia = VehicleBrand::where("name", "=", "Kia")->first();
        $kias = [
            [
                "brand_id" => $Kia->id,
                "model"    => "Cerato",
            ],
            [
                "brand_id" => $Kia->id,
                "model"    => "Optima",
            ],
            [
                "brand_id" => $Kia->id,
                "model"    => "Sorento",
            ],
            [
                "brand_id" => $Kia->id,
                "model"    => "Sportage",
            ],
            [
                "brand_id" => $Kia->id,
                "model"    => "Soul",
            ],
        ];

        DB::table("vehicle_models")->insert($kias);
        $restart = $restart + count($kias) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Hyundai = VehicleBrand::where("name", "=", "Hyundai")->first();
        $hyun = [
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Azera",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Creta",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Elantra",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Genesis",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Gran Santa Fé",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "HB20",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "HB20s",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "I30",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Ioniq",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "IX35",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Santa Fé",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Sonata",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Terracan",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Tucson",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Veloster",
            ],
            [
                "brand_id" => $Hyundai->id,
                "model"    => "Veracruz",
            ],
        ];

        DB::table("vehicle_models")->insert($hyun);
        $restart = $restart + count($hyun) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $GenesisMotor = VehicleBrand::where("name", "=", "Genesis Motor")->first();
        $gen = [
            [
                "brand_id" => $GenesisMotor->id,
                "model"    => "G90",
            ],
            [
                "brand_id" => $GenesisMotor->id,
                "model"    => "G80",
            ],
            [
                "brand_id" => $GenesisMotor->id,
                "model"    => "G70",
            ],
        ];

        DB::table("vehicle_models")->insert($gen);
        $restart = $restart + count($gen) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Citroen = VehicleBrand::where("name", "=", "Citroën")->first();
        $cits = [
            [
                "brand_id" => $Citroen->id,
                "model"    => "Aircross",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "C3",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "C4",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "C5",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "C6",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "Ds3",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "Ds4",
            ],
            [
                "brand_id" => $Citroen->id,
                "model"    => "Ds5",
            ],
        ];

        DB::table("vehicle_models")->insert($cits);
        $restart = $restart + count($cits) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");

        $Renault = VehicleBrand::where("name", "=", "Renault")->first();
        $renos = [
            [
                "brand_id" => $Renault->id,
                "model"    => "Captur",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Clio",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Duster",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Oroch",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Fluence",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Gran Scenic",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Kangoo",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Kwid",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Kwid E-tech",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Logan",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Megane",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Sandero",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Stepway",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Symbol",
            ],
            [
                "brand_id" => $Renault->id,
                "model"    => "Twingo",
            ],
        ];

        DB::table("vehicle_models")->insert($renos);
        $restart = $restart + count($renos) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");

        $Peugeot = VehicleBrand::where("name", "=", "Peugeot")->first();
        $pegos = [
            [
                "brand_id" => $Peugeot->id,
                "model"    => "106",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "205",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "206",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "207",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "208",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "2008",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "306",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "307",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "308",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "3008",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "408",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "5008",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "607",
            ],
            [
                "brand_id" => $Peugeot->id,
                "model"    => "Hoggar",
            ],
        ];

        DB::table("vehicle_models")->insert($pegos);
        $restart = $restart + count($pegos) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Audi = VehicleBrand::where("name", "=", "Audi")->first();
        $audis = [
            [
                "brand_id" => $Audi->id,
                "model"    => "A1",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "A3",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "A4",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "A5",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "A6",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "A7",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "A8",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "E-tron",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "Q3",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "Q5",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "Q7",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "Q8",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "R8",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "RS2",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "RS3",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "RS4",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "RS5",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "RS6",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "RS7",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "S2",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "S3",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "S4",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "S5",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "S6",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "S8",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "TT",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "TT Rs",
            ],
            [
                "brand_id" => $Audi->id,
                "model"    => "TTs",
            ],
        ];

        DB::table("vehicle_models")->insert($audis);
        $restart = $restart + count($audis) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $BMW = VehicleBrand::where("name", "=", "BMW")->first();
        $bms = [
            [
                "brand_id" => $BMW->id,
                "model"    => "1M",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "130i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "135i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "220i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "320i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "330i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "420i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "430i",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "M2",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "M3",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "M4",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "M5",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "M6",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "M8",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X1",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X2",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X3",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X4",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X5",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X6",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "X7",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "Z4",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "i3",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "i5",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "i7",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "i8",
            ],
            [
                "brand_id" => $BMW->id,
                "model"    => "LX",
            ],
        ];

        DB::table("vehicle_models")->insert($bms);
        $restart = $restart + count($bms) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Benz = VehicleBrand::where("name", "=", "Mercedes Benz")->first();
        $benz = [
            [
                "brand_id" => $Benz->id,
                "model"    => "C180",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "C200",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "C220",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "C230",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "C280",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "CL 500",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "C200",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "E320",
            ],
            [
                "brand_id" => $Benz->id,
                "model"    => "GL500",
            ],
        ];

        DB::table("vehicle_models")->insert($benz);
        $restart = $restart + count($benz) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $AMG = VehicleBrand::where("name", "=", "Mercedes AMG")->first();
        $amg = [
            [
                "brand_id" => $AMG->id,
                "model"    => "A45 AMG",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "AMG GT 63",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "C63",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "E63",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "S63",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "SLK65",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "SLS",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "GT",
            ],
            [
                "brand_id" => $AMG->id,
                "model"    => "GT One",
            ],
        ];

        DB::table("vehicle_models")->insert($amg);
        $restart = $restart + count($amg) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Porsche = VehicleBrand::where("name", "=", "Porsche")->first();
        $porsc = [
            [
                "brand_id" => $Porsche->id,
                "model"    => "911",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Boxter",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Cayenne",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Cayman",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Macan",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Panamera",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Spyder 550",
            ],
            [
                "brand_id" => $Porsche->id,
                "model"    => "Taycan",
            ],
        ];

        DB::table("vehicle_models")->insert($porsc);
        $restart = $restart + count($porsc) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Volkswagen = VehicleBrand::where("name", "=", "Volkswagen")->first();
        $volks = [
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Amarok",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Apollo",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Bora",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Brasilia",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Buggy",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Crossfox",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Cross Up",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Fox",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Fusca",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Gol",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Golf",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Jetta",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Logus",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "New Beetle",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Nivus",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Parati",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Passat",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Passat Variant",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Polo",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Santana",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Saveiro",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Space Cross",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Spacefox",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "T-cross",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Tiguan",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Touareg",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Up",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Variant",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Variant II",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Virtus",
            ],
            [
                "brand_id" => $Volkswagen->id,
                "model"    => "Voyage",
            ],
        ];

        DB::table("vehicle_models")->insert($volks);
        $restart = $restart + count($volks) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Fiat = VehicleBrand::where("name", "=", "Fiat")->first();
        $fiats = [
            [
                "brand_id" => $Fiat->id,
                "model"    => "147",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "500",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "500e",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Argo",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Brava",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Bravo",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Cronos",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Doblò",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Ducato",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Elba",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Fastback",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Fiorino",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Freemont",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Gran Siena",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Idea",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Linea",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Marea",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Mobi",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Palio",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Premio",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Pulse",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Punto",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Siena",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Stilo",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Strada",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Tempra",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Toro",
            ],
            [
                "brand_id" => $Fiat->id,
                "model"    => "Uno",
            ],
        ];

        DB::table("vehicle_models")->insert($fiats);
        $restart = $restart + count($fiats) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Ferrari  = VehicleBrand::where("name", "=", "Ferrari")->first();
        $ferraris = [
            [
                "brand_id" => $Ferrari->id,
                "model"    => "458",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "488",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "812",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "California",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "Enzo",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "F360",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "F8",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "Purosangue",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "Roma",
            ],
            [
                "brand_id" => $Ferrari->id,
                "model"    => "Sf90",
            ],
        ];
        DB::table("vehicle_models")->insert($ferraris);
        $restart = $restart + count($ferraris) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");



        $AlfaRomeo  = VehicleBrand::where("name", "=", "Alfa Romeo")->first();
        $alfas = [
            [
                "brand_id" => $AlfaRomeo->id,
                "model"    => "145",
            ],
            [
                "brand_id" => $AlfaRomeo->id,
                "model"    => "155",
            ],
            [
                "brand_id" => $AlfaRomeo->id,
                "model"    => "156",
            ],
            [
                "brand_id" => $AlfaRomeo->id,
                "model"    => "Giulia",
            ],
            [
                "brand_id" => $AlfaRomeo->id,
                "model"    => "Spider",
            ],
            [
                "brand_id" => $AlfaRomeo->id,
                "model"    => "Stelvio",
            ],
        ];
        DB::table("vehicle_models")->insert($alfas);
        $restart = $restart + count($alfas) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Lamborghini  = VehicleBrand::where("name", "=", "Lamborghini")->first();
        $labos = [
            [
                "brand_id" => $Lamborghini->id,
                "model"    => "Aventator",
            ],
            [
                "brand_id" => $Lamborghini->id,
                "model"    => "Gallardo",
            ],
            [
                "brand_id" => $Lamborghini->id,
                "model"    => "Huracán",
            ],
            [
                "brand_id" => $Lamborghini->id,
                "model"    => "Revuelto",
            ],
            [
                "brand_id" => $Lamborghini->id,
                "model"    => "Urus",
            ],
        ];
        DB::table("vehicle_models")->insert($labos);
        $restart = $restart + count($labos) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Volvo  = VehicleBrand::where("name", "=", "Volvo")->first();
        $volvos = [
            [
                "brand_id" => $Volvo->id,
                "model"    => "850",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "C30",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "C40",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "C70",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "S40",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "S60",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "S90",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "V40",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "V50",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "V60",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "V70",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "XC40",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "XC60",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "XC70",
            ],
            [
                "brand_id" => $Volvo->id,
                "model"    => "XC90",
            ],
        ];
        DB::table("vehicle_models")->insert($volvos);
        $restart = $restart + count($volvos) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $Koenigsegg  = VehicleBrand::where("name", "=", "Koenigsegg")->first();
        $koenig = [
            [
                "brand_id" => $Koenigsegg->id,
                "model"    => "Agera",
            ],
            [
                "brand_id" => $Koenigsegg->id,
                "model"    => "Agera RS",
            ],
            [
                "brand_id" => $Koenigsegg->id,
                "model"    => "1:One",
            ],
            [
                "brand_id" => $Koenigsegg->id,
                "model"    => "Gemera",
            ],
            [
                "brand_id" => $Koenigsegg->id,
                "model"    => "CCR",
            ],
        ];
        DB::table("vehicle_models")->insert($koenig);
        $restart = $restart + count($koenig) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $BYD  = VehicleBrand::where("name", "=", "BYD")->first();
        $byds = [
            [
                "brand_id" => $BYD->id,
                "model"    => "Dolphin",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Dolphin Mini",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "King",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Seal",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Song Plus",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Song Plus Premium",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Song Pro",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Yuan Pro",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "Yuan Plus",
            ],
            [
                "brand_id" => $BYD->id,
                "model"    => "ET3",
            ],
        ];
        DB::table("vehicle_models")->insert($byds);
        $restart = $restart + count($byds) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $JAC  = VehicleBrand::where("name", "=", "JAC")->first();
        $jacs = [
            [
                "brand_id" => $JAC->id,
                "model"    => "E-js4",
            ],
            [
                "brand_id" => $JAC->id,
                "model"    => "J2",
            ],
            [
                "brand_id" => $JAC->id,
                "model"    => "J3",
            ],
            [
                "brand_id" => $JAC->id,
                "model"    => "J6",
            ],
            [
                "brand_id" => $JAC->id,
                "model"    => "T6",
            ],
            [
                "brand_id" => $JAC->id,
                "model"    => "T8",
            ],
        ];
        DB::table("vehicle_models")->insert($jacs);
        $restart = $restart + count($jacs) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");


        $GWM  = VehicleBrand::where("name", "=", "GWM")->first();
        $gwms = [
            [
                "brand_id" => $GWM->id,
                "model"    => "Haval",
            ],
            [
                "brand_id" => $GWM->id,
                "model"    => "Ora O3",
            ],
        ];
        DB::table("vehicle_models")->insert($gwms);
        $restart = $restart + count($gwms) + 1;
        DB::statement("ALTER SEQUENCE vehicle_models_id_seq RESTART WITH {$restart};");
    }
}
