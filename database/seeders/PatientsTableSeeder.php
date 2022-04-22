<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $faker = \Faker\Factory::create();

        DB::table("patients")->insert([
            "num_securite_sociale" => $faker->numberBetween(12345678, 87654321),
            "caisse" => $faker->numberBetween(1, 1000),
            "nom" =>$faker->name(),
            "prenom" => $faker->lastName,
            "etat_civile" => $faker->randomElement(["marie", " divorce", " celibataire"]),
            "date_naiss" => $faker->date($format = 'Y-m-d', $max = 'now'),
            "adresse" => $faker->address,
            "tel" => $faker->phoneNumber,
            "image" => $faker->randomElement(["image1.jpg", " image2.jpg", " image3.jpg", "image4.jpg", "image5"]),
        ]);
    }
}
