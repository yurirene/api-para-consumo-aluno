<?php 

namespace App\Services;

use App\Models\Endereco;
use App\Models\Evento;
use Throwable;

class EventoService
{
    public function list() : ?array
    {
        try {
            return Evento::with('endereco')->get()->toArray();
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function store(array $request) : ?array
    {
        try {
            $evento = Evento::create([
                'nome' => $request['nome'],
                'contato' => $request['contato'],
                'data' => $request['data'],
                'hora' => $request['hora']   
            ]); 
            Endereco::create([
                'logradouro' => $request['logradouro'],
                'numero' => $request['numero'],
                'bairro' => $request['bairro'],
                'cidade' => $request['cidade'],
                'uf' => $request['uf'],
                'cep' => $request['cep'],
                'evento_id' => $evento->id
            ]);
            return $evento->load('endereco')->toArray();
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function delete(int $id) : void
    {
        try {
            $evento = Evento::find($id);
            $evento->endereco()->delete();
            $evento->delete();
        } catch (Throwable $th) {
            throw $th;
        }
    }
}