<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return view('content.cards.cards',[
            'plans' => $plans
        ]);
    }

    public function show(Plan $plan, Request $request)
    {
        $user = User::find(auth()->user()->id);

        return view('content.cards.subscription',
        [
            'plan' => $plan,
            'intent' => $user->createSetupIntent(),
            'user' => $user
        ]);
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);
        return redirect()->route('dashboard');
    }
}
