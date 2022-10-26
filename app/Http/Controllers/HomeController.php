<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\Role;
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
        $level=Auth::user()->level;
        if($level=='superadmin'){
            return view('admin.index');
        
        }elseif($level=='admin'){
            return view('admin.index');
        }
        else{
            return view('user.index');
        }

    }
    
}
