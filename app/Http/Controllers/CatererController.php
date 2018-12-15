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

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        return view('caterer.home');
    }


    public function showRegistrationForm(Request $request)
    {
        return view('caterer.register');   
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
        }else if($type === Vendor::CATERER_TYPE){
            $model = Vendor::updateOrCreate(['user_id' => $user->id]);
        }else if($type === EventCaterer::CATERER_TYPE){
            $model = EventCaterer::updateOrCreate(['user_id' => $user->id]);
        }else {
            throw new NotFoundHttpException('calm down...still in progress');
        }
        

        if(!$model->save()){
            return redirect(url('caterer/home'))->with("error", "Unable to make selection");
        }

        return redirect(url('caterer/home'))->with("success", "congratulations, you are now a(n) ". ucfirst($type));
    }
}
