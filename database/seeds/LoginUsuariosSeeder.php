<?php

use Illuminate\Database\Seeder;
use App\LoginUsuario;

class LoginUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginUsuario::create([
            'nome' => 'Admin',
            'email' => 'admin@admin.com',
            'senha' => 'sistemaadmin',
            'tipo_acesso' => 1
        ]);
    }
}
