<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function index()
    {

        $motivo_contato = MotivoContato::all();

        return view("site.principal", ["motivo_contatos" => $motivo_contato]);
    }
}
