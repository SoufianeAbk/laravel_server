<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jersey; // Assuming you have a Jersey model

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get featured jerseys from database
        $featuredJerseys = Jersey::where('is_featured', true)
                                ->orderBy('created_at', 'desc')
                                ->limit(4)
                                ->get();
        
        // Alternative: Get latest jerseys if no featured jerseys exist
        if ($featuredJerseys->isEmpty()) {
            $featuredJerseys = Jersey::orderBy('created_at', 'desc')
                                   ->limit(4)
                                   ->get();
        }

        return view('home', compact('featuredJerseys'));
    }
}

// Alternative approach if you want to pass additional data:
class AlternativeHomeController extends Controller
{
    public function index()
    {
        $data = [
            'featuredJerseys' => Jersey::featured()->limit(4)->get(),
            'popularTeams' => $this->getPopularTeams(),
            'totalJerseys' => Jersey::count(),
        ];

        return view('home', $data);
    }

    private function getPopularTeams()
    {
        return [
            'Real Madrid', 'Barcelona', 'Manchester United', 'Liverpool', 
            'Bayern Munich', 'PSG', 'Juventus', 'Chelsea', 
            'Manchester City', 'Arsenal', 'AC Milan', 'Inter Milan'
        ];
    }
}

// Example Jersey Model scope for featured jerseys
/*
// In your App\Models\Jersey model:

public function scopeFeatured($query)
{
    return $query->where('is_featured', true);
}

public function scopeLatest($query)
{
    return $query->orderBy('created_at', 'desc');
}
*/