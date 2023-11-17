<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSTANCIANDO O OBJETO
        $fornecedor = new Fornecedor();
        $fornecedor->nome = "Fornecedor 100";
        $fornecedor->email = "contato@fornecedor100.com.br";
        $fornecedor->uf = "MG";
        $fornecedor->save();

        //USANDO O MÉTODO CREATE (ATENCAO PARA O ATRIBUTO "fillable" DA CLASSE)

        Fornecedor::create([
            "nome" => "Fornecedor 200",
            "email" => "contato@fornecedor200.com.br",
            "uf" => "SP"
        ]);

        //INSERT
        DB::table('fornecedores')->insert([
            "nome" => "Fornecedor 300",
            "email" => "contato@fornecedor300.com.br",
            "uf" => "CE"
        ]);
    }
}
