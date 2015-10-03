<?php

use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
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

        $pets->each(function(Pet $pet)use($faker) {
         	$petStory = $faker->text;
         	$pet->story = $petStory;
         	$pet->save(); 
        }
    }
}
