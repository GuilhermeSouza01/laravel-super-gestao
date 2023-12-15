<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = "";

        if ($request->get("erro") == 1) {
            $erro = "Usuário e/ou senha não existe";
        }
        if ($request->get("erro") == 2) {
            $erro = "Necessário realizar login para ter acesso a página";
        }



        return view("site.login", ['titulo' => 'Login', "erro" => $erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        //se não passar pelo validate
        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuario: $email | Senha: $password";
        echo "<br>";

        $user = new User();


        $usuario = $user->where("email", $email)->where("password", $password)->get()->first();

        if (isset($usuario->name)) {

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');
        } else {
            return redirect()->route("site.login", ["erro" => 1]);
        }
    }

    public function sair(Request $request)
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
