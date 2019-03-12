<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Job;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function home(){
        $users = User::paginate(10);
        $user = User::find(1);
        $appliedJobs = $user->jobs()->pluck('name');
        // if ($user->role != 'admin'){
        //     $user->role = 'admin';
        //     $user->save();
        // }

        return view('backend.admin.users.index', compact('users', "appliedJobs"));
    }

    public function edit($id){
        $user = User::whereId($id)->firstOrFail();
        return view('backend.admin.users.edit', compact('user'));
    }

    public function update($id, UserEditFormRequest $request ){
        $user = User::whereId($id)->firstOrFail();
        if ($request['file']){
            $file = $request['file'];
            $fileName = $request['name']. $request['surname'] .'C.V'. time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $fileName);
        }

        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
       // $user->password = $request->get('password');
       $user->sex = $request->get('sex');
       $user->role = $request->get('role');
       $user->address = $request->get('address');
       $user->save();

        return redirect(action('Admin\UsersController@edit', $id))->with('status', 'Updated Successfully')  ;
    }

    public function delete($id){
        $user = User::whereId($id)->firstOrFail();

        if (Auth::user()->id != 1 && Auth::user()->role != 'admin'){
            return redirect('/admin')->with('cannot_delete', "You are not allowed to delete a user");
        }else{
            $user->delete();
            return redirect('/admin')->with('status', "User deleted");
        }
    }

    public function create(){
        return view('backend.admin.users.create');
    }

    public function store(UserEditFormRequest $request){
        if ($request['file']){
            $file = $request['file'];
            $fileName = $request['name'] . ' ' . $request['surname'] .'C.V'. time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $fileName);
        }
      
       User::create([
        'name' => $request['name'],
        'surname' => $request['surname'],
        'email' => $request['email'],
        'phone_number' => $request['phone_number'],
        'password' => bcrypt($request['password']),
        'sex' => $request['sex'],
        'address' => $request['address'],
        'file' => $path,

    ]);

       return redirect('/admin/users/create')->with('status', 'User created successfully');
    }

 
}
