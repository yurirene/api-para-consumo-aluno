<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Evento;
use App\Services\EventoService;
use Illuminate\Http\Request;
use Throwable;

class EventoController extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service = new EventoService(); 
    }

    public function index()
    {
        try {
            return response()->json($this->service->list(), 200);
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, Evento::RULES, Evento::MESSAGES, Evento::ATTRIBUTES);
        $this->validate($request, Endereco::RULES, Endereco::MESSAGES, Endereco::ATTRIBUTES);
        try {
            return response()->json($this->service->store($request->all()), 201);
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function delete(int $id)
    {
        try {
            return response()->json($this->service->delete($id), 204);
        } catch (Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
