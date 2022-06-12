<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        // $role = Role::where('slug','editor')->first();
        // $user->roles()->attach($role->id);
        // $user->hasRole('author')
        // $permission = Permission::first();
        // $user->permissions()->attach($permission->id);
        // $user->hasPermission('add-info');

        // STOP WORKING Can Not Working
        // dd($user->can('read-info'));
        $data = Information::latest()->get();
        return view('admin.info-index',compact('data'));
    }
    public function create()
    {
        return view('admin.info-add');
    }

    public function store(Request $request)
    {
        if($request->has('id')){
            Information::find($request->id)->update($request->all());
        }else{
            Information::create($request->all());
        }
        return redirect()->route('admin.info.show');
    }

    public function edit(int $id = null)
    {
        $data = Information::find($id);
        return view('admin.info-add',compact('data'));
    }
    
    public function destroy(int $id = null)
    {
        $data = Information::find($id);
        $data->delete();
        return redirect()->back();
    }
}
