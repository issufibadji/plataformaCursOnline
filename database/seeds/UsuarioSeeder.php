<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //bcrypt vai fazer criptografia da senja
        $dados = [
          'name'=>"Issufi Bj",
          'email'=>"admin@gmail.com",
          'password'=>bcrypt("123456"),
        ];
        //verficar se existe email
        if(User::where('email','=',$dados['email'])->count()){
          $usuario = User::where('email','=',$dados['email'])->first();
          $usuario->update($dados);
          echo "Usuario Alterado!";
        }else{
          User::create($dados);
          echo "Usuario Criado!";
        }
    }
}
