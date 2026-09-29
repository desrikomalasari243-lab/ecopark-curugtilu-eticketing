<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function index()
    {
        return response()->json(Ticket::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'price' => 'required|numeric',
            'valid_until' => 'required|date'
        ]);

        $ticket = Ticket::create([
            'code' => 'TCK-' . strtoupper(Str::random(6)),
            'type' => $request->type,
            'price' => $request->price,
            'status' => 'active',
            'valid_until' => $request->valid_until,
        ]);

        return response()->json(['message' => 'Tiket berhasil dibuat', 'data' => $ticket], 201);
    }
}
