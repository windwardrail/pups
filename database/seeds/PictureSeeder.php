<?php

use Illuminate\Database\Seeder;
use App\Pet;
use App\Picture;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table("pictures")->truncate();
        $pets = Pet::all();
        foreach($pets->all() as $pet) {
        	$picture = new Picture([
        		'url' => 'http://cdn.sheknows.com/articles/2013/04/Photo_1.jpg',
        		'pet_id' => $pet->id
        		]);
        		$picture->save();       	
        }
    }
}
