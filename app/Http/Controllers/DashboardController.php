<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view('content.dashboard.dashboard');


    }
}
