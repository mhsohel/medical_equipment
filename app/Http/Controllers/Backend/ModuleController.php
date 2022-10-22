<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        Gate::authorize('admin.modules.index');
        $modules = Module::latest()->get();

        return view('backend.modules.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin.modules.create');
      
        return view('backend.modules.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('admin.modules.create');
        
        $this->validate($request,[
            'name' => 'required|unique:modules',
            
        ]);

        $user = Module::create([
            
            'name' => $request->name,
        ]);
        notify()->success('Module Successfully Added.', 'Added');
        return redirect()->route('admin.modules.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        Gate::authorize('admin.modules.edit');
       
        return view('backend.modules.form', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        Gate::authorize('admin.modules.edit');
        
        $this->validate($request,[
            'name' => 'required|unique:modules',
            
        ]);

        $module->update([
            
            'name' => $request->name,
        ]);
        notify()->success('Module Successfully Updated.', 'updated');
        return redirect()->route('admin.modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        Gate::authorize('admin.modules.destroy');
        $module->delete();
        notify()->success("Module Successfully Deleted", "Deleted");
        return back();
    }
   
}
