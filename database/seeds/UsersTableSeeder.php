<?php

use Illuminate\Database\Seeder;
use App\Organisation;

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
        $org = Organisation::first();
        $admin = App\User::create([
            'name' => 'Rohan Krishna', 
            'email' => 'rohan.krishna@stratforge.com', 
            'password' => bcrypt('Harry30993'),
            'organisation_id' => $org->id
            ]);
    }
}
