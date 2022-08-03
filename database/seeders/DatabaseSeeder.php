<?php

namespace Database\Seeders;

use App\Models\Admin\Commune;
use App\Models\Admin\Departement;
use App\Models\Admin\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;
use \Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();

        User::create([
            'name' => 'Ousmane Diallo',
            'email' => 'yabaye@gmail.com',
            'phone' => $faker->phoneNumber(),
            'adress' => 'Kedougou',
            'image' => $faker->imageUrl(50, 50),
            'is_admin' => 0,
            'is_active' => 1,
            'confirmation_token' => Null,
            'slug' => $faker->slug(),
            'password' => '$2y$10$ul/8vG9Wg8fVrVZBizWqr.nqEZmEaLazkkOEjmBbbNie/Kt4EKp6S',
            'companyLogo' => $faker->imageUrl(50, 50), 
        ]);

        User::create([
            'name' => 'Mako Gold',
            'email' => 'mako@gmail.com',
            'phone' => $faker->phoneNumber(),
            'adress' => 'Kedougou',
            'image' => $faker->imageUrl(50, 50),
            'is_admin' => 1,
            'is_active' => 1,
            'confirmation_token' => Null,
            'slug' => $faker->slug(),
            'password' => '$2y$10$ul/8vG9Wg8fVrVZBizWqr.nqEZmEaLazkkOEjmBbbNie/Kt4EKp6S',
            'companyLogo' => $faker->imageUrl(50, 50), 
            'about' => $faker->text() 
        ]);

        for ($i=0; $i < 10; $i++) { 
            User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'phone' => $faker->phoneNumber(),
            'adress' => $faker->address(),
            'image' => $faker->imageUrl(50, 50),
            'is_admin' => 1,
            'is_active' => 0,
            'confirmation_token' => Null,
            'slug' => $faker->slug(),
            'password' => '$2y$10$ul/8vG9Wg8fVrVZBizWqr.nqEZmEaLazkkOEjmBbbNie/Kt4EKp6S',
            'companyLogo' => $faker->imageUrl(50, 50),
            'about' => $faker->text() 
        ]);
        }

        for ($i=0; $i < 21; $i++) { 
            Job::create([
                'title' => $faker->sentence('2'),
                'slug' => $faker->slug,
                'image' => $faker->imageUrl(70, 60 ,'product', true),
                'resume' => $faker->text(),
                'detail' => $faker->text(),
                'status' => $faker->boolean,
                'type' => $faker->boolean,
                'user_id' => 2,
                'expiration_at' => $faker->dateTime()
            ]);
        }


            $departement = [
                'Kedougou','Saraye','Salemate'
            ];

            foreach ($departement as $dep) {
                Departement::create([
                    'name' => $dep
                ]);
            }

            $kedougou = [
                'Kedougou' => 1,
                'Bandafassi' => 1,
                'Dimboli' => 1,
                'Dindefelo' => 1,
                'Fongolimbi' => 1,
                'Ninefecha' => 1,
                'Tomboronkoto' => 1,
            ];
            foreach ($kedougou as $key_ked => $value_ked) {
                Commune::create([
                    'name' => $key_ked,
                    'departement_id' => $value_ked
                ]);
            }

            $saray = [
                'Bembou' => 2,
                'Khossanto' => 2,
                'Medina Bafe' => 2,
                'Missirah Sirimana' => 2,
                'Sabodala' => 2,
                'Saraya' => 2,
            ];
            foreach ($saray as $key_sar => $value_sar) {
                Commune::create([
                    'name' => $key_sar,
                    'departement_id' => $value_sar
                ]);
            }
            $salemata = [
                'Dakately' => 3,
                'Dar Salam' => 3,
                'Ethiolo' => 3,
                'Kevoye' => 3,
                'Oubadji' => 3,
                'Salemata' => 3,
            ];
            foreach ($salemata as $key_sale => $value_sale) {
                Commune::create([
                    'name' => $key_sale,
                    'departement_id' => $value_sale
                ]);
            }
    }
}
