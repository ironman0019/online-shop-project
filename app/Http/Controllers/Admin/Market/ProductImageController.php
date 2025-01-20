<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreProductImageRequest;
use App\Http\Requests\Admin\Market\UpdateProductImageRequest;
use App\Models\Market\Product;
use App\Models\Market\ProductImage;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $productImages = ProductImage::where('product_id', $product->id)->get();
        return view('admin.market.product-image.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product-image.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductImageRequest $request, ImageUploadService $imageUploadService, Product $product)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $inputs['product_id'] = $product->id;

        ProductImage::create($inputs);
        return to_route('admin.market.product-image.index', $product)->with('swal-success', 'عکس با موفقیت ساخته شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage, Product $product)
    {
        return view('admin.market.product-image.edit', compact('productImage', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage, Product $product, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            // Remove old image
            $imageUploadService->removeImage($productImage->image);

            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $inputs['product_id'] = $product->id;

        $productImage->update($inputs);
        return to_route('admin.market.product-image.index', $product)->with('swal-success', 'عکس با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return back()->with('swal-success', 'عکس با موفقیت حذف شد');
    }
}
