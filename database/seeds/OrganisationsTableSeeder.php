<?php

use Illuminate\Database\Seeder;
use App\Organisation;
// use Faker\Generator as Faker;

class OrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        $org = Organisation::create(['name' => $faker->company]);
    }
}
