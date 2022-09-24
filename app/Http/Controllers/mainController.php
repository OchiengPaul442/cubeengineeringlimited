<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\testimonial;
use App\Models\service;
use App\Models\portfolio;
use App\Models\FAQs;
use App\Models\messages;
use App\Models\timeline;
use Illuminate\Http\Request;

class mainController extends Controller
{    
    // index page
    public function welcome()
    {
        $title = 'Cube Engineering and supplies ltd';
        return view('index', compact('title'));
    }
    // home page
    public function index()
    {
        $title = 'Cube Engineering and supplies ltd';
        // get all data
        $services = service::all();
        $portfolio = Portfolio::all();
        $FAQs = FAQs::all();
        $testimonials = Testimonial::all();
        $timeline = timeline::all();
        return view('pages.Home', compact('title', 'services', 'portfolio', 'FAQs', 'testimonials', 'timeline'));
    }
    // terms page
    public function terms()
    {
        $title = 'Terms-Cube Engineering and supplies ltd';
        $heading = 'Terms';
        return view('pages.term',compact('heading','title'));
    }
    // privacy page
    public function privacy()
    {
        $title = 'Privacy-Cube Engineering and supplies ltd';
        $heading = 'Privacy';
        return view('pages.policy',compact('heading','title'));
    }

}
