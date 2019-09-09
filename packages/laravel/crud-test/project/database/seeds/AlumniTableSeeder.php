<?php

use Illuminate\Database\Seeder;
use App\Alumnus;

class AlumniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Alumnus::create([
        //     'name'     => 'Luiz Chaves',
        //     'email'    => 'luiz.chaves@ifpb.edu.br',
        //     'linkedin' => 'https://www.linkedin.com/in/luizcrchaves/'
        // ]);

        factory(Alumnus::class, 10)->create();
    }
}
