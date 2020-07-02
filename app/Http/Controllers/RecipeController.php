<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Step;
class RecipeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::paginate(5);
        return view('recipes.index', compact('recipes'));
        // return view('recipes.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
       
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        
        if ($request->hasFile('photo')) {
             $recipe->photo = $request->photo->store('images');
        }
        $recipe->save();
        
        for ($i = 0; $i < count($request->item); $i++) {
            if (!empty($request->item[$i])) {
                $ingredients[] = ['item' => $request->item[$i]];
            }
            
        };

        for ($i = 0; $i < count($request->step); $i++) {
             if (!empty($request->step[$i])) {
                $steps[] = ['description' => $request->step[$i]];
        }
        };


        if (isset($ingredients)) {
            $recipe->ingredients()->createMany($ingredients);
        }
        if (isset($steps)) {
            $recipe->steps()->createMany($steps);
        }

        return redirect()->route('recipes.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::with('ingredients','steps')->findorfail($id);
        return view('recipes.edit', compact('recipe'));
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
        $recipe = Recipe::findorfail($id);
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        
        if ($request->hasFile('photo')) {
            $recipe->photo = $request->photo->store('images');
        }
        
        $recipe->save();

        Ingredient::destroy($recipe->ingredients()->get()->pluck('id'));
        Step::destroy($recipe->steps()->get()->pluck('id'));



      for ($i = 0; $i < count($request->item); $i++) {
            if (!empty($request->item[$i])) {
                $ingredients[] = ['item' => $request->item[$i]];
            }
            
        };

        for ($i = 0; $i < count($request->step); $i++) {
             if (!empty($request->step[$i])) {
                $steps[] = ['description' => $request->step[$i]];
        }
        };



        
        if (isset($ingredients)) {
            $recipe->ingredients()->createMany($ingredients);
        }
        if (isset($steps)) {
            $recipe->steps()->createMany($steps);
        }

        
        return redirect()->route('recipes.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::findorfail($id)->delete();
        return redirect()->route('recipes.index');

    }
}
