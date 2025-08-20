<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LgRequirement;
use Illuminate\Http\JsonResponse;

class LgRequirementController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $requirements = LgRequirement::with([
                'user_revision',
                'lgCostcenter',
                'lgPlace',
                'details',
            ])
            ->latest()
            ->get();

            $data = $requirements->map(function ($req) {
                $prioridad = match (true) {
                    is_numeric($req->priority) && (int)$req->priority === 1 => 'Alta',
                    is_numeric($req->priority) && (int)$req->priority === 2 => 'Media',
                    is_numeric($req->priority) && (int)$req->priority === 3 => 'Baja',
                    is_string($req->priority) =>
                        ucfirst(strtolower($req->priority)),
                    default => 'Pendiente',
                };

                return [
                    'id' => 'RQA-' . str_pad($req->id, 3, '0', STR_PAD_LEFT),
                    'estado' => $req->status ?? 'Pendiente',
                    'fechaSolicitud' => optional($req->date ?? $req->created_at)->toDateString(),
                    'prioridad' => $prioridad,
                    'revisadoPor' => optional($req->user_revision)->name ?? 'Pendiente',
                    'revisionAprobacion' => $req->reason ?? 'Sin observaciones',
                    'centroCosto' => optional($req->lgCostcenter)->name ?? '',
                    'lugar' => $req->location ?? optional($req->lgPlace)->name ?? '',
                    'detalle' => $req->details->first()?->description ?? '',
                    'sustentoUrl' => $req->sustento_file ?? '',
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Requerimientos obtenidos correctamente',
                'data' => $data,
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener requerimientos',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
