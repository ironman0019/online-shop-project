<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreOrUpdateSettingRequest;
use App\Models\Setting\Setting;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.site.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = Setting::first();
        return view('admin.setting.site.set', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOrUpdate(StoreOrUpdateSettingRequest $request, ImageUploadService $imageUploadService)
    {
        $setting = Setting::first();
        $inputs = $request->all();

        // If setting exist we update the databse
        if($setting) {

            if($request->hasFile('logo')) {
                // Remove old image
                $imageUploadService->removeImage($setting->logo);
    
                $result = $imageUploadService->uploadImage($request->file('logo'), 'logo');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['logo'] = $result;
            }

            if($request->hasFile('icon')) {
                // Remove old image
                $imageUploadService->removeImage($setting->icon);
    
                $result = $imageUploadService->uploadImage($request->file('icon'), 'icon');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['icon'] = $result;
            }
    
            $setting->update($inputs);
            return to_route('admin.setting.index')->with('swal-success', 'تنظیمات با موفقیت ویرایش شد');
        }

        // else we store the data

        else
        {
            if($request->hasFile('logo')) {
                $result = $imageUploadService->uploadImage($request->file('logo'), 'logo');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['logo'] = $result;
            }

            if($request->hasFile('icon')) {
                $result = $imageUploadService->uploadImage($request->file('icon'), 'icon');
                if($result === false) {
                    return back()->with('swal-error', 'خطا در آپلود عکس');
                }
                $inputs['icon'] = $result;
            }
    
            Setting::create($inputs);
            return to_route('admin.setting.index')->with('swal-success', 'تنظیمات با موفقیت ساخته شد');
        }
    }


}
