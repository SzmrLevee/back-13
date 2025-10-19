<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BatmanController extends Controller
{
    /**
     * Get the fights collection from batman.txt file
     *
     * @return \Illuminate\Support\Collection
     */
    private function fightCollection()
    {
        $filePath = storage_path('app/batman.txt');
        $content = file_get_contents($filePath);
        
        // Evaluate the PHP array from the file
        $fights = eval('return ' . $content . ';');
        
        return collect($fights);
    }

    /**
     * Display a listing of all Batman fights.
     * Can filter by duration (min/max) and year (min/max)
     * Can sort by year, difficulty, or duration (asc/desc)
     */
    public function index(Request $request)
    {
        $fights = $this->fightCollection();

        // Filter by duration_min
        if ($request->has('duration_min')) {
            $fights = $fights->filter(function ($fight) use ($request) {
                return $fight['duration_min'] >= $request->duration_min;
            });
        }

        // Filter by duration_max
        if ($request->has('duration_max')) {
            $fights = $fights->filter(function ($fight) use ($request) {
                return $fight['duration_min'] <= $request->duration_max;
            });
        }

        // Filter by year_min
        if ($request->has('year_min')) {
            $fights = $fights->filter(function ($fight) use ($request) {
                return $fight['year'] >= $request->year_min;
            });
        }

        // Filter by year_max
        if ($request->has('year_max')) {
            $fights = $fights->filter(function ($fight) use ($request) {
                return $fight['year'] <= $request->year_max;
            });
        }

        // Sorting
        $sortBy = $request->input('sort_by', 'year');
        $order = $request->input('order', 'asc');

        if (in_array($sortBy, ['year', 'difficulty', 'duration'])) {
            // Map 'duration' to 'duration_min' for sorting
            $sortField = $sortBy === 'duration' ? 'duration_min' : $sortBy;
            
            if ($order === 'desc') {
                $fights = $fights->sortByDesc($sortField);
            } else {
                $fights = $fights->sortBy($sortField);
            }
        }

        return response()->json([
            'data' => $fights->values()->all()
        ]);
    }

    /**
     * Display the specified fight by ID.
     */
    public function show($id)
    {
        $fights = $this->fightCollection();
        
        $fight = $fights->firstWhere('id', (int)$id);

        if (!$fight) {
            return response()->json([
                'error' => 'Fight not found'
            ], 404);
        }

        return response()->json([
            'data' => $fight
        ]);
    }

    /**
     * Get list of all unique opponents.
     */
    public function opponents()
    {
        $fights = $this->fightCollection();
        
        $opponents = $fights->pluck('opponent')->unique()->values();

        return response()->json([
            'data' => $opponents->all()
        ]);
    }

    /**
     * Get fights by location, sorted by year descending.
     */
    public function location($location)
    {
        $fights = $this->fightCollection();
        
        $locationFights = $fights->filter(function ($fight) use ($location) {
            return strcasecmp($fight['location'], $location) === 0;
        })->sortByDesc('year')->values();

        if ($locationFights->isEmpty()) {
            return response()->json([
                'error' => 'Location not found'
            ], 404);
        }

        return response()->json([
            'data' => $locationFights->all()
        ]);
    }

    /**
     * Get the shortest fight by duration.
     */
    public function shortest()
    {
        $fights = $this->fightCollection();
        
        $shortestFight = $fights->sortBy('duration_min')->first();

        return response()->json([
            'data' => $shortestFight
        ]);
    }

    /**
     * Get the hardest fight by difficulty.
     */
    public function hardest()
    {
        $fights = $this->fightCollection();
        
        $hardestFight = $fights->sortByDesc('difficulty')->first();

        return response()->json([
            'data' => $hardestFight
        ]);
    }

    /**
     * Get Batman's win rate statistics.
     */
    public function winrate()
    {
        $fights = $this->fightCollection();
        
        $wins = $fights->where('batman_won', true)->count();
        $losses = $fights->where('batman_won', false)->count();
        $total = $fights->count();
        
        $winratePercent = $total > 0 ? round(($wins / $total) * 100, 1) : 0;

        return response()->json([
            'data' => [
                'wins' => $wins,
                'losses' => $losses,
                'winrate_percent' => $winratePercent
            ]
        ]);
    }

    /**
     * Get the average difficulty of all fights.
     */
    public function avg_diff()
    {
        $fights = $this->fightCollection();
        
        $averageDifficulty = round($fights->avg('difficulty'), 2);

        return response()->json([
            'data' => [
                'average_difficulty' => $averageDifficulty
            ]
        ]);
    }
}
