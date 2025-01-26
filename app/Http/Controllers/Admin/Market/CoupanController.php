<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreCoupanRequest;
use App\Models\Market\Coupan;
use Illuminate\Http\Request;

class CoupanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupans = Coupan::all();
        return view('admin.market.coupan.index', compact('coupans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.coupan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoupanRequest $request)
    {
        $inputs = $request->all();
        // Take only 10 digit of timestamp that date picker create
        $realStartDate = substr($inputs['start_date'], 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int)$realStartDate);

        $realendDate = substr($inputs['end_date'], 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int)$realendDate);

        Coupan::create($inputs);
        return to_route('admin.market.coupan.index')->with('swal-success', 'کد تخفیف با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupan $coupan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupan $coupan)
    {
        return view('admin.market.coupan.edit', compact('coupan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupan $coupan)
    {
        $inputs = $request->all();
        
        $realStartDate = substr($inputs['start_date'], 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int)$realStartDate);

        $realendDate = substr($inputs['end_date'], 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int)$realendDate);

        $coupan->update($inputs);
        return to_route('admin.market.coupan.index')->with('swal-success', 'کد تخفیف با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupan $coupan)
    {
        $coupan->delete();
        return back()->with('swal-success', 'کد تخفیف با موفقیت حذف شد');
    }
}
