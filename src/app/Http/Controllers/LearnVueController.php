<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiteCategories;

class LearnVueController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('index!');
        $categories = SiteCategories::all();
        dd($categories);
        return view('home');
    }

}
