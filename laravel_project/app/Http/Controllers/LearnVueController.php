<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnVueController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($route = null)
    {
        if ($route) {
            //return routed content
            //dd(request());
            //dd($route);
            
        }
        return view('learnvue');
    }

    /**
     * api is called by asynchronously by the Client Application to dynamicall load the content
     *
     * @param String $route the route being requested, null default which returns the home/intro
     * @return void
     */
    public function api($route = null) {

        switch ($route) {
            case 'what-is-it': 
                return view('learnvue-sections.essentials.what-is-it');
            case 'vue-instance':
                return view('learnvue-sections.essentials.vue-instance');
            case 'template-syntax':
                return view('learnvue-sections.essentials.template-syntax');
            case 'computed-properties-and-watchers';
                return view('learnvue-sections.essentials.computed-properties-and-watchers');
            default:
                return view('learnvue-sections.essentials.vue-instance');
        }
    }



}
