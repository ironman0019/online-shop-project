<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketCategoryRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketCategoryRequest;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketCategories = TicketCategory::all();
        return view('admin.ticket.ticket-category.index', compact('ticketCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.ticket-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketCategoryRequest $request)
    {
        $inputs = $request->all();

        TicketCategory::create($inputs);
        return to_route('admin.tickets.ticket-category.index')->with('swal-success', 'دسته بندی تیکت با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketCategory $ticketCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketCategory $ticketCategory)
    {
        return view('admin.ticket.ticket-category.edit', compact('ticketCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        $inputs = $request->all();

        $ticketCategory->update($inputs);
        return to_route('admin.tickets.ticket-category.index')->with('swal-success', 'دسته بندی تیکت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketCategory $ticketCategory)
    {
        $ticketCategory->delete();
        return back()->with('swal-success', 'دسته بندی تیکت با موفقیت حذف شد');
    }
}
