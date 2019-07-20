<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name'      => 'Luiz Chaves',
        //     'email'     => 'luiz.chaves@ifpb.edu.br',
        //     'password'  => bcrypt('ifpb@1234'),
        // ]);

        factory(User::class, 10)->create();
    }
}
