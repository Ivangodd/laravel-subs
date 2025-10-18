<?php

namespace App\Http\Controllers;

use App\Application\Companies\DTOs\CreateCompanyDTO;
use App\Application\Companies\DTOs\UpdateCompanyDTO;
use App\Application\Companies\UseCases\CreateCompanyUseCase;
use App\Application\Companies\UseCases\DeleteCompanyUseCase;
use App\Application\Companies\UseCases\ListCompanyUseCase;
use App\Application\Companies\UseCases\ShowCompanyUseCase;
use App\Application\Companies\UseCases\UpdateCompanyUseCase;
use App\Application\Plans\UseCases\UpdatePlanUseCase;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyResourse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListCompanyUseCase $listCompanyUseCase)
    {
        try {
            $company = $listCompanyUseCase->execute();
            return $company;
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCompanyRequest $request, CreateCompanyUseCase $createCompanyUseCase)
    {
         return 'Hola';
        try {
            $company = new CreateCompanyDTO(
                name: $request->name,
                email: $request->email,
            );

            $data = $createCompanyUseCase->execute($company);
            return response()->json(['code' => 200, 'data' => new CompanyResourse($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id, ShowCompanyUseCase $showCompanyUseCase)
    {
        $data = $showCompanyUseCase->execute($id);
        return response()->json(['code' => 200, 'data' => new CompanyResourse($data)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, string $id, UpdateCompanyUseCase $updateCompanyUseCase)
    {

        try {
            $company = new UpdateCompanyDTO(
                id: $id,
                name: $request->name,
                email: $request->email
            );

            $data = $updateCompanyUseCase->execute($company);
            return response()->json(['code' => 200, 'data' => new CompanyResourse($data)]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeleteCompanyUseCase $deleteCompanyUseCase)
    {
        try {
            $deleteCompanyUseCase->execute($id);
            return response()->json(['code' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['code' => 500, 'message' => $th->getMessage()]);
        }
    }
}
