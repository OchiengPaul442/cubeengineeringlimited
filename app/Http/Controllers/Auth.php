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
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Auth extends Controller
{
    // login page
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('userID', $user->id);
                $request->session()->put('userEmail', $user->email);
                if(session()->has('userID')){
                    return redirect()->route('Admin.dashboard');
                }else{
                    return redirect()->route('Admin');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // dashboard page
    public function dashboard()
    {
        if (session()->has('userID')) {
            $title = 'Dashboard';
            // get all data
            $services = Service::all();
            $portfolio = Portfolio::all();
            $FAQs = FAQs::all();
            $messages = Messages::all();
            $testimonials = Testimonial::all();
            $timeline = timeline::all();
            // count items
            $portfolioCount = $portfolio->count();
            $testimonialsCount = $testimonials->count();
            $messagesCount = $messages->count();
            $servicesCount = $services->count();
            return view('Admin.pages.Dashboard', compact('title', 'services', 'portfolio', 'FAQs', 'testimonials', 'timeline', 'portfolioCount', 'testimonialsCount', 'messagesCount', 'servicesCount'));
        } else {
            return redirect()->route('Admin');
        }
    }

    // profile form page
    public function profile()
    {
        $title = 'User Profile';
        return view('Admin.pages.profile', compact('title'));
    }

    // logout admin
    public function logout()
    {
        Session::flush();
        
        FacadesAuth::logout();

        return redirect()->route('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'CubeEngineers';
        return view('Admin.pages.login', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
