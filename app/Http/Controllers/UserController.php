<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function createuser (){
        return view('User.createuser');
    }

    public function storeuser(Request $request){

     $user=$request->all();
     User::create($user);
     return redirect()->route('userList');

         
    }

    public function userList(){
        $users=User::all();
        return view('User.userList',compact('users'));
    }

    public function userEdit($id){
        $user=User::find($id);
        return view('User.userEdit',compact('user'));
    }

    public function userUpdate($id ,Request $request){
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->hasAny('password')){
            $user->password=$request->password; 
        }
        $user->save();

        return redirect()->route('userList');


    }

    public function userDelete($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->route('userList');

    }

    public function usersetrole($id){
     
        $user=User::find($id);
        $roles=Role::all();
     return   view('User.usersetrole',compact('user','roles'));
         
    }

    public function storeusersetrole($id,Request $request){
       
        $user=User::find($id);
        $roles=Role::all();
        $user->syncRoles($request->roles);
     return   view('User.usersetrole',compact('user','roles'));
    }

    public function usersetpermission($id){

        $user=User::find($id);   
        $permissionsViaRoles = $user->getPermissionsViaRoles();
        $permissions=Permission::all();
        return view('User.usersetpermission',compact('user','permissions','permissionsViaRoles'));
    }

    public function storeusersetpermission($id,Request $request){

           
        $user=User::find($id);
        $permissions=Permission::all();
        $user->syncPermissions($request->permissions);
     return   view('User.usersetpermission',compact('user','permissions'));

    }
}
