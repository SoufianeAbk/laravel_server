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
        $query = Jersey::active()->with('category');

        // Apply filters
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('team')) {
            $query->where('team', $request->team);
        }

        if ($request->filled('league')) {
            $query->where('league', $request->league);
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

        // Sorting
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
            default:
                $query->orderBy('created_at', 'desc');
        }

        $jerseys = $query->paginate(12);
        $categories = Category::active()->get();
        
        // Get unique values for filters
        $teams = Jersey::active()->distinct('team')->pluck('team');
        $leagues = Jersey::active()->distinct('league')->pluck('league');

        return view('jerseys.index', compact('jerseys', 'categories', 'teams', 'leagues'));
    }

    /**
     * Show single jersey details
     */
    public function show($id)
    {
        $jersey = Jersey::active()->with('category')->findOrFail($id);
        
        // Get related jerseys
        $relatedJerseys = Jersey::active()
            ->where('id', '!=', $jersey->id)
            ->where(function($query) use ($jersey) {
                $query->where('team', $jersey->team)
                      ->orWhere('category_id', $jersey->category_id);
            })
            ->limit(4)
            ->get();

        return view('jerseys.show', compact('jersey', 'relatedJerseys'));
    }

    /**
     * Show featured jerseys
     */
    public function featured()
    {
        $jerseys = Jersey::active()->featured()->paginate(12);
        return view('jerseys.featured', compact('jerseys'));
    }

    /**
     * Search jerseys
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $jerseys = Jersey::active()
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('team', 'like', "%{$query}%")
                  ->orWhere('player_name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->paginate(12);

        return view('jerseys.search', compact('jerseys', 'query'));
    }

    /**
     * Quick view for AJAX requests
     */
    public function quickView($id)
    {
        $jersey = Jersey::active()->findOrFail($id);
        return response()->json([
            'html' => view('jerseys.partials.quick-view', compact('jersey'))->render()
        ]);
    }
}