<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        //First way to save in db

        // $contato = new SiteContato();
        // $contato->nome = $request->input("nome");
        // $contato->telefone = $request->input("telefone");
        // $contato->email = $request->input("email");
        // $contato->motivo_contato = $request->input("motivo_contato");
        // $contato->mensagem = $request->input("mensagem");

        // // print_r($contato->getAttributes());
        // $contato->save();

        //Second way
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        //Third way

        // $contato = new SiteContato();
        // $contato->create($request->all());

        $motivo_contato = MotivoContato::all();

        return view("site.contato", ["motivo_contatos" => $motivo_contato]);
    }

    public function salvar(Request $request)
    {

        $regras =    [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedbacks =  [

            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome pode ter no maximo 40 caracteres',
            'nome.unique' => 'O nome digitado já foi escolhido',
            'email.email' => 'O email informado não é valido',

            'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido',
        ];


        $request->validate($regras, $feedbacks);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
