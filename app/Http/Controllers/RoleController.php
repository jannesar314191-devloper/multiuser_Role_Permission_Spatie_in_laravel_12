<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
public function roleList(){
    $roles=Role::all();
    return view('Role.roleList',compact('roles'));
}

public function createRole(){

    $permissions=Permission::all();
    return view('Role.createRole',compact('permissions'));
}

public function storeRole(Request $request){
   
    
   $role=new Role();
   $role->name=$request->name;
  $role->givePermissionTo($request->permissions);
    
  $role->save();
    return redirect()->route('roleList');
}

public function roleEdit($id){

    $role=Role::find($id);
    $permissions=Permission::all();
    return view('Role.roleEdit',compact('role','permissions'));

}

public function roleUpdate($id,Request $request){
   
    $role=Role::find($id);
    $role->name=$request->name;
    $role->update();
    $role->syncPermissions($request->permissions);
    
    return redirect()->route('roleList');

}

public function roleDelete($id){

    $role=Role::find($id);
 
    $role->revokePermissionTo($role->permissions);
   $role->delete();
  return redirect()->route('roleList');


}
}
