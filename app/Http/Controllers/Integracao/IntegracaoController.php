<?php

namespace App\Http\Controllers\Integracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// added
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;

/**
 * @group Integração
 */
class IntegracaoController extends Controller
{   
    /**
     * Integrar/Clientes
     *
     */
    public function integrarClientes(Request $request) 
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        $clientes_json = $response->json();

        foreach ($clientes_json as $cliente_json) 
        {
            $cliente = Cliente::where('id_jsonph', $cliente_json['id'])->first();
            if (!$cliente) {
                $cliente = new Cliente();
            }

            $cliente->id_jsonph = $cliente_json['id'];
            $cliente->name      = $cliente_json['name'];
            $cliente->username  = $cliente_json['username'];
            $cliente->email     = $cliente_json['email'];
            $cliente->phone     = $cliente_json['phone'];
            $cliente->website   = $cliente_json['website'];
            $cliente->save();
        }

        return Cliente::all();
    }

}
