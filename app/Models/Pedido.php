<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos()
    {
        return $this->belongsToMany('App\Models\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('created_at');


        // Parametros para o belongToMany
        // 1 - Modelo do relacionamento NxN em relação ao Modelo que estamos implementando
        // 2 - A tabela auxiliar que armazena os registros de relacionamento
        // 3 - Representa o nome da fk da tabela mapeada pelo modelo na tabela de relacionamento
        // 4 - Representa o nome da fk da tabela mapeada pelo model utilizado no relacionamento que estamos implementando 
    }
}
