<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    public function create(){
        $permission = new Permission;

        $permission->name = 'edit-user';
        $permission->display_name = 'Edit user';
        $permission->description = 'Ability to edit user';
        $permission->save();

        return redirect('/admin/roles/create')->with('status', 'Permission created successfilly');
    }
}
