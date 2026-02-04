<?php

namespace App\Http\Controllers;

use App\Models\CMSPage;
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the homepage.
     */
    public function home()
    {
        $page = CMSPage::where('key', 'homepage')->where('is_active', true)->first();
        return view('frontend.home', compact('page'));
    }

    /**
     * Display the management team page.
     */
    public function team()
    {
        $teams = Team::where('is_active', true)->orderBy('sort_order')->get();
        return view('frontend.team', compact('teams'));
    }
}
