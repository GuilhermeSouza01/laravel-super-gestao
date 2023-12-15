<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view("app.fornecedor.index");
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();


        return view("app.fornecedor.listar", ["fornecedores" => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = "";
        //inclusao
        if ($request->input("_token") !=  "" && $request->input("id") ==  "") {
            //validacao
            $regras = [
                "nome" => "required | min:3 | max:40",
                "uf" => "required | min:2 | max:2",
                "email" => "email",
            ];


            $feedback = [
                "required" => "O campo :attribute deve ser preenchido",
                "nome.min" => "O campo deve ter no mínimo 3 caracteres",
                "nome.max" => "O campo deve ter no máximo 40 caracteres",
                "uf.min" => "O campo deve ter no mínimo 2 caracteres",
                "uf.max" => "O campo deve ter no máximo 2 caracteres",
                "email.email" => "O campo e-mail não foi preenchido corretamente",
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = "O cadastro foi realizado com sucesso";
        }
        //ediçao
        if ($request->input("_token") !=  "" && $request->input("id") !=  "") {
            $fornecedor = Fornecedor::find($request->input("id"));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg =  "Atualização realizada com Sucesso";
            } else {
                $msg = "Erro ao tentar atualizar os registros";
            }

            return redirect()->route("app.fornecedor.editar", ["id" => $request->input("id"), "msg" => $msg]);
        }

        return view("app.fornecedor.adicionar", ["msg" => $msg]);
    }

    public function editar($id, $msg = "")
    {
        $fornecedor = Fornecedor::find($id);

        return view("app.fornecedor.adicionar", ["fornecedor" => $fornecedor, "msg" => $msg]);
    }
}
