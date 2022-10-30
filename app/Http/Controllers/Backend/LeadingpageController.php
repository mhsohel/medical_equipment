<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Leadingpage;
use App\Http\Requests\StoreLeadingpageRequest;
use App\Http\Requests\UpdateLeadingpageRequest;
use Image;

class LeadingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leadingpages = Leadingpage::all();
        return view('backend.leadingpage.index',compact('leadingpages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.leadingpage.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeadingpageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeadingpageRequest $request)
    {

        $desc = Leadingpage::create($request->validated());

        if($request->hasfile('image')) {
            $photo_upload = $request->image;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $image_resize= Image::make($photo_upload)->resize(570, 577)->save(public_path('images/backend/' . $filename));

            Leadingpage::find($desc->id)->update([
                'image' => $filename

            ]);
        }

        return redirect()->route('admin.leadingpages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leadingpage  $leadingpage
     * @return \Illuminate\Http\Response
     */
    public function show(Leadingpage $leadingpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leadingpage  $leadingpage
     * @return \Illuminate\Http\Response
     */
    public function edit(Leadingpage $leadingpage)
    {
        return view('backend.leadingpage.form',compact('leadingpage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeadingpageRequest  $request
     * @param  \App\Models\Leadingpage  $leadingpage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeadingpageRequest $request, Leadingpage $leadingpage)
    {

        $leadingpage->update($request->validated());

            if($request->hasfile('icon')) {

// delete old photo
                        $deleteoldphoto = Leadingpage::find($leadingpage->id)->image;
                        if ($deleteoldphoto) {
                            $path = public_path('images/backend/') . $deleteoldphoto;
                            if (file_exists($path)) {
                                unlink($path);
                            }
                        }


              $photo_upload = $request->image;
                $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
                $image_resize= Image::make($photo_upload)->resize(570, 577)->save(public_path('images/backend/' . $filename));



                Leadingpage::find($leadingpage->id)->update([
                    'image' => $filename,

                ]);
            }


            return redirect()->route('admin.leadingpages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leadingpage  $leadingpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leadingpage $leadingpage)
    {
         // delete old photo
         $deleteoldphoto = Leadingpage::find($leadingpage->id)->icon;
         if ($deleteoldphoto) {
             $path = public_path('images/backend/') . $deleteoldphoto;
             if (file_exists($path)) {
                 unlink($path);
             }
         }

         $leadingpage->delete();
         return back();
    }
}
