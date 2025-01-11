<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentGameController extends Controller
{
    public function index()
    {
        // show view file
        return view('tournament.index');
    }

    public function startTournament(Request $request)
    {
        // Get the users from the request
        $users = $request->input('users');

        // Remove null user
        $filterUsers = array_filter($users);

        // At least 2 Users required
        if (count($filterUsers) < 2) {
            return back()->with('error', 'At least 2 users are required to start the tournament.');
        }

        $rounds = $this->generateTournamentRounds($users); // call the function

        $finalWinner = $users[0];
        return view('tournament.show',compact('rounds','finalWinner'));
    }

    public function generateTournamentRounds(array $users)
    {
        $rounds = [];
        while (count($users) > 1) {
            $groups = [];
            $winners = [];

            // Create groups of 2
            while (count($users) > 1) {
                $group = [array_shift($users), array_shift($users)]; // Remove the first element from an array
                $groups[] = $group;
                $winners[] = $group[array_rand($group)]; // Random winner in group
            }

            // Single User - directly to the winners
            if (count($users) === 1) {
                $winners[] = array_shift($users);
            }

            $rounds[] = [
                'groups' => $groups,
                'winners' => $winners,
            ];

            $users = $winners; // Winners proceed to the next round
        }
        return $rounds;
    }
}
