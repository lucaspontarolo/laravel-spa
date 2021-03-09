<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Support\SelectOption;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BrandController extends Controller
{
    public function getAllToSelect()
    {
        $brands = Brand::select('id', 'name')
            ->orderBy('name')
            ->get();

        $brandsToSelect = $brands->map(function ($brand) {
            return new SelectOption($brand->id, $brand->name);
        })->toArray();

        return response()->json($brandsToSelect, HttpResponse::HTTP_OK);
    }
}
