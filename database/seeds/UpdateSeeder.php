<?php

use App\Pet;
use App\Update;
use Illuminate\Database\Seeder;

class UpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $pets = Pet::all();

        $pets->each(function(Pet $pet)use($faker){
            $update = new Update(['content' => $faker->text]);

            $pet->updates()->save($update);
        });
    }
}
