<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinica;
use Log;

class ClinicaController extends Controller
{
    public function index()
    {
        try {
            $clinicas = Clinica::all();

            if ($clinicas->isEmpty()) {
                return response()->json(['message' => 'Nenhuma clínica encontrada.'], 404);
            }

            return response()->json($clinicas, 200);
        } catch (\Exception $e) {
            Log::error('Erro ao buscar clínicas: ' . $e->getMessage());
            return response()->json(['message' => 'Erro ao buscar clínicas.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $clinica = Clinica::find($id);

            if (!$clinica) {
                return response()->json(['message' => 'Clínica não encontrada.'], 404);
            }

            return response()->json($clinica, 200);
        } catch (\Exception $e) {
            Log::error('Erro ao buscar clínica: ' . $e->getMessage());
            return response()->json(['message' => 'Erro ao buscar clínica.'], 500);
        }
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
            'especialidades' => 'array',
            'especialidades.*' => 'string',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $clinica = Clinica::create($request->all());
            return response()->json($clinica, 201);
        } catch (\Exception $e) {
            Log::error('Erro ao criar clínica: ' . $e->getMessage());
            return response()->json(['message' => 'Erro ao criar clínica.'], 500);
        }
    }


    public function update(Request $request, $id)
    {
        try {
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
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Clínica não encontrada.'], 404);
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar clínica: ' . $e->getMessage());
            return response()->json(['message' => 'Erro ao atualizar clínica.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $clinica = Clinica::find($id);

            if (!$clinica) {
                return response()->json(['message' => 'Clínica não encontrada.'], 404);
            }

            $clinica->delete();
            return response()->json(['message' => 'Clínica deletada com sucesso.'], 200);
        } catch (\Exception $e) {
            Log::error('Erro ao deletar clínica: ' . $e->getMessage());
            return response()->json(['message' => 'Erro ao deletar clínica.'], 500);
        }
    }

}
