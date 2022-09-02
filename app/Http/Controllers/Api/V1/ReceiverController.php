<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Receiver;
use App\Repositories\ReceiverRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    protected ReceiverRepository $receiverRepository;

    public function __construct(ReceiverRepository $receiverRepository)
    {
        $this->receiverRepository = $receiverRepository;
    }
    /**
     * Retorna todos los receptores registrados
    */
    public function index(): JsonResponse
    {
        return response()->json($this->receiverRepository->all());
    }
    /**
     * Crea un receptor
    */
    public function store(Request $request): JsonResponse
    {
        $receiver = $this->receiverRepository->save(new Receiver($request->all()));
        return response()->json($receiver, 201);
    }
    /**
     * Actualiza un receptor
    */
    public function update(Request $request, Receiver $receiver): JsonResponse
    {
        $receiver->fill($request->all());
        return response()->json($this->receiverRepository->save($receiver), 200);
    }
}
