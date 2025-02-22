<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\ShowCase;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ShowCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showcases = ShowCase::all();
        return view('admin.content.showcase.index', compact('showcases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.showcase.create');
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

        if($request->hasFile('image')) {
            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        ShowCase::create($inputs);
        return to_route('admin.content.showcase.index')->with('swal-success', 'بنر با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowCase $showCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowCase $showcase)
    {
        return view('admin.content.showcase.edit', compact('showcase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowCase $showcase, ImageUploadService $imageUploadService)
    {
        $inputs = $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'url' => 'required|max:1000',
            'position' => 'required|in:0,1,2',
            'status' => 'required|in:0,1'
        ]);

        if($request->hasFile('image')) {
            // Remove old image
            $imageUploadService->removeImage($showcase->image);

            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $showcase->update($inputs);
        return to_route('admin.content.showcase.index')->with('swal-success', 'بنر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowCase $showcase, ImageUploadService $imageUploadService)
    {
        // Delete image from project folders
        $imageUploadService->removeImage($showcase->image);
        
        $showcase->delete();
        return back()->with('swal-success', 'بنر با موفقیت حذف شد');
    }
}
