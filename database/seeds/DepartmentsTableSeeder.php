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
            'display_name'=>'Direccion General'
        ]);
        factory(Department::class)->create([
            'name'=>'IT',
            'display_name'=>'Tecnologias de Informacion'
        ]);
        factory(Department::class)->create([
            'name'=>'HR',
            'display_name'=>'Recursos Humanos'
        ]);
        factory(Department::class)->create([
            'name'=>'AF',
            'display_name'=>'Finanzas y Contabilidad'
        ]);

    }
}
