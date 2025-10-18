<?php

namespace App\Http\Controllers;

use App\Application\Plans\DTOs\UpdatePlanDTO;
use App\Application\Users\DTOs\CreateUserDTO;
use App\Application\Users\DTOs\UpdateUserDTO;
use App\Application\Users\UseCases\CreateUserUseCase;
use App\Application\Users\UseCases\DeleteUserUseCase;
use App\Application\Users\UseCases\ListUserUseCase;
use App\Application\Users\UseCases\ShowUserUseCase;
use App\Application\Users\UseCases\UpdateUserUseCase;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListUserUseCase $listUserUseCase)
    {
        try {
            $user = $listUserUseCase->execute();

            return $user;
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request, CreateUserUseCase $createUserUseCase)
    {
        try {
            $createUserDTO = new CreateUserDTO(
                name: $request->name,
                email: $request->email,
                password: $request->password,
                companyId: $request->company_id,
            );
            $data = $createUserUseCase->execute($createUserDTO);
            return response()->json(['code' => 200, 'data' => new UserResource($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ShowUserUseCase $showUserUseCase)
    {
        $data = $showUserUseCase->execute($id);
        return response()->json(['code' => 200, 'data' => new UserResource($data)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id, UpdateUserUseCase $updateUserUseCase)
    {
        try {
            $user = new UpdateUserDTO(
                id: $id,
                name: $request->name,
                email: $request->email,
                password: $request->password,
            );

            $data = $updateUserUseCase->execute($user);
            return response()->json(['code' => 200, 'data' => new UserResource($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeleteUserUseCase $deleteUserUseCase)
    {
        try {
            $deleteUserUseCase->execute($id);
            return response()->json(['code' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }
}
