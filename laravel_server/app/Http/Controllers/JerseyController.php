<?php

namespace App\Http\Controllers;

use App\Models\Jersey;
use App\Models\Category;
use Illuminate\Http\Request;

class JerseyController extends Controller
{
    /**
     * Display listing of jerseys with filters
     */
    public function index(Request $request)
    {
        // Get all categories for filter
        $categories = Category::where('is_active', true)->get();
        
        // Get distinct leagues from jerseys table
        $leagues = Jersey::where('is_active', true)
            ->select('league')
            ->distinct()
            ->whereNotNull('league')
            ->orderBy('league')
            ->pluck('league');
        
        // Get distinct teams from jerseys table
        $teams = Jersey::where('is_active', true)
            ->select('team')
            ->distinct()
            ->whereNotNull('team')
            ->orderBy('team')
            ->pluck('team');

        // Build query for jerseys
        $query = Jersey::where('is_active', true)->with('category');

        // Apply filters
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('league')) {
            $query->where('league', $request->league);
        }

        if ($request->filled('team')) {
            $query->where('team', $request->team);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Apply search if provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('team', 'LIKE', "%{$search}%")
                  ->orWhere('league', 'LIKE', "%{$search}%")
                  ->orWhere('player_name', 'LIKE', "%{$search}%");
            });
        }

        // Apply sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Paginate results
        $jerseys = $query->paginate(12);

        return view('Jersey.index', compact('jerseys', 'categories', 'leagues', 'teams'));
    }

    /**
     * Show single jersey details
     */
    public function show($id)
    {
        $jersey = Jersey::where('is_active', true)
            ->with('category')
            ->findOrFail($id);
        
        // Get related jerseys (same team or league)
        $relatedJerseys = Jersey::where('is_active', true)
            ->where('id', '!=', $jersey->id)
            ->where(function ($query) use ($jersey) {
                $query->where('team', $jersey->team)
                      ->orWhere('league', $jersey->league);
            })
            ->limit(4)
            ->get();

        return view('Jersey.show', compact('jersey', 'relatedJerseys'));
    }

    /**
     * Show featured jerseys
     */
    public function featured()
    {
        return view('Jersey.featured');
    }

    /**
     * Quick view for AJAX requests
     */
    public function quickView($id)
    {
        $jersey = Jersey::where('is_active', true)->findOrFail($id);
        $html = view('Jersey.partials.quick-view', compact('jersey'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Search jerseys
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('jerseys.index');
        }

        $jerseys = Jersey::where('is_active', true)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('team', 'LIKE', "%{$query}%")
                  ->orWhere('league', 'LIKE', "%{$query}%")
                  ->orWhere('player_name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->paginate(12);

        $categories = Category::where('is_active', true)->get();
        $leagues = Jersey::where('is_active', true)->select('league')->distinct()->orderBy('league')->pluck('league');
        $teams = Jersey::where('is_active', true)->select('team')->distinct()->orderBy('team')->pluck('team');

        return view('Jersey.index', compact('jerseys', 'categories', 'leagues', 'teams'));
    }
}