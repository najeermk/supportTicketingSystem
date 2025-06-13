<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable = ['ticket_type', 'subject', 'description', 'email'];

    public function setConnectionName($connection)
    {
        $this->setConnection($connection);
    }

    public static function allFromDepartments()
    {
        $technical = self::on('mysql_technical')->get()->map(function ($ticket) {
            return $ticket;
        });

        $billing = self::on('mysql_billing')->get()->map(function ($ticket) {
            return $ticket;
        });

        $feedback = self::on('mysql_feedback')->get()->map(function ($ticket) {
            return $ticket;
        });
        
        $products = self::on('mysql_products')->get()->map(function ($ticket) {
            return $ticket;
        });

        $inquiries = self::on('mysql_inquiries')->get()->map(function ($ticket) {
            return $ticket;
        });

        return $technical->concat($billing)->concat($feedback)->concat($products)->concat($inquiries)->values();
    }
}
