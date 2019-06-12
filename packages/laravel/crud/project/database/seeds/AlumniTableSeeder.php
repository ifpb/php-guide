<?php

use App\Alumnus;
use Illuminate\Database\Seeder;

class AlumniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnus = new Alumnus;
        $alumnus->name = 'Luiz Chaves';
        $alumnus->email = 'luiz.chaves@ifpb.edu.br';
        $alumnus->linkedin = 'https://www.linkedin.com/in/luizcrchaves/';
        $alumnus->save();

        $alumnus = new Alumnus;
        $alumnus->name = 'Leandro Almeida';
        $alumnus->email = 'leandro.almeida@ifpb.edu.br';
        $alumnus->linkedin = 'https://www.linkedin.com/in/leandro-almeida-2601a611/';
        $alumnus->save();
    }
}
