<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LevelUp\Experience\Facades\Leaderboard;

class DashboardController extends Controller
{
    /**
     * Get Dashboard for User
     *
     * @return [json] user object
     */
    public function show(Request $request)
    {
        return $this->sendResponse([
            'points' => $request->user()->getPoints(),
            'next_level_at' => $request->user()->nextLevelAt(),
            'level' => $request->user()->getLevel(),
            'achievements' => $request->user()->achievements,
            'leaderboard' => Leaderboard::generate()], 'Successfully.');
    }
}
