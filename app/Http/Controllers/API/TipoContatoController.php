<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TipoContatoResource;
use App\Models\TipoContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoContatos = TipoContato::all();
        return response(['data' => TipoContatoResource::collection($tipoContatos), 'message' => 'Listado com sucesso'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'tipo' => 'required|max:128'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Erro na validação dos campos']);
        }

        $tipoContatos = TipoContato::create($data);

        return response(['data' => new TipoContatoResource($tipoContatos), 'message' => 'Cadastrado com Sucesso'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoContato  $tipoContato
     * @return \Illuminate\Http\Response
     */
    public function show(TipoContato $tipoContato)
    {
        return response(['data' => new TipoContatoResource($tipoContato), 'message' => 'Busca realizada com sucesso'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoContato  $tipoContatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoContato $tipoContato)
    {
        $tipoContato->update($request->all());

        return response(['data' => new TipoContatoResource($tipoContato), 'message' => 'Dados atualizados com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoContato  $tipoContato
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoContato $tipoContato)
    {
        $tipoContato->delete();

        return response(['message' => 'Registro excluído com sucesso']);
    }
}
