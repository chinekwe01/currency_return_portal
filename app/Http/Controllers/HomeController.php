<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function superAdminHome()
    {
        $staffs = Staff::latest()->paginate(3);
        return view('superAdminHome', compact('staffs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function managerHome()
    {
        return view('managerHome');
    }
}
