<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //AUTH::user è necessario per ottenere le info legate al singolo user e indirizzarle alla Home
        $user = Auth::user();
        return view('admin.home',compact('user'));
    }
}
