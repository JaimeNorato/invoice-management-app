<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\InvoiceDetail;
use App\Repositories\InvoiceDetailRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    protected InvoiceDetailRepository $invoiceDetailRepository;

    public function __construct(InvoiceDetailRepository $invoiceDetailRepository)
    {
        $this->invoiceDetailRepository = $invoiceDetailRepository;
    }
    /**
     * Retorna todos los detalles de factura registrados
     */
    public function index(): JsonResponse
    {
        return response()->json($this->invoiceDetailRepository->all());
    }
    /**
     * Crea un detalle de factura
     */
    public function store(Request $request): JsonResponse
    {
        $invoiceDetail = $this->invoiceDetailRepository->save(new InvoiceDetail($request->all()));
        return response()->json($invoiceDetail, 201);
    }
    /**
     * Actualiza un detalle de factura
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail): JsonResponse
    {
        $invoiceDetail->fill($request->all());
        return response()->json($this->invoiceDetailRepository->save($invoiceDetail), 200);
    }
    /**
     * Elimina un detalle de factura
     */
    public function destroy(InvoiceDetail $invoiceDetail): JsonResponse
    {
        $this->invoiceDetailRepository->delete($invoiceDetail);
        return response()->json(null, 204);
    }
}
