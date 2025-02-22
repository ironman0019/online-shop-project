<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\AdsBanner;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class AdsBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adsBanners = AdsBanner::all();
        return view('admin.content.ads-banner.index', compact('adsBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.ads-banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'url' => 'required|max:1000',
            'position' => 'required|in:0,1,2',
            'status' => 'required|in:0,1'
        ]);

        $adsBanners = AdsBanner::all();

        foreach($adsBanners as $adsBanner) {
            if($adsBanner && $adsBanner->position == $inputs['position']) {
                if($request->hasFile('image')) {
                    // Remove old image
                    $imageUploadService->removeImage($adsBanner->image);
        
                    $result = $imageUploadService->uploadImage($request->file('image'));
                    if($result === false) {
                        return back()->with('swal-error', 'خطا در آپلود عکس');
                    }
                    $inputs['image'] = $result;
                }
               $adsBanner->update($inputs);
               return to_route('admin.content.ads-banner.index')->with('swal-success', 'بنر تبلیغاتی با موفقیت ویرایش شد'); 
            }
        }

        if($request->hasFile('image')) {
            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        AdsBanner::create($inputs);
        return to_route('admin.content.ads-banner.index')->with('swal-success', 'بنر تبلیغاتی با موفقیت ساخته شد');


    }

    /**
     * Display the specified resource.
     */
    public function show(AdsBanner $adsBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdsBanner $adsBanner)
    {
        return view('admin.content.ads-banner.edit', compact('adsBanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdsBanner $adsBanner, ImageUploadService $imageUploadService)
    {
        $inputs = $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'url' => 'required|max:1000',
            'position' => 'required|in:0,1,2',
            'status' => 'required|in:0,1'
        ]);

        if($request->hasFile('image')) {
            // Remove old image
            $imageUploadService->removeImage($adsBanner->image);

            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $adsBanner->update($inputs);
        return to_route('admin.content.ads-banner.index')->with('swal-success', 'بنر تبلیغاتی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdsBanner $adsBanner, ImageUploadService $imageUploadService)
    {
        // Delete image from project folders
        $imageUploadService->removeImage($adsBanner->image);

        $adsBanner->delete();
        return back()->with('swal-success', 'بنر تبلیغاتی با موفقیت حذف شد');
    }
}
