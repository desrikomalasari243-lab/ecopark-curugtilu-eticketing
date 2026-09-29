<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GateLog extends Model
{
    protected $fillable = ['ticket_id', 'petugas_id', 'scanned_at', 'gate_name'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
