<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteRequest;
use App\Models\Quote;
use App\Models\Slider;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::all();

        return view('frontend.index',$data);
    }

    public function singlePage($slug)
    {

        $menu = Menu::where('slug',$slug)->first();
        return $menu;
        return view('frontend.index');
    }


    public function qouteSubmit(Request $request)
    {
            // return $request->all();
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|numeric',
            'message' => 'required',

        ]);

        $user = Quote::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('message', 'Your message has been sent successfully!');;
    }
}
