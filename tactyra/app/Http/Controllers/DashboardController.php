<?php

namespace App\Http\Controllers;

use App\Models\Player;

class DashboardController extends Controller
{
    public function index()
    {
        // obtener jugadores
        $players = Player::latest()->get();

        // obtener lista de clubes únicos
        $clubs = Player::select('club')
            ->whereNotNull('club')
            ->distinct()
            ->pluck('club');

        // enviar datos a la vista
        return view('dashboard', compact('players','clubs'));
    }
}