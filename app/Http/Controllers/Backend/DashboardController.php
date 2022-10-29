<?php

namespace App\Http\Controllers\Backend;

use App\Models\Invoice;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function __invoke(Request $request)
//     {
// //        Gate::authorize('admin-dashboard');
// //        return view('backend.dashboard');
//     }

    public function index (Request $request)
    {

        return view('backend.dashboard');
    }





}
