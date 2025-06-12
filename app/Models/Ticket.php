<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_type', 'subject', 'description', 'email'];

    public function setConnectionName($connection)
    {
        $this->setConnection($connection);
    }
}
