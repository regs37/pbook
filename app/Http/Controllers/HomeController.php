<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phonebook;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            $countries = Country::orderBy('name','ASC')->get();
            return view('home')
            ->with('phonebooks',User::find(Auth::id())->phonebook)
            ->with('countries',$countries);
        }
    }
}
