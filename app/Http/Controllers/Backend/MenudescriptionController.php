<?php

namespace App\Http\Controllers\Backend;

use App\Models\Menudescription;
use App\Http\Controllers\Controller;
// use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreMenudescriptionRequest;
use App\Http\Requests\UpdateMenudescriptionRequest;
use Image;

class MenudescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descs = Menudescription::all();
        return view('backend.menudescriptions.index',compact('descs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menudescriptions.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenudescriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenudescriptionRequest $request)
    {

        // return $request->all();

        $desc = Menudescription::create($request->validated());

        if($request->hasfile('image')) {
            $photo_upload = $request->image;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $image_resize= Image::make($photo_upload)->resize(332, 610)->save(public_path('images/backend/' . $filename));

            Menudescription::find($desc->id)->update([
                'image' => $filename

            ]);
        }

        return redirect()->route('admin.menudescriptions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menudescription  $menudescription
     * @return \Illuminate\Http\Response
     */
    public function show(Menudescription $menudescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menudescription  $menudescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Menudescription $menudescription)
    {
        return view('backend.menudescriptions.form',compact('menudescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenudescriptionRequest  $request
     * @param  \App\Models\Menudescription  $menudescription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenudescriptionRequest $request, Menudescription $menudescription)
    {


        $menudescription->update($request->validated());

            if($request->hasfile('image')) {

// delete old photo
                        $deleteoldphoto = Menudescription::find($menudescription->id)->image;
                        if ($deleteoldphoto) {
                            $path = public_path('images/backend/') . $deleteoldphoto;
                            if (file_exists($path)) {
                                unlink($path);
                            }
                        }


              $photo_upload = $request->image;
                $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
                $image_resize= Image::make($photo_upload)->resize(332, 610)->save(public_path('images/backend/' . $filename));



                Menudescription::find($menudescription->id)->update([
                    'image' => $filename,

                ]);
            }


            return redirect()->route('admin.menudescriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menudescription  $menudescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menudescription $menudescription)
    {
        // delete old photo
        $deleteoldphoto = Menudescription::find($menudescription->id)->image;
        if ($deleteoldphoto) {
            $path = public_path('images/backend/') . $deleteoldphoto;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $menudescription->delete();
        return back();
    }
}
