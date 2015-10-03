<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(PetSeeder::class);

         $this->call(PictureSeeder::class);
         $this->call(UpdateSeeder::class);

         $this->call(UpdatesSeeder::class);
         $this->call(DonorSeeder::class);


        Model::reguard();
    }
}
