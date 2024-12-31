<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreBrandRequest;
use App\Models\Market\Brand;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('logo')) {
            $result = $imageUploadService->uploadImage($request->file('logo'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['logo'] = $result;
        }

        Brand::create($inputs);
        return to_route('admin.market.brand.index')->with('swal-success', 'برند با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
