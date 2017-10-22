<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(pan\User::class,1)->create([ 'name' => 'Rohan Krishna','email' => 'rohan.krishna@csscorp.com','password' => bcrypt('harry30993') ]);
    }
}
