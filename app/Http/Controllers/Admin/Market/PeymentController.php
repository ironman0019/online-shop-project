<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Peyment;
use Illuminate\Http\Request;

class PeymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peyments = Peyment::paginate(6);
        return view('admin.market.peyment.index', compact('peyments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Peyment $peyment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peyment $peyment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peyment $peyment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peyment $peyment)
    {
        //
    }
}
