<?php

namespace App\Http\Controllers\Caterer;

use Auth;
use Exception;
use Validator;
use App\User;
use App\EventCaterer;
use App\EventCatererMenu;
use App\EventCatererPortfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventCatererController extends Controller
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

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();

        return view('caterer.event_caterer.menu', [
            'event_caterer' => $event_caterer,
        ]);

    }

    public function menuCreate()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();
        $model = new EventCatererMenu();

        return view('caterer.event_caterer.menu_create', [
            'event_caterer' => $event_caterer,
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

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $id = $request->input('id');

            $event_caterer = EventCaterer::find($id);
            $event_catererMenu = EventCatererMenu::create([
                'event_caterer_id' => $id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients'),
                'cook_time'  => $request->input('cook_time'),
                'servings'  => $request->input('servings'),
            ]);

            return redirect(url('caterer/event_caterer/menu'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/menu/create'))->with("error", $e->getMessage());
        }

    }

    public function menuEdit($id)
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();
        $model = EventCatererMenu::findOrFail($id);

        return view('caterer.event_caterer.menu_update', [
            'event_caterer' => $event_caterer,
            'model' => $model
        ]);

    }

    public function menuUpdate($id, Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                //'id' => 'required',
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

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $model = EventCatererMenu::findOrFail($id);

            $model->name = $request->input('name');
            $model->description = $request->input('description');
            $model->ingredients = $request->input('ingredients');
            $model->cook_time = $request->input('cook_time');
            $model->servings = $request->input('servings');
            $model->updated_at = date('Y-m-d h:i:s');

            $model->save();

            return redirect(url('caterer/event_caterer/menu'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/menu/update', ['id' => $id]))->with("error", $e->getMessage());
        }

    }

    public function menuDestroy($id)
    {
        try{

            $user = Auth::user();

            if(caterer_has_type($user))
                return redirect(url('caterer/category'));

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $model = EventCatererMenu::findOrFail($id);

            $model->delete();

            return redirect(url('caterer/event_caterer/menu'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/menu'))->with("error", $e->getMessage());
        }

    }

    public function portfolio()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();

        return view('caterer.event_caterer.portfolio', [
            'event_caterer' => $event_caterer,
        ]);
    }

    public function portfolioCreate()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();
        $model = new EventCatererPortfolio();

        return view('caterer.event_caterer.portfolio_create', [
            'event_caterer' => $event_caterer,
            'model' => $model
        ]);

    }

    public function portfolioStore(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'title' => 'required|string',
                'description' => 'required|string',
                'tags' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2084'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors(), 1);
            }

            $user = Auth::user();

            if(caterer_has_type($user))
                return redirect(url('caterer/category'));

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $id = $request->input('id');

            $event_caterer = EventCaterer::find($id);
            $model = EventCatererPortfolio::create([
                'event_caterer_id' => $id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'tags' => $request->input('tags')
            ]);

            if(!empty($request->file('image'))){
                $image = $request->file('image');
                $model->image = 'port-'.$model->id.'-'.time().'.'.$image->getClientOriginalExtension();

                $image->move( public_path(EventCatererPortfolio::$imagePath), $model->image);
                $model->save();
            }

            return redirect(url('caterer/event_caterer/portfolio'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/portfolio/create'))->with("error", $e->getMessage());
        }

    }

    public function portfolioEdit($id)
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();
        $model = EventCatererPortfolio::findOrFail($id);

        return view('caterer.event_caterer.portfolio_update', [
            'event_caterer' => $event_caterer,
            'model' => $model
        ]);

    }

    public function portfolioUpdate($id, Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                //'id' => 'required',
                'title' => 'required|string',
                'description' => 'required|string',
                'tags' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2084'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors(), 1);
            }

            $user = Auth::user();

            if(caterer_has_type($user))
                return redirect(url('caterer/category'));

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $model = EventCatererPortfolio::findOrFail($id);

            $model->title = $request->input('title');
            $model->description = $request->input('description');
            $model->tags = $request->input('tags');
            $model->updated_at = date('Y-m-d h:i:s');

            

            if(!empty($request->file('image'))){
                $image = $request->file('image');
                $old_image = $model->imagePath(true, true);

                $model->image = 'port-'.$model->id.'-'.time().'.'.$image->getClientOriginalExtension();

                $image->move( public_path(EventCatererPortfolio::$imagePath), $model->image);

                if(!empty($old_image))
                    unlink($old_image);
            }

            $model->save();

            return redirect(url('caterer/event_caterer/portfolio'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/portfolio/update', ['id' => $id]))->with("error", $e->getMessage());
        }

    }

    public function portfolioDestroy($id)
    {
        try{

            $user = Auth::user();

            if(caterer_has_type($user))
                return redirect(url('caterer/category'));

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $model = EventCatererPortfolio::findOrFail($id);

            $model->delete();

            return redirect(url('caterer/event_caterer/portfolio'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/portfolio'))->with("error", $e->getMessage());
        }

    }

    public function cover()
    {
        $user = Auth::user();

        if(caterer_has_type($user))
            return redirect(url('caterer/category'));

        if(!$user->isEventCaterer())
            return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

        $event_caterer = EventCaterer::where('user_id', $user->id)->first();

        return view('caterer.event_caterer.cover', [
            'event_caterer' => $event_caterer,
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

            if(!$user->isEventCaterer())
                return redirect(url('caterer/category'))->with('status', 'you are not a event_caterer');

            $id = $request->input('id');

            $event_caterer = EventCaterer::find($id);
            $event_caterer->cover = $request->input('cover');

            $event_caterer->save();

            return redirect(url('caterer/event_caterer/cover'))->with("status", "Data added succesfuly");

        }catch(Exception $e){
            return redirect(url('caterer/event_caterer/cover'))->with("error", $e->getMessage());
        }

    }
}
