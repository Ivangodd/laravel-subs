<?php

namespace App\Http\Controllers;

use App\Application\Subscriptions\DTOs\CreateSubscriptionDTO;
use App\Application\Subscriptions\UseCases\CreateSubscriptionUseCase;
use App\Http\Requests\Subscription\CreateSubscriptionRequest;
use App\Http\Resources\Subscription\SubscriptionResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubscriptionRequest $request, CreateSubscriptionUseCase $createSubscriptionUseCase)
    {
        try {
            $createSubscriptionDTO = new CreateSubscriptionDTO(
                companyId: $request->company_id,
                planId: $request->plan_id,
                startAt: Carbon::parse($request->start_at),
                endAt: Carbon::parse($request->start_at)->addMonth(),
            );

            $data = $createSubscriptionUseCase->execute($createSubscriptionDTO);

            return response()->json(['code' => 200, 'data' => new SubscriptionResource($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
