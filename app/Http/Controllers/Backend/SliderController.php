<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create($request->validated());

        if($request->hasfile('image')) {
            $photo_upload = $request->image;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $image_resize= Image::make($photo_upload)->resize(1920, 800)->save(public_path('images/backend/' . $filename));

            Slider::find($slider->id)->update([
                'image' => $filename

            ]);
        }

        notify()->success("Slider Successfully Deleted", "Create");
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.form',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {

        $slider->update($request->validated());

            if($request->hasfile('image')) {

// delete old photo
                        $deleteoldphoto = Slider::find($slider->id)->image;
                        if ($deleteoldphoto) {
                            $path = public_path('images/backend/') . $deleteoldphoto;
                            if (file_exists($path)) {
                                unlink($path);
                            }
                        }


              $photo_upload = $request->image;
                $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
                $image_resize= Image::make($photo_upload)->resize(1920, 800)->save(public_path('images/backend/' . $filename));



                Slider::find($slider->id)->update([
                    'image' => $filename,

                ]);
            }

            notify()->success("Slider Successfully Updated", "Update");
            return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
          // delete old photo
          $deleteoldphoto = Slider::find($slider->id)->image;
          if ($deleteoldphoto) {
              $path = public_path('images/backend/') . $deleteoldphoto;
              if (file_exists($path)) {
                  unlink($path);
              }
          }
        $slider->delete();
        notify()->success("Slider Successfully Deleted", "Deleted");
        return back();
    }
}
