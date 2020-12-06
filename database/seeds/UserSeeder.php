<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->salvarUsuario([
            'name'     => 'admin',
            'email'    => 'admin@email.com',
            'password' => bcrypt('admin')
        ]);
    }

    private function salvarUsuario($dados) 
    {
        $user = User::where('email', $dados['email'])->first();
        
        if (!$user) {
            $user = User::create($dados);
        }
        
        $user->update($dados);
    }
}
