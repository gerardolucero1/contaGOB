<?php

use App\User;
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
        factory(App\User::class, 10)->create();

        /*

        // Usuario con el rol cliente
        $cliente = User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('Margarit@1'),
        ]);

        $cliente->assignRole('cliente');

        // Usuario con el rol editor
        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('Margarit@1'),
        ]);

        $editor->assignRole('editor');

        */

        // Usuario con el rol admin
        $admin = User::create([
            'name' => 'Erik',
            'email' => 'ejemplo3@ejemplo',
            'password' => bcrypt('111etics'),
        ]);

        $admin->assignRole('super-admin');

        $admin = User::create([
            'name' => 'Prueba',
            'email' => 'ejemplo2@ejemplo',
            'password' => bcrypt('111etics'),
        ]);

        $admin->assignRole('super-admin');
    }
}
