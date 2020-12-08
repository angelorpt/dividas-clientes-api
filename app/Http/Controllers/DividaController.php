<?php

namespace App\Http\Controllers;

use App\Models\Divida;
use App\Models\Cliente;
use Illuminate\Http\Request;

/**
 * @group Dividas
 */
class DividaController extends Controller
{
    /**
     * Listar
     *
     */
    public function index()
    {
        return Divida::all();
    }

    /**
     * Consultar
     * 
     * @urlParam id required ID da Dívida. Example: 1
     *
     */
    public function show($id)
    {
        $divida = Divida::find($id);
        if (!$divida) {
            $result = [
                'success' => false,
                'message' => 'Dívida não encontrada.'
            ];
            return response()->json($result, 404);
        }
        $cliente = $divida->cliente()->first();
        $divida['cliente_nome'] = $cliente->name;

        return $divida;
    }    

    /**
     * Salvar
     * 
     * @bodyParam motivo      string   required  Motivo da Dívida. Example: Compra de telefone
     * @bodyParam data        date     required  Data da Dívida.   Example: 2020-12-03
     * @bodyParam valor       numeric  required  Valor da Dívida.  Example: 1299.90
     * @bodyParam cliente_id  integer  required  ID do Cliente.    Example: 1
     */
    public function store(Request $request)
    {

        // Valida a Requisição
        // ------------------------------------------------
        request()->validate([
            'motivo'      => 'required|string|max:100',
            'data'        => 'required|date',
            'valor'       => 'required|numeric',
            'cliente_id'  => 'required|integer',
        ]);

        // Dados da Requisição
        // ------------------------------------------------
        $dados = $request->json()->all();           
        
        // Localiza o Cliente
        // ------------------------------------------------
        $cliente = Cliente::find($dados['cliente_id']);
        if (!$cliente) {
            $result = [
                'success' => false,
                'message' => 'Cliente não encontrado'
            ];
            return response()->json($result, 404);
        }            

        // Salva a Divida
        // ------------------------------------------------
        if (!$divida = Divida::create($dados)) {
            $result = [
                'success' => false,
                'message' => 'Falha ao Salvar a Dívida'
            ];
            return response()->json($result, 422);
        }

        // Retorno da API
        // ------------------------------------------------
        $result = [
            'success' => true,
            'message' => 'Dívida Salva com Sucesso',
        	'data'    => $divida
        ];
        return response()->json($result, 201);

    }

    /**
     * Atualizar
     * 
     * @urlParam id required ID da Dívida. Example: 1
     * 
     * @bodyParam motivo      string   required  Motivo da Dívida. Example: Compra de telefone
     * @bodyParam data        date     required  Data da Dívida.   Example: 2020-12-03
     * @bodyParam valor       numeric  required  Valor da Dívida.  Example: 1299.90
     * @bodyParam cliente_id  integer  required  ID do Cliente.    Example: 1
     *
     */
    public function update(Request $request, $id)
    {

        // Valida a Requisição
        // ------------------------------------------------
        request()->validate([
            'motivo'      => 'required|string|max:100',
            'data'        => 'required|date',
            'valor'       => 'required|numeric',
            'cliente_id'  => 'required|integer',
        ]);

        // Dados da Requisição
        // ------------------------------------------------
        $dados = $request->json()->all();                

        // Localiza o Cliente
        // ------------------------------------------------
        $cliente = Cliente::find($dados['cliente_id']);
        if (!$cliente) {
            $result = [
                'success' => false,
                'message' => 'Cliente não encontrado'
            ];
            return response()->json($result, 404);
        }


        // Localiza a Divida
        // ------------------------------------------------
        $divida = Divida::find($id);
        if (!$divida) {
            $result = [
                'success' => false,
                'message' => 'Dívida não encontrada.'
            ];
            return response()->json($result, 404);
        }

        
        // Salva a Divida
        // ------------------------------------------------
        if (!$divida->update($dados)) {
            $result = [
                'success' => false,
                'message' => 'Falha ao Salvar a Dívida'
            ];
            return response()->json($result, 422);
        }

        // Retorno da API
        // ------------------------------------------------
        $result = [
            'success' => true,
            'message' => 'Dívida Atualizada com Sucesso',
        	'data'    => $divida
        ];
        return response()->json($result, 200);        
    }

    /**
     * Deletar
     * 
     * @urlParam id required ID da Dívida. Example: 1
     */
    public function destroy($id)
    {
        $divida = Divida::find($id);
        if (!$divida) {
            $result = [
                'success' => false,
                'message' => 'Dívida não encontrada.'
            ];
            return response()->json($result, 404);
        }

        $divida->delete();
        $result = [
            'success' => true,
            'message' => 'Dívida Deletada com Sucesso'
        ];
        return response()->json($result, 200);
    }
}
