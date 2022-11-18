<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    $rotas = [
        'eventos' => [
            [
                'path' => '/api/eventos',
                'type' => 'GET',
                'description' => 'Listar todos os eventos'
            ],
            [
                'path' => '/api/eventos',
                'type' => 'POST',
                'description' => 'Cadastrar um Evento',
                'parameters' => [
                    'nome' => 'Nome',
                    'contato' => 'Contato',
                    'data' => 'Data do Evento',
                    'hora' => 'Hora do Evento',
                    'logradouro' => 'Logradouro',
                    'numero' => 'Número',
                    'bairro' => 'Bairro',
                    'cidade' => 'Cidade',
                    'uf' => 'Unidade Federativa',
                    'cep' => 'CEP'
                ]
            ],
            [
                'path' => '/api/eventos/{id}',
                'type' => 'DELETE',
                'description' => 'Apagar um evento',
                'query_parameters' => [
                    'id' => 'Id do Evento'
                ]
            ]
        ]
    ];
    return response()->json($rotas);
});

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->get('/eventos', ['uses' => 'EventoController@index']);
    $router->post('/eventos', ['uses' => 'EventoController@store']);
    $router->delete('/eventos/{id}', ['uses' => 'EventoController@delete']);
});