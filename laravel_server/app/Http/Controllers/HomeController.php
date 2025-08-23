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
        // Get featured jerseys (limit to 4 for home page display)
        $featuredJerseys = Jersey::where('is_active', true)
            ->where('is_featured', true)
            ->with('category')
            ->limit(4)
            ->get();
        
        // Fallback: Get latest jerseys if no featured jerseys exist
        if ($featuredJerseys->isEmpty()) {
            $featuredJerseys = Jersey::where('is_active', true)
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->limit(4)
                ->get();
        }
        
        // Get latest jerseys for additional sections
        $latestJerseys = Jersey::where('is_active', true)
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        
        // Get popular teams for the popular teams section
        $popularTeams = [
            'Real Madrid', 'Barcelona', 'Manchester United', 'Liverpool', 
            'Bayern Munich', 'PSG', 'Juventus', 'Chelsea', 
            'Manchester City', 'Arsenal', 'AC Milan', 'Inter Milan'
        ];
        
        // Get leagues for the league filter section
        $leagues = [
            'Premier League',
            'La Liga',
            'Serie A',
            'Bundesliga',
            'Ligue 1',
            'Champions League'
        ];
        
        // Get categories
        $categories = Category::where('is_active', true)->get();
        
        // Get statistics for display
        $stats = [
            'total_jerseys' => Jersey::where('is_active', true)->count(),
            'total_teams' => Jersey::where('is_active', true)->distinct('team')->count('team'),
            'total_leagues' => Jersey::where('is_active', true)->distinct('league')->count('league'),
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