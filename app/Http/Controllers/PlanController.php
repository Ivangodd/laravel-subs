<?php

namespace App\Http\Controllers;

use App\Application\Plans\DTOs\CreatePlanDTO;
use App\Application\Plans\DTOs\UpdatePlanDTO;
use App\Application\Plans\UseCases\CreatePlanUseCase;
use App\Application\Plans\UseCases\DeletePlanUseCase;
use App\Application\Plans\UseCases\ListPlanUseCase;
use App\Application\Plans\UseCases\ShowPlanUseCase;
use App\Application\Plans\UseCases\UpdatePlanUseCase;
use App\Http\Requests\Plan\CreatePlanRequest;
use App\Http\Requests\Plan\UpdatePlanRequest;
use App\Http\Resources\Plan\PlanResourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\returnSelf;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListPlanUseCase $listPlanUseCase)
    {
        try {
            $plant = $listPlanUseCase->execute();

            return $plant;
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePlanRequest $request, CreatePlanUseCase $createPlanUseCase)
    {
        try {
            $plant = new CreatePlanDTO(
                name: $request->name,
                price: $request->price,
                userLimit: $request->user_limit,
                features: $request->features,
            );

            $data = $createPlanUseCase->execute($plant);
            return response()->json(['code' => 200, 'data' => new PlanResourse($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ShowPlanUseCase $showPlanUseCase)
    {

        $data = $showPlanUseCase->execute($id);
        Log::info('Instancia plant creada correctamente', [
            'plant' => $data,
        ]);
        return response()->json(['code' => 200, 'data' => new PlanResourse($data)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, string $id, UpdatePlanUseCase $updatePlanUseCase)
    {
        try {
            $plant = new UpdatePlanDTO(
                id: $id,
                name: $request->name,
                price: $request->price,
                userLimit: $request->user_limit,
                features: $request->features,
            );

            $data = $updatePlanUseCase->execute($plant);
            return response()->json(['code' => 200, 'data' => new PlanResourse($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeletePlanUseCase $deletePlanUseCase)
    {
        try {
            $deletePlanUseCase->execute($id);
            return response()->json(['code' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }
}
