<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('backend.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $desc = Service::create($request->validated());

        if($request->hasfile('icon')) {
            $photo_upload = $request->icon;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $image_resize= Image::make($photo_upload)->resize(50, 50)->save(public_path('images/backend/' . $filename));

            Service::find($desc->id)->update([
                'icon' => $filename

            ]);
        }

        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('backend.services.form',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {



        $service->update($request->validated());

            if($request->hasfile('icon')) {

// delete old photo
                        $deleteoldphoto = Service::find($service->id)->icon;
                        if ($deleteoldphoto) {
                            $path = public_path('images/backend/') . $deleteoldphoto;
                            if (file_exists($path)) {
                                unlink($path);
                            }
                        }


              $photo_upload = $request->icon;
                $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
                $image_resize= Image::make($photo_upload)->resize(50, 50)->save(public_path('images/backend/' . $filename));



                Service::find($service->id)->update([
                    'icon' => $filename,

                ]);
            }


            return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
         // delete old photo
         $deleteoldphoto = Service::find($service->id)->icon;
         if ($deleteoldphoto) {
             $path = public_path('images/backend/') . $deleteoldphoto;
             if (file_exists($path)) {
                 unlink($path);
             }
         }

         $service->delete();
         return back();
    }
}
