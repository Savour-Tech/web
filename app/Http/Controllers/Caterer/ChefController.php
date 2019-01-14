<?php

namespace App\Http\Controllers\Caterer;

use Auth;
use Exception;
use Validator;
use App\User;
use App\Chef;
use App\ChefMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefController extends Controller
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
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        return view('caterer.profile', [
            'tab' => $request->input('tab'),
            'rating' => Rating::get_caterer_rating($user->id),
            'reviews' => Rating::where('caterer_id', $user->id)->get(),
        ]);
    }

    public function menu()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isChef())
            return redirect(url('caterer/category'))->with('status', 'you are not a chef');

        $chef = Chef::where('user_id', $user->id)->first();

        return view('caterer.chef.menu', [
            'chef' => $chef,
        ]);

    }

    public function menuCreate()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isChef())
            return redirect(url('caterer/category'))->with('status', 'you are not a chef');

        $chef = Chef::where('user_id', $user->id)->first();
        $model = new ChefMenu();

        return view('caterer.chef.menu_create', [
            'chef' => $chef,
            'model' => $model
        ]);

    }

    public function menuStore(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|string',
                'description' => 'required|string',
                'ingredients' => 'required|string',
                'cook_time' => 'required|string',
                'servings' => 'required|string'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors(), 1);
            }

            $user = Auth::user();

            if(caterer_has_type($user))
                return redirect(url('caterer/category'));

            if(!$user->isChef())
                return redirect(url('caterer/category'))->with('status', 'you are not a chef');

            $id = $request->input('id');

            $chef = Chef::find($id);
            $chef->cover = $request->input('cover');

            $chef->save();

            return redirect(url('caterer/chef/cover'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/chef/cover'))->with("error", $e->getMessage());
        }

    }

    public function cover()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isChef())
            return redirect(url('caterer/category'))->with('status', 'you are not a chef');

        $chef = Chef::where('user_id', $user->id)->first();

        return view('caterer.chef.cover', [
            'chef' => $chef,
        ]);
    }

    public function coverStore(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'cover' => 'required|string'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors(), 1);
            }

            $user = Auth::user();

            if(caterer_has_type($user))
                return redirect(url('caterer/category'));

            if(!$user->isChef())
                return redirect(url('caterer/category'))->with('status', 'you are not a chef');

            $id = $request->input('id');

            $chef = Chef::find($id);
            $chef->cover = $request->input('cover');

            $chef->save();

            return redirect(url('caterer/chef/cover'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/chef/cover'))->with("error", $e->getMessage());
        }

    }
}
