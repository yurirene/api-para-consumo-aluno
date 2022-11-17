<?php

namespace App\Http\Controllers;

use Throwable;

class EventoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index() 
    {
        try {
            return 
        } catch (Throwable $th) {
            return response()->json(['mensagem' => $th->getMessage()], 500);
        }
    }
}
