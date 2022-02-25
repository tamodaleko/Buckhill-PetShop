<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\Brand\CreateBrandRequest;
use App\Http\Resources\V1\BrandResource;
use App\Models\Brand;

class BrandController extends ApiV1Controller
{
    /**
     * @param \App\Http\Requests\V1\Brand\CreateBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateBrandRequest $request)
    {
        $title = trim($request->title);
        
        $brand = Brand::create([
            'title' => $title,
            'slug' => str_slug($title)
        ]);

        if (!$brand) {
            return response()->json([
                'error' => __('Brand couldn\'t be created. Please try again.')
            ], 500);
        }

        return new BrandResource($brand);
    }
}
