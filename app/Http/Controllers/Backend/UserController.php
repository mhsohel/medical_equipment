<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin.users.index');
        $users = User::all();

        return view('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin.users.create');
//        $roles = Role::getForSelect();
        $roles = Role::all();
        return view('backend.users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
//        return $request;

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'role' => 'required',
            'password' => 'required|confirmed|string|min:8',
            'avatar' => 'nullable|image'
        ]);

        $user = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->filled('status'),
        ]);
        // upload images
        if($request->hasfile('avatar')){
            $photo_upload = $request->avatar;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            Image::make($photo_upload)->resize(400, 400)->save(public_path('images/backend/' . $filename));

            User::find($user->id)->update([
                'avatar' => $filename
            ]);
        }

        notify()->success('User Successfully Added.', 'Added');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Gate::authorize('admin.users.index');

        return view('backend.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('admin.users.edit');
        $roles = Role::all();
        return view('backend.users.form', compact('roles','user'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email,'.$user->id,
            'role' => 'required',
            'password' => 'nullable|confirmed|string|min:8',
            'avatar' => 'nullable|image'
        ]);

        if($request->hasfile('avatar')) {

            $deleteoldphoto = $user->avatar;
            if ($deleteoldphoto) {
                $path = public_path('images/backend/') . $deleteoldphoto;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        if($request->hasfile('avatar')){
            $photo_upload = $request->avatar;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            Image::make($photo_upload)->resize(400, 400)->save(public_path('images/backend/' . $filename));

           }


//return $request;
        $user->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
            'status' => $request->filled('status'),
            'avatar' => $filename
        ]);
        // upload images







        notify()->success('User Successfully Updated.', 'Updated');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('admin.users.destroy');
        $user->delete();
        notify()->success("User Successfully Deleted", "Deleted");
        return back();
    }
}
