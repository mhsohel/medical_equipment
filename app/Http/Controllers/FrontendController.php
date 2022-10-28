<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Quote;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use App\Models\Tagservice;
use App\Models\Leadingpage;
use Illuminate\Http\Request;
use App\Models\Menudescription;
use App\Http\Requests\StoreQuoteRequest;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::all();
        $data['tagservices'] = Tagservice::where('status',1)->get();
        $data['aboutus']= Menudescription::where('id',3)->first();
        $data['us']= Leadingpage::take(1)->first();
        $data['services']= Service::where('status',1)->get();
        $data['products']= Product::where('status',1)->take(3)->get();

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
