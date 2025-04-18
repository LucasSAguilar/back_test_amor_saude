<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinica;

class ClinicaController extends Controller
{
    public function index()
    {
        return Clinica::all();
    }

    public function show($id)
{
    $clinica = \App\Clinica::find($id);

    if (!$clinica) {
        return response()->json(['message' => 'Clínica não encontrada'], 404);
    }
    return response()->json($clinica);
}


    public function store(Request $request)
{
    $rules = [
        'razao_social' => 'required|string|max:255',
        'nome_fantasia' => 'required|string|max:255',
        'cnpj' => 'required|string|max:20',
        'regional' => 'required|string|max:255',
        'data_inauguracao' => 'required|date',
        'ativa' => 'boolean',
        'especialidades' => 'array|min:5',
        'especialidades.*' => 'string',
    ];
    
    $validator = \Validator::make($request->all(), $rules);
    
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    
    $clinica = Clinica::create($request->all());
    
    return response()->json($clinica, 201);
    

    $clinica = Clinica::create($validatedData);

    return response()->json($clinica, 201);
}


    public function update(Request $request, $id)
    {
    $clinica = Clinica::findOrFail($id);

    $clinica->update($request->only([
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'regional',
        'data_inauguracao',
        'ativa',
        'especialidades'
    ]));

    return response()->json($clinica, 200);
    }


    public function destroy($id)
{
    $clinica = Clinica::find($id);

    if (!$clinica) {
        return response()->json(['message' => 'Clínica não encontrada.'], 404);
    }

    $clinica->delete();

    return response()->json(['message' => 'Clínica deletada com sucesso.']);
}

}
