<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth; // Tambahkan Auth
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function IndexPages(Request $request)
    {
        $minat = Auth::user()->jenis_event;
    
        // Default: Urutkan berdasarkan minat user
        $query = Event::orderByRaw("CASE WHEN jenis_event = ? THEN 0 ELSE 1 END, rating DESC", [$minat]);
    
        // Filter berdasarkan dropdown (jenis event)
        if ($request->filled('filter_jenis')) {
            $query->where('jenis_event', $request->filter_jenis);
        }
    
        // Filter rating di atas 7
        if ($request->has('rating_7_up') && $request->rating_7_up == 1) {
            $query->where('rating', '>', 7);
        }
    
        $events = $query->get();
        $username = Auth::user()->username;
    
        return view('user.pages.home.index', compact('events', 'username', 'minat'));
    }
}




