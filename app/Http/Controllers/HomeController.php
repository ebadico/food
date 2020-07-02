<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        if ($request->has('search')) {
            $recipes = Recipe::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(9);
            return view('main',compact('recipes'));
        }
        $recipes = Recipe::latest()->paginate(9);
        return view('main',compact('recipes'));
    }


    public function single($id)
    {
        $recipe = Recipe::findorfail($id);
        return view('single',compact('recipe'));
    }
}
