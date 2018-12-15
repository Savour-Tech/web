<?php

namespace App\Http\Controllers;

use App\Chef;
use Illuminate\Http\Request;

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

        //header("Location: http://google.com");

        return view('caterer.profile', [
            'tab' => $request->input('tab'),
            'rating' => Rating::get_caterer_rating($user->id),
            'reviews' => Rating::where('caterer_id', $user->id)->get(),
        ]);
    }

    public function cover()
    {
        //
    }
}
