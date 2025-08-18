<?php

namespace App\Http\Controllers;

use App\Models\Jersey;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    /**
     * Display the home page
     *
     * @return View
     */
    public function index(): View
    {
        try {
            // Get featured jerseys (limit to 4 for home page display)
            $featuredJerseys = Jersey::active()
                ->featured()
                ->with('category')
                ->limit(4)
                ->get();
            
            // Fallback: Get latest jerseys if no featured jerseys exist
            if ($featuredJerseys->isEmpty()) {
                $featuredJerseys = Jersey::active()
                    ->with('category')
                    ->orderBy('created_at', 'desc')
                    ->limit(4)
                    ->get();
            }
            
            // Get latest jerseys for additional sections
            $latestJerseys = Jersey::active()
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->limit(8)
                ->get();
            
            // Get popular teams for the popular teams section
            $popularTeams = $this->getPopularTeams();
            
            // Get leagues for the league filter section
            $leagues = $this->getAvailableLeagues();
            
            // Get active categories
            $categories = Category::active()->get();
            
            // Get statistics for display
            $stats = $this->getHomePageStats();
            
            return view('home', compact(
                'featuredJerseys',
                'latestJerseys',
                'popularTeams',
                'leagues',
                'categories',
                'stats'
            ));
            
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Home page error: ' . $e->getMessage());
            
            // Return a view with error message or redirect
            return view('home')->with('error', 'Unable to load home page content.');
        }
    }

    /**
     * Get home page data as JSON (for API endpoints)
     *
     * @return JsonResponse
     */
    public function getHomeData(): JsonResponse
    {
        try {
            $data = [
                'featured_jerseys' => Jersey::active()
                    ->featured()
                    ->with('category')
                    ->limit(4)
                    ->get(),
                'latest_jerseys' => Jersey::active()
                    ->with('category')
                    ->orderBy('created_at', 'desc')
                    ->limit(8)
                    ->get(),
                'popular_teams' => $this->getPopularTeams(),
                'leagues' => $this->getAvailableLeagues(),
                'categories' => Category::active()->get(),
                'stats' => $this->getHomePageStats()
            ];

            return $this->successResponse($data, 'Home page data retrieved successfully');

        } catch (\Exception $e) {
            \Log::error('Home page API error: ' . $e->getMessage());
            return $this->errorResponse('Unable to retrieve home page data', 500);
        }
    }

    /**
     * Get popular teams list
     *
     * @return array
     */
    private function getPopularTeams(): array
    {
        // This could be dynamically generated based on jersey sales/views
        return [
            'Real Madrid', 'Barcelona', 'Manchester United', 'Liverpool', 
            'Bayern Munich', 'PSG', 'Juventus', 'Chelsea', 
            'Manchester City', 'Arsenal', 'AC Milan', 'Inter Milan'
        ];
    }

    /**
     * Get available leagues
     *
     * @return array
     */
    private function getAvailableLeagues(): array
    {
        // This could be dynamically generated from the database
        return [
            'Premier League',
            'La Liga',
            'Serie A',
            'Bundesliga',
            'Ligue 1',
            'Champions League'
        ];
    }

    /**
     * Get home page statistics
     *
     * @return array
     */
    private function getHomePageStats(): array
    {
        return [
            'total_jerseys' => Jersey::active()->count(),
            'total_teams' => Jersey::active()->distinct('team')->count('team'),
            'total_leagues' => Jersey::active()->distinct('league')->count('league'),
            'happy_customers' => 15000, // This would come from orders/reviews in real app
        ];
    }

    /**
     * Search jerseys (for homepage search functionality)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $query = $request->get('q', '');
            
            if (empty($query)) {
                return $this->errorResponse('Search query is required', 400);
            }

            $jerseys = Jersey::active()
                ->with('category')
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('team', 'LIKE', "%{$query}%")
                      ->orWhere('league', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%");
                })
                ->limit(10)
                ->get();

            return $this->successResponse($jerseys, 'Search results retrieved successfully');

        } catch (\Exception $e) {
            \Log::error('Search error: ' . $e->getMessage());
            return $this->errorResponse('Search failed', 500);
        }
    }
}