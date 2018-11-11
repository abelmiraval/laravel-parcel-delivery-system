<?php

use Illuminate\Database\Seeder;
use sisSerpost\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([

			'nombre'=>'Lima',
    		

    		]);    
    }
}
