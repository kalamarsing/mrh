<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;

class RoleTableSeeder extends Seeder {
    public function run() {
        $role = new Role();
        $role->name = 'Limpieza';
        $role->save();        
        
        $role = new Role();
        $role->name = 'Mantenimiento';
        $role->save();      

        $role = new Role();
        $role->name = 'Check In';
        $role->save();      

        $role = new Role();
        $role->name = 'Administracion';
        $role->save();      

        $role = new Role();
        $role->name = 'Gestoria';
        $role->save();      

        $role = new Role();
        $role->name = 'Transporte Ropa';
        $role->save();      

        $role = new Role();
        $role->name = 'Lavanderia';
        $role->save();          
    }
}