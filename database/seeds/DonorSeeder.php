<?php

use App\Donor;
use Illuminate\Database\Seeder;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('donors')->truncate();

        Donor::create([
            'pet_id' => '1',
            'first_name' => 'john',
            'last_name' => 'smith',
            'email' => 'johnsmith@yahoo.com',
            'subscribed' => 'true',
            'comment' => 'I love my dog'
        ]);

        Donor::create([
            'pet_id' => '1',
            'first_name' => 'jack',
            'last_name' => 'smith',
            'email' => 'jacksmith@yahoo.com',
            'subscribed' => 'true'
        ]);

        Donor::create([
            'pet_id' => '0',
            'first_name' => 'jane',
            'last_name' => 'smith',
            'email' => 'janesmith@yahoo.com',
            'subscribed' => 'true',
            'comment' => 'I miss my puppy so much'
        ]);
    }
}
