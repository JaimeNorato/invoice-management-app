<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Issuer;
use App\Repositories\IssuerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IssuerController extends Controller
{
    private IssuerRepository $issuerRepository;

    public function __construct(IssuerRepository $issuerRepository)
    {
        $this->issuerRepository = $issuerRepository;
    }
    /**
     * Retorna todos los emisores registrados
    */
    public function index(): JsonResponse
    {
        return response()->json($this->issuerRepository->all());
    }
    /**
     * Crea un emisor
    */
    public function store(Request $request): JsonResponse
    {
        $issuer = $this->issuerRepository->save(new Issuer($request->all()));
        return response()->json($issuer, 201);
    }
    /**
     * Actualiza un emisor
    */
    public function update(Request $request, Issuer $issuer): JsonResponse
    {
        $issuer->fill($request->all());
        return response()->json($this->issuerRepository->save($issuer), 200);
    }
}
