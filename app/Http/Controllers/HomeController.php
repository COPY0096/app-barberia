<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::id()){


            $usertype=Auth()->user()->usertype;

            if($usertype=='user'){
                return view('home');
            }

            elseif($usertype=='admin'){
                return view('admin.dashboard');
            }

            else{
                return redirect()->back();
            }


        }



        return view('home');
    }
}
