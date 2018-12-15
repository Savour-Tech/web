<?php

namespace App\Http\Controllers\Caterer;

use Auth;
use Exception;
use Validator;
use App\User;
use App\Chef;
use App\Rating;
use App\Vendor;
use App\EventCaterer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfileController extends Controller
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

    public function update(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'nullable',
                'birthday' => 'nullable',
                'about' => 'nullable|string',

                'address' => 'nullable|string',
                'city' => 'nullable|string',
                'country' => 'nullable|string',

                'website' => 'nullable',
                'facebook_url' => 'nullable',
                'twitter_url' => 'nullable'
            ]);

            if ($validator->fails()) {

                throw new Exception($validator->errors(), 1);
            }

            $user = Auth::user();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->phone = $request->input('phone');
            $user->birthday = $request->input('birthday');
            $user->about = $request->input('about');

            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->website = $request->input('website');
            $user->facebook_url = $request->input('facebook_url');
            $user->twitter_url = $request->input('twitter_url');

            //validate email/username
            $email = $request->input('email');
            if(User::where('id', '!=', $user->id)->where('email', $email)->count() > 0)
                throw new Exception("email already taken", 1);

            $username = $request->input('username');
            if(User::where('id', '!=', $user->id)->where(['username' => $username])->count() > 0)
                throw new Exception("username already taken", 1);
                
            $user->email = $email;
            $user->username = $username;

            $user->save();

            return redirect(url('caterer/profile?tab=settings'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/profile?tab=settings'))->with("error", $e->getMessage());
        }
            
    }
}
