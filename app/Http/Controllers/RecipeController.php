<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index()
    {
       
        $recipes = Recipe::where('status', '1')->get();

        return view('recipe', compact('recipes'));
    }

   
    public function create()
{


    return view('createRecipe');

}





   public function store(Request $request)
{

//    dd('ter');


    // Validatsiya
    $request->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'instructions' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

  

    // Rasmlarni yuklash
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('recipe_images', 'public');
    } else {
        $imagePath = null;
    }

    // Yangi retseptni yaratish
    $recipe = Recipe::create([
        'user' => $request->user ?? null,  // Bu maydonni bo'sh qoldirishingiz mumkin, agar foydalanuvchi tizimga kirgan bo'lmasa
        'name' => $request['name'],
        'ingredients' => $request['ingredients'],
        'instructions' => $request['instructions'],
        'image' => $imagePath,
        'status' => (\auth()->check() && \auth()->user()->hasRole('admin|manager')) ? 1 : 0,
    ]);

    // Retsept muvaffaqiyatli yaratildi
    return redirect()->back()->with('success', 'Retsept muvaffaqiyatli yaratildi!');
}

    public function show(string $id)
    {
        Recipe::find($id)->update(['status' =>  '1']);

        return redirect()->back();
    }

    
    public function edit(Recipe $recipe)
    {

        return view('admin.editRecipe', compact('recipe'));

    }

   
    public function update(Request $request, Recipe $recipe)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

//        dd($request);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
        } else {
            $imagePath = null;
        }


        $recipe->update([
            'user' => $request->user ?? null,  // Bu maydonni bo'sh qoldirishingiz mumkin, agar foydalanuvchi tizimga kirgan bo'lmasa
            'name' => $request['name'],
            'ingredients' => $request['ingredients'],
            'instructions' => $request['instructions'],
            'image' => $imagePath ?? $recipe->image,
        ]);

        return redirect()->back()->with('success', 'Retsept muvaffaqiyatli ozgartirildi!');
    }

  
    public function destroy(string $id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $recipe->delete();
        return redirect()->back()->with('success', 'Retsept muvaffaqiyatli o`chirildi');

    }
}