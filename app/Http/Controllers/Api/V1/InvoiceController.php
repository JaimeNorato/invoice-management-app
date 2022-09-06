<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected InvoiceRepository $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->middleware('auth:api');
        $this->invoiceRepository = $invoiceRepository;
    }
    /**
     * Retorna todas las facturas registradas
     */
    public function index(): JsonResponse
    {
        return response()->json($this->invoiceRepository->all());
    }
    /**
     * Crea una factura
     */
    public function store(Request $request): JsonResponse
    {
        $invoice = $this->invoiceRepository->save(new Invoice($request->all()));
        return response()->json($invoice, 201);
    }
    /**
     * Carga la factura con él, id indicado
     */
    public function show(Invoice $invoice): JsonResponse
    {
        return response()->json($invoice);
    }
    /**
     * Actualiza una factura
     */
    public function update(Request $request, Invoice $invoice): JsonResponse
    {
        $invoice->fill($request->all());
        return response()->json($this->invoiceRepository->save($invoice), 200);
    }
    /**
     * Elimina una factura
     */
    public function destroy(Invoice $invoice): JsonResponse
    {
        $this->invoiceRepository->delete($invoice);
        return response()->json(null, 204);
    }
}
