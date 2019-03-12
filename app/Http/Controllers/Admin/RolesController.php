<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;



class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create(){
        $user = User::where('id', 1)->get();
        
        return view('backend.roles.create');
    }

    public function store(RoleFormRequest $request){
        $role = new Role(array(
            'name' => $request->get('name'),
        ));
        $role->save();

      
        

        return redirect('/admin/roles/create')->with('status', 'Role created successfully');
    }

   
}
