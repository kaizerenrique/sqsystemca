<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rol de Administrador
        $roleAdministrador = $role = Role::create(['name' => 'Administrador']);

        // Rol de Laboratorio
        $roleLaboratorio = $role = Role::create(['name' => 'Laboratorio']);

        // Rol de Usuario
        $roleUsuario = $role = Role::create(['name' => 'Usuario']);

        //Permisos
        $permission = Permission::create(['name' => 'personas'])->syncRoles([$roleAdministrador,$roleLaboratorio]);

        //usuario
        User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        //usuario
        User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        //usuario
        User::create([
            'name' => 'Odennis Quiroz',
            'email' => 'ohaymard@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Laboratorio',
            'email' => 'paciente_adn@gmail.com',
            'password' => bcrypt('adn123456')
        ])->assignRole('Laboratorio');
    }
}
