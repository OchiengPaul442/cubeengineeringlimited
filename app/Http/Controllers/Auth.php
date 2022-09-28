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
                if (session()->has('userID')) {
                    return redirect()->route('Admin.dashboard');
                } else {
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
        // display number of completed projects from database
        if (session()->has('userID')) {
            $title = 'Dashboard';
            $service = service::all();
            $FAQs = FAQs::all();
            $portfolio = portfolio::all();
            $testimonial = testimonial::all();
            $messages = messages::all();

            // porfolio status
            $completed = $portfolio->where('status', 'Complete')->count();
            $running = $portfolio->where('status', 'Running')->count();
            $upcoming = $portfolio->where('status', 'Upcoming')->count();

            // messages per month
            $jan = $messages->where('created_at', '>=', '2021-01-01')->count();
            $feb = $messages->where('created_at', '>=', '2021-02-01')->count();
            $mar = $messages->where('created_at', '>=', '2021-03-01')->count();
            $apr = $messages->where('created_at', '>=', '2021-04-01')->count();
            $may = $messages->where('created_at', '>=', '2021-05-01')->count();
            $jun = $messages->where('created_at', '>=', '2021-06-01')->count();
            $jul = $messages->where('created_at', '>=', '2021-07-01')->count();
            $aug = $messages->where('created_at', '>=', '2021-08-01')->count();
            $sep = $messages->where('created_at', '>=', '2021-09-01')->count();
            $oct = $messages->where('created_at', '>=', '2021-10-01')->count();
            $nov = $messages->where('created_at', '>=', '2021-11-01')->count();
            $dec = $messages->where('created_at', '>=', '2021-12-01')->count();

            return view('Admin.pages.Dashboard', compact('title', 'service', 'FAQs', 'portfolio', 'testimonial', 'messages', 'completed', 'running', 'upcoming', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'));
        } else {
            return redirect()->route('Admin.login');
        }
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
    }

    // change password
    public function changePassword(Request $request)
    {
        $id = session('userID');
        // change password
        $request->validate([
            'oldpassword' => 'required|min:5|max:12',
            'password' => 'required|min:5|max:12',
            'cpassword' => 'required|min:5|max:12|same:password',
        ]);

        $user = User::find($id);

        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $result = $user->save();
            if ($result) {
                return back()->with('success', 'Password Changed Successfully');
            } else {
                return back()->with('fail', 'Something went wrong try again later.');
            }
        } else {
            return back()->with('fail', 'Old passwors is Incorrect!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'User Profile';
        $user = User::where('id', $id)->first();
        $service = service::all();
        $FAQs = FAQs::all();
        $portfolio = portfolio::all();
        $testimonial = testimonial::all();
        $messages = messages::all();
        return view('Admin.pages.profile', compact('title', 'user', 'service', 'FAQs', 'portfolio', 'testimonial', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Profile';
        $user = User::where('id', $id)->first();
        return view('Admin.pages.profile', compact('title', 'user'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $result = $user->save();

        if ($result) {
            // return back()->with('success', 'Profile Updated Successfully');
            return redirect()->route('Auth.show', $id)->with('success', 'Profile Updated Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home');
    }
}
