<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Department::class)->create([
            'name'=>'DG',
            'display_name'=>'Dirección General'
        ]);
        factory(Department::class)->create([
           'name'=> 'CA',
           'display_name'=>'Consejo de Admon'
        ]);
        factory(Department::class)->create([
            'name'=>'GS',
            'display_name'=>'Gerencia de Servicios de Salud'
        ]);
        factory(Department::class)->create([
            'name'=>'GO',
            'display_name'=>'Gerencia de Operaciones'
        ]);
        factory(Department::class)->create([
            'name'=>'KH',
            'display_name'=>'Capital Humano'
        ]);
        factory(Department::class)->create([
            'name'=>'TE',
            'display_name'=>'Tesorería'
        ]);
        factory(Department::class)->create([
            'name'=>'TI',
            'display_name'=>'Tecnológia Información'
        ]);
        factory(Department::class)->create([
            'name'=>'VT',
            'display_name'=>'Ventas'
        ]);
        factory(Department::class)->create([
            'name'=>'MK',
            'display_name'=>'Mercadotecnia'
        ]);
        factory(Department::class)->create([
            'name'=>'SG',
            'display_name'=>'Servicios Generales'
        ]);
        factory(Department::class)->create([
            'name'=>'AB',
            'display_name'=>'Alimentos & Bebidas'
        ]);
        factory(Department::class)->create([
            'name'=>'SE',
            'display_name'=>'Servicio al Cliente Excepcional'
        ]);
        factory(Department::class)->create([
            'name'=>'SL',
            'display_name'=>'Serena Living'
        ]);
        factory(Department::class)->create([
            'name'=>'SC-ROS',
            'display_name'=>'SerenaCenter ROS-1'
        ]);
        factory(Department::class)->create([
            'name'=>'SC-TIJ',
            'display_name'=>'SerenaCenter TIJ-1'
        ]);
    }
}



