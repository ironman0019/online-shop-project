<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::whereNull('parent_id')->get();
        return view('admin.ticket.tickets.index', compact('tickets'));
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
    public function store(StoreTicketRequest $request)
    {
        $inputs = $request->all();

        $parentTicket = Ticket::find($inputs['parent_id']);
        $inputs['subject'] = $parentTicket->subject;
        $inputs['status'] = $parentTicket->status;
        $inputs['reference_id'] = $parentTicket->admin->user->id;
        $inputs['user_id'] = Auth::user()->id;
        $inputs['category_id'] = $parentTicket->category->id;

        Ticket::create($inputs);
        return to_route('admin.tickets.ticket.index')->with('swal-success', 'تیکت با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('admin.ticket.tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        if($ticket->parent_id == null) {
            return to_route('admin.tickets.ticket.index');
        }

        $inputs = $request->all();

        $ticket->update($inputs);
        return to_route('admin.tickets.ticket.index')->with('swal-success', 'تیکت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return back()->with('swal-success', 'تیکت با موفقیت حذف شد');
    }

    // Change status
    public function status(Ticket $ticket)
    {

        if($ticket->parent_id != null) {
            return to_route('admin.tickets.ticket.index');
        }

        $ticketChildren = $ticket->children()->get();

        if ($ticket->status) {
            $ticket->status = 0;
            foreach($ticketChildren as $ticketChild) {
                $ticketChild->status = 0;
                $ticketChild->save();
            }

        } else {
            $ticket->status = 1;
            foreach($ticketChildren as $ticketChild) {
                $ticketChild->status = 1;
                $ticketChild->save();
            }
        }

        $ticket->save();
        return back();
    }
}
