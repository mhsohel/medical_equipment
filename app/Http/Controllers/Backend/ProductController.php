<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
         // return $request->all();

         $desc = Product::create($request->validated());

         if($request->hasfile('image')) {
             $photo_upload = $request->image;
             $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
             $image_resize= Image::make($photo_upload)->resize(370, 250)->save(public_path('images/backend/' . $filename));

             Product::find($desc->id)->update([
                 'image' => $filename

             ]);
         }

         return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.form',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update($request->validated());

            if($request->hasfile('image')) {

// delete old photo
                        $deleteoldphoto = Product::find($product->id)->image;
                        if ($deleteoldphoto) {
                            $path = public_path('images/backend/') . $deleteoldphoto;
                            if (file_exists($path)) {
                                unlink($path);
                            }
                        }


              $photo_upload = $request->image;
                $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
                $image_resize= Image::make($photo_upload)->resize(370, 250)->save(public_path('images/backend/' . $filename));



                Product::find($product->id)->update([
                    'image' => $filename,

                ]);
            }


            return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
          // delete old photo
          $deleteoldphoto = Product::find($product->id)->image;
          if ($deleteoldphoto) {
              $path = public_path('images/backend/') . $deleteoldphoto;
              if (file_exists($path)) {
                  unlink($path);
              }
          }

          $product->delete();
          return back();
    }
}
