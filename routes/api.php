<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\GateLogController;

// Auth Route
Route::post('/login', [AuthController::class, 'login']);

// Ticket Routes
Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);

// Transaction Routes
Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);

// Gate Log / Scan Route
Route::post('/gate/scan', [GateLogController::class, 'scan']);
