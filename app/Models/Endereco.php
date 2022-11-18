<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'enderecos';
    
    
    public const RULES = [
        'logradouro' => 'required',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'uf' => 'required',
        'cep' => 'required'
    ];

    public const ATTRIBUTES = [
        'logradouro' => 'Logradouro',
        'numero' => 'Número',
        'bairro' => 'Bairro',
        'cidade' => 'Cidade',
        'uf' => 'Unidade Federativa',
        'cep' => 'CEP'
    ];

    public const MESSAGES = [
        '*.required' => 'O campo :attribute é obrigatório',
    ];
}
