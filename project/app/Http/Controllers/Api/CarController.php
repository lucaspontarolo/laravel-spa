<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Car\StoreCarRequest;
use App\Http\Requests\Api\Car\UpdateCarRequest;
use App\Http\Resources\Api\CarResource;
use App\Models\Car;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand')
            ->orderBy('model')
            ->paginate(10);

        return response()->json(
            CarResource::collection($cars)->resource,
            HttpResponse::HTTP_OK
        );
    }

    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();
        $car = Car::create($data);

        return response()->json([
            'message' => 'Carro criado com sucesso!',
            'car' => CarResource::make($car)
        ], HttpResponse::HTTP_CREATED);
    }

    public function show(Car $car)
    {
        $car->load('brand');

        return response()->json(
            CarResource::make($car),
            HttpResponse::HTTP_OK
        );
    }

    public function update(Car $car, UpdateCarRequest $request)
    {
        $data = $request->validated();
        $car->update($data);

        return response()->json([
            'message' => 'Carro atualizado com sucesso!'
        ], HttpResponse::HTTP_OK);
    }

    public function destroy(Car $car)
    {
        try {
            $car->delete();

            return response()->json([
                'message' => 'Carro removido com sucesso!'
            ], HttpResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao remover o registro, por favor tente novamente!'
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
