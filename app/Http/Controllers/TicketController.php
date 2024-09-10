<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::where('status', 3)->get();
        return view('admin.completeTicket',compact('tickets'));
    }
    public function createTicket(Request $request){
        $ticket = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'Field is required',
            'email.required' => 'Field is required',
            'subject.required' => 'Field is required',
            'message.required' => 'Field is required'
        
        ]);
        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $ticket = Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 0,
            'code' => $code,
        ]);

        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Ticket successfully created and your ticket code is <stong>'.$code.'</stong>'
        ]);
    }
    public function TicketStatus(Request $request){
        $status = Ticket::where('code', $request->code)->value('status');
        if($status == 0){
            return redirect()->back()->with([
                'type' => 'warning',
                'message' => '<strong>Not Confirm</strong> Your ticket has not been Confirmed Yet.'
            ]);
        }else if($status == 1){
            return redirect()->back()->with([
                'type' => 'info',
                'message' => '<strong>Confirmed</strong> Your ticket has been Confirmed and in a Queue.'
            ]);
        }else if($status == 2){
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => '<strong>Cancled</strong> Your ticket has been Rejected.'
            ]);
        }else if($status == 3){
            return redirect()->back()->with([
                'type' => 'success',
                'message' => '<strong>Completed</strong> Your ticket has been Completed.'
            ]);
        }
    }
    public function newTickets(){
        $tickets = Ticket::where('status',0)->get();
        return view('admin.confirmedInquiry',compact('tickets'));
    }
    public function updateTickets(Request $request, string $id){
        if($request->status == 1){
            Ticket::where('id', $id)->update([
                'status' => $request->status,
            ]);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Ticket Confirmed successfully'
            ]);
        }
        if($request->status == 2){
            Ticket::where('id', $id)->update([
                'status' => $request->status,
            ]);
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Ticket Rejected successfully'
            ]);
        }
        if($request->status == 3){
            Ticket::where('id', $id)->update([
                'status' => $request->status,
            ]);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Ticket Completed successfully'
            ]);
        }
    }
    public function manageTickets(){
        $tickets = Ticket:: where('status',1)->get();
        return view('admin.manageInquiry',compact('tickets'));
    }
}
