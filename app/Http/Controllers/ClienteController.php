<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cliente;

/**
 * @group Clientes
 */
class ClienteController extends Controller
{
    /**
     * Listar
     *
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Consultar
     * 
     * @urlParam id required ID do Cliente. Example: 1
     *
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            $result = [
                'success' => false,
                'message' => 'Cliente não encontrado'
            ];
            return response()->json($result, 404);
        }

        return $cliente;
    }    

    /**
     * Salvar
     *
     * @bodyParam id         integer  required  ID do Cliente. Example: 1
     * @bodyParam id_jsonph  integer  required  ID do JSON Placeholder. Example: 1
     * @bodyParam name       string   required  Nome do cliente. Example: Leanne Graham
     * @bodyParam username   string   required  Nome de usuário. Example: Bret
     * @bodyParam email      string   optional  Email do cliente. Example: Sincere@april.biz
     * @bodyParam phone      string   optional  Telefone do cliente. Example: 1-770-736-8031 x56442
     * @bodyParam website    string   optional  Website do cliente. Example: hildegard.org
     */
    // public function store(Request $request)
    // {
    //     request()->validate([
    //         'id'         => 'required|integer',
    //         'id_jsonph'  => 'required|integer',
    //         'name'       => 'required|string|max:150',
    //         'username'   => 'required|string|max:50',
    //         'email'      => 'nullable|string|max:100',
    //         'phone'      => 'nullable|string|max:30',
    //         'website'    => 'nullable|string|max:50',
    //     ]);

    // }

    /**
     * Atualizar
     *
     * @bodyParam id         integer  required  ID do Cliente. Example: 1
     * @bodyParam id_jsonph  integer  required  ID do JSON Placeholder. Example: 1
     * @bodyParam name       string   required  Nome do cliente. Example: Leanne Graham
     * @bodyParam username   string   required  Nome de usuário. Example: Bret
     * @bodyParam email      string   optional  Email do cliente. Example: Sincere@april.biz
     * @bodyParam phone      string   optional  Telefone do cliente. Example: 1-770-736-8031 x56442
     * @bodyParam website    string   optional  Website do cliente. Example: hildegard.org
     */
    // public function update(Request $request, Cliente $cliente)
    // {
    //     request()->validate([
    //         'id'         => 'required|integer',
    //         'id_jsonph'  => 'required|integer',
    //         'name'       => 'required|string|max:150',
    //         'username'   => 'required|string|max:50',
    //         'email'      => 'nullable|string|max:100',
    //         'phone'      => 'nullable|string|max:30',
    //         'website'    => 'nullable|string|max:50',
    //     ]);
    // }

    /**
     * Delete
     * 
     * @urlParam id required ID do Cliente. Example: 1
     *
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            $result = [
                'success' => false,
                'message' => 'Cliente não encontrado'
            ];
            return response()->json($result, 404);
        }

        $cliente->delete();
        $result = [
            'success' => true,
            'message' => 'Cliente Deletado com Sucesso'
        ];
        return response()->json($result, 200);
    }
}
