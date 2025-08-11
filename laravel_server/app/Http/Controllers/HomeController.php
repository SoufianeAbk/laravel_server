<?php

namespace App\Http\Controllers;

use App\Models\Jersey;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        // Get featured jerseys
        $featuredJerseys = Jersey::active()
            ->featured()
            ->with('category')
            ->limit(8)
            ->get();
        
        // Get latest jerseys
        $latestJerseys = Jersey::active()
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        
        // Get popular teams
        $popularTeams = Jersey::active()
            ->select('team')
            ->distinct()
            ->limit(12)
            ->pluck('team');
        
        // Get leagues
        $leagues = [
            'Premier League',
            'La Liga',
            'Serie A',
            'Bundesliga',
            'Ligue 1',
            'Champions League'
        ];
        
        // Get categories
        $categories = Category::active()->get();
        
        // Get some statistics for display
        $stats = [
            'total_jerseys' => Jersey::active()->count(),
            'total_teams' => Jersey::active()->distinct('team')->count('team'),
            'total_leagues' => Jersey::active()->distinct('league')->count('league'),
            'happy_customers' => 15000, // This would come from orders/reviews in real app
        ];
        
        return view('home', compact(
            'featuredJerseys',
            'latestJerseys',
            'popularTeams',
            'leagues',
            'categories',
            'stats'
        ));
    }
}