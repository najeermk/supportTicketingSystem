<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        return view('support.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ticket_type' => 'required',
            'subject' => 'required|string',
            'description' => 'required|string',
            'email' => 'required|email',
        ]);

        try {
            // Determine the database connection based on ticket type
            $connections = [
                'technical' => 'mysql_technical',
                'billing'   => 'mysql_billing',
                'feedback'  => 'mysql_feedback',
                'products'  => 'mysql_products',
                'inquiries'  => 'mysql_inquiries',
            ];

            $connection = $connections[$data['ticket_type']];

            $ticket = new Ticket($data);
            $ticket->setConnectionName($connection);
            $ticket->save();

            return back()->with('success', 'Ticket submitted successfully!');
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while submitting your ticket.');
        }
    }

}
