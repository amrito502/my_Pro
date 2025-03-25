<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller //implements HasMiddleware
{

    // public static function middleware()
    // {
    //     return [
    //         new Middleware('permission:view role', only: ['index']),
    //         new Middleware('permission:edit role', only: ['edit']),
    //         new Middleware('permission:create role', only: ['create']),
    //         new Middleware('permission:delete role', only: ['destroy']),
    //     ];
    // }
    public function index(){
        $roles = Role::orderBy('name','ASC')->paginate(7);
        return view('roles.list',[
            'roles' => $roles,
        ]);
    }
    public function create(){
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create',[
            'permissions'=> $permissions
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:roles|min:3'
        ]);

        if($validator->passes()){
            $role = Role::create(['name' => $request->name]);
            if(!empty($request->permission)){
                foreach($request->permission as $name){
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles.index')->with('success','Role Successfully Created!');
        }else{
            return redirect()->route(route: 'roles.create')->withInput()->withErrors($validator);
        }
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.edit',[
            'permissions' => $permissions,
            'hasPermissions' => $hasPermissions,
            'role' => $role
        ]);
    }
    public function update(Request $request, $id){
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:roles,name,'.$id.'id'
        ]);

        if($validator->passes()){
            $role->name = $request->name;
            $role->save();

            if(!empty($request->permission)){
                $role->syncPermissions($request->permission);
            }else{
                $role->syncPermissions([]);
            }
            return redirect()->route('roles.index')->with('success','Role Successfully Created!');
        }else{
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }
    public function destroy(Request $request){
        $id = $request->id;
        $role = Role::find($id);

        if($role == null){
            session()->flash('error', 'Role Deleted Failed!');
            return response()->json(['status'=> false]);
        }
        $role->delete();
        session()->flash('success','Role Deleted Successfully!');
        return response()->json(['status'=> false]);
    }
}
