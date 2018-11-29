<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Chef;
use App\Vendor;
use App\EventCaterer;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CatererController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if(!$user->isChef() && !$user->isEventCaterer() && !$user->isVendor())
            return view('caterer.register');

        return view('caterer.home');
    }

    /**
     * Add a caterer type to caterer.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        

        $user = Auth::user();
        $type = $request->input('selected_category');


        if($type === Chef::CATERER_TYPE){
            $model = Chef::updateOrCreate(['user_id' => $user->id]);
        }else{
            throw new NotFoundHttpException('calm down...still in progress');
        }

        if(!$model->save()){
            return redirect(url('caterer/home'))->with("error", "Unable to make selection");
        }

        return redirect(url('caterer/home'))->with("success", "congratulations, you are now a ". ucfirst($type));
    }
}
