<?php

use App\Update;
use Illuminate\Database\Seeder;

class UpdatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('updates')->truncate();

        Update::create([
            'pet_id' => '1',
            'content' => 'This pet has cancer'
        ]);

        Update::create([
            'pet_id' => '2',
            'content' => 'This pet has butthole aids'
        ]);

        Update::create([
            'pet_id' => '2',
            'content' => 'This pet is dead'
        ]);
    }
}
