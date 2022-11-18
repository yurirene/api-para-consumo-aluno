<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'eventos';
    
    public const RULES = [
        'nome' => 'required|min:2',
        'contato' => 'required|min:8',
        'data' => 'required|date',
        'hora' => 'required'
    ];

    public const ATTRIBUTES = [
        'nome' => 'Nome',
        'contato' => 'Contato',
        'data' => 'Data do Evento',
        'hora' => 'Hora do Evento'
    ];

    public const MESSAGES = [
        '*.required' => 'O campo :attribute é obrigatório',
        'contato.min' => 'O campo contato deve ter no mínimo 8 dígitos',
        'date' => 'O campo :atribute deve ser uma data válida'
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'evento_id');
    }

}
