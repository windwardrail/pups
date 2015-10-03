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
            'first_name' => 'john',
            'last_name' => 'smith',
            'email' => 'johnsmith@yahoo.com',
            'checkbox' => 'true'
        ]);

        Donor::create([
            'first_name' => 'jack',
            'last_name' => 'smith',
            'email' => 'jacksmith@yahoo.com',
            'checkbox' => 'true'
        ]);

        Donor::create([
            'first_name' => 'jane',
            'last_name' => 'smith',
            'email' => 'janesmith@yahoo.com',
            'checkbox' => 'true'
        ]);
    }
}
