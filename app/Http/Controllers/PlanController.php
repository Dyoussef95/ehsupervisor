<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $url = 'plans';
        $plans = Plan::all();
        return view('plans.index')
                ->with('plans',$plans)
                ->with('url',$url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $url = 'plans';
        return view('plans.create')->with('url',$url);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $plan = new Plan;
        $plan->name = $request->name;
        $plan->save();
        return redirect(route('plans.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan): View
    {
        $url = 'plans';
        return view('plans.show')
                ->with('plan',$plan)
                ->with('url',$url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan): View
    {
        $url = 'plans';
        return view('plans.edit')
                ->with('plan',$plan)
                ->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan): RedirectResponse
    {
        $plan->name = $request->name;
        $plan->save();
        return redirect(route('plans.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan): RedirectResponse
    {
        $plan->delete();
        return redirect(route('plans.index'));
    }
}
