<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcPaymentOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AcPaymentOrderController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $orders = AcPaymentOrder::with([
                'user',
                'userRevision',
                'user_complete',
                'rhBank',
                'lgSupplier',
                'LgCostcenter',
            ])
            ->where('type_desk', 'CHILD')
            ->latest()
            ->take(10)
            ->get();

            $data = $orders->map(function ($order) {
                return [
                    'id' => 'RQF-' . substr($order->created_at->format('y'), -2) . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT),
                    'tipo' => $order->type ?? '',
                    'referenciaIdRqf' => optional($order->acPaymentOrder)->id ? 'RQF-' . substr($order->acPaymentOrder->created_at->format('y'), -2) . '-' . str_pad($order->acPaymentOrder->id, 3, '0', STR_PAD_LEFT) : null,
                    'idRqa' => 'RQA-' . substr($order->created_at->format('y'), -2) . '-' . str_pad($order->id, 3, '0', STR_PAD_LEFT),
                    'idItemRqa' => 'ITEM-' . $order->id,
                    'idPagosGth' => 'GTH-P-' . str_pad($order->id, 3, '0', STR_PAD_LEFT),
                    'idRqs' => 'RQS-' . ($order->reference_id ?? '000'),
                    'inputRqa' => $order->input_rq ?? '',
                    'prioridad' => ucfirst(strtolower($order->priority ?? '')),
                    'fechaSolicitud' => optional($order->created_at)->toDateString(),
                    'estadoPago' => $order->order_status ?? '',
                    'estadoExpediente' => $order->bill_status ?? '',
                    'solicitadoPor' => optional($order->user)->name ?? '',
                    'revisadoPor' => optional($order->userRevision)->name ?? '',
                    'revisionAprobacion' => $order->revision_date,
                    'fechaLimite' => $order->due_date ? $order->due_date . ' 17:00' : null,
                    'centroCosto' => optional($order->LgCostcenter)->name ?? '',
                    'beneficiario' => optional($order->lgSupplier)->business_name ?? '',
                    'banco' => optional($order->rhBank)->description ?? '',
                    'comentario' => $order->note ?? '',
                    'monto' => [
                        'subtotal' => $order->amount ? round($order->amount / (1 + ($order->igv ?? 0) / 100), 2) : 0,
                        'igv' => $order->amount ? round($order->amount - ($order->amount / (1 + ($order->igv ?? 0) / 100)), 2) : 0,
                        'total' => $order->amount ?? 0,
                    ],
                    'moneda' => $order->currency ?? '',
                    'archivo' => $order->general_file ?? null,
                    'archPago' => $order->payment_file ?? null,
                    'fechaPago' => $order->payment_date,
                    'archComprobante' => $order->vaucher_file ?? null,
                    'entregaDocumentos' => $order->check_fisical_docs ? 'SI' : 'NO',
                    'retencion' => $order->check_deduction ? 'SI' : 'NO',
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Órdenes de pago obtenidas correctamente',
                'data' => $data,
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener órdenes de pago',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
