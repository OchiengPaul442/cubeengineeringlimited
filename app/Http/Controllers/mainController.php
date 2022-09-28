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
    public $page_number = 6;
    // index page
    public function welcome()
    {
        $title = 'Cube Engineering and General supplies Limited';
        return view('index', compact('title'));
    }
    // home page
    public function index()
    {
        $title = 'Cube Engineering and General supplies Limited';
        // get all data
        $portfolio = portfolio::orderBy('id', 'ASC')->paginate($this->page_number);
        $FAQs = FAQs::all();
        $testimonials = Testimonial::all();
        $timeline = timeline::all();
        return view('layout.site.app', compact('title', 'portfolio', 'FAQs', 'testimonials', 'timeline'));
    }
    // terms page
    public function terms()
    {
        $title = 'Terms-Cube Engineering and General supplies Limited';
        $heading = 'Terms';
        return view('pages.term',compact('heading','title'));
    }
    // privacy page
    public function privacy()
    {
        $title = 'Privacy-Cube Engineering and General supplies Limited';
        $heading = 'Privacy';
        return view('pages.policy',compact('heading','title'));
    }

}
