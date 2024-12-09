<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {


        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $users = \App\Models\User::role(['manager', 'user'])->get();

            return view('admin.manager', compact('users'));

        } elseif($user->hasRole('manager')) {
            return redirect()->route('admin.recipes');
        }else{
            return redirect()->route('index');
        }
    }

    public function recipe()
    {
        $recipes = Recipe::all();
        return view('admin.recipe', ['recipes' => $recipes]);
    }

    public function create()
    {

        return view('admin.createRecipe');

    }

    public function createManager()
    {

        return view('admin.managerCreate');

    }

    public function storeManager(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
            ]
        );

        User::create($request->all())->assignRole('manager');

        return redirect()->route('dashboard');

    }

    public function deleteManager($id)
    {

        User::destroy($id);
        return redirect()->back();

    }

    public function editManager($id)
    {

        return view('admin.managerEdit',
        [
            'user'=>User::find($id)
        ]);

    }
    public function updateManager(Request $request,$id)
    {
        User::find($id)->update($request->all());
        return redirect()->route('dashboard')->with('successful','updated successfully');
    }

}
