<?php

use App\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('pets')->truncate();

        Pet::create([
            'name' => 'Fluffy',
            'age' => 5
        ]);

        Pet::create([
            'name' => 'Spiffy',
            'age' => 3
        ]);

        Pet::create([
            'name' => 'Spotty',
        ]);
    }
}
