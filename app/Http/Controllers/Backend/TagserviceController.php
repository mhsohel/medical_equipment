<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tagservice;
use App\Http\Requests\StoreTagserviceRequest;
use App\Http\Requests\UpdateTagserviceRequest;
use Image;

class TagserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagservices = Tagservice::all();
        return view('backend.tagservices.index',compact('tagservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tagservices.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagserviceRequest $request)
    {
        $desc = Tagservice::create($request->validated());

        if($request->hasfile('icon')) {
            $photo_upload = $request->icon;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $image_resize= Image::make($photo_upload)->resize(50, 50)->save(public_path('images/backend/' . $filename));

            Tagservice::find($desc->id)->update([
                'icon' => $filename

            ]);
        }

        return redirect()->route('admin.tagservices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tagservice  $tagservice
     * @return \Illuminate\Http\Response
     */
    public function show(Tagservice $tagservice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagservice  $tagservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagservice $tagservice)
    {
        return view('backend.tagservices.form',compact('tagservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagserviceRequest  $request
     * @param  \App\Models\Tagservice  $tagservice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagserviceRequest $request, Tagservice $tagservice)
    {
        $tagservice->update($request->validated());

        if($request->hasfile('icon')) {

// delete old photo
                    $deleteoldphoto = Tagservice::find($tagservice->id)->icon;
                    if ($deleteoldphoto) {
                        $path = public_path('images/backend/') . $deleteoldphoto;
                        if (file_exists($path)) {
                            unlink($path);
                        }
                    }


          $photo_upload = $request->icon;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $image_resize= Image::make($photo_upload)->resize(50, 50)->save(public_path('images/backend/' . $filename));



            Tagservice::find($tagservice->id)->update([
                'icon' => $filename,

            ]);
        }


        return redirect()->route('admin.tagservices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagservice  $tagservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagservice $tagservice)
    {
        $deleteoldphoto = Tagservice::find($tagservice->id)->icon;
        if ($deleteoldphoto) {
            $path = public_path('images/backend/') . $deleteoldphoto;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $tagservice->delete();
        return back();
    }
}
