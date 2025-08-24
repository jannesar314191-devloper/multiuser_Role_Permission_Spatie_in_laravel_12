<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permissionList(){
        $Permissions=Permission::all();
        return view('Permission.permissionList',compact('Permissions'));
    }
    
    public function createPermission(){
        return view('Permission.createpermission');
    }
    
    public function storePermission(Request $request){
        $permission=$request->all();
        Permission::create($permission);
        return redirect()->route('permissionList');
    }
    
    public function PermissionEdit($id){
    
        $Permission=Permission::find($id);
    
        return view('Permission.PermissionEdit',compact('Permission'));
    
    }
    
    public function PermissionUpdate($id,Request $request){
        $PermissionUpdate=$request->all();
        $Permission=Permission::find($id);
        $Permission->update($PermissionUpdate);
        return redirect()->route('permissionList');
    }
    
    public function PermissionDelete($id){
    
        $Permission=Permission::find($id);
       $Permission->delete();
      return redirect()->route('permissionList');
    
    
    }
}
