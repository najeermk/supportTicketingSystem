<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    private function getConnectionFromDepartment($department)
{
    $map = [
        'technical' => 'mysql_technical',
        'billing' => 'mysql_billing',
        'feedback' => 'mysql_feedback',
        'products' => 'mysql_products',
        'inquiries' => 'mysql_inquiries',
    ];

    return $map[$department] ?? config('database.default');
}

    public function index()
    {
        $tickets = Ticket::allFromDepartments();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show($department, $id)
    {
        $connection = $this->getConnectionFromDepartment($department);

        $ticket = Ticket::on($connection)->findOrFail($id);

        return view('admin.tickets.show', compact('ticket'));
    }

    public function addNote(Request $request, $department, $id)
    {   
        $connection = $this->getConnectionFromDepartment($department);
        $ticket = Ticket::on($connection)->findOrFail($id);

        $ticket->note = $request->note;
        $ticket->status = 'Noted';
        $ticket->save();

        return redirect()->back()->with('success', 'Note added and ticket marked as Noted.');
    }

}
