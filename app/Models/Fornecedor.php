<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fornecedor extends Model
{
    use HasFactory;

    protected $table = "fornecedores";
    protected $fillable = ['nome', 'uf', 'email'];

    public function produtos()
    {
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id');
    }
}
