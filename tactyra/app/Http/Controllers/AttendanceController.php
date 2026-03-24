<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class AttendanceController extends Controller
{

    public function store(Request $request)
    {

        $attendance = $request->attendance ?? [];

        $totalSessions = 3; // lunes, miércoles, jueves

        $players = Player::all();

        $playersAttendance = [];

        foreach($players as $player){

            $days = $attendance[$player->id] ?? [];

            $present = count($days);

            $missed = $totalSessions - $present;

            $percentage = ($missed / $totalSessions) * 100;

            $playersAttendance[] = [
                'name' => $player->name,
                'percentage' => round($percentage)
            ];

        }

        // ordenar de menor a mayor (0% primero)
        usort($playersAttendance, function ($a, $b) {
            return $a['percentage'] <=> $b['percentage'];
        });

        return redirect()->route('dashboard')
            ->with('attendance_players', $playersAttendance);

    }

}