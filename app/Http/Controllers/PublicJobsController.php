<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\User;
use App\Comment;
use App\Mail\AppliedJobMail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditFormRequest;
use Dotenv\Validator;
use App\Http\Requests\CommentFormRequest;
use App\Mail\CommentMail;
use Illuminate\Support\Facades\Mail;

class PublicJobsController extends Controller
{
    public function home(){
        $jobs = Job::paginate(3);
        $categories = Category::all();
        return view('layout', compact('jobs', "categories"));
    }
    public function index(){
        $jobs = job::paginate(6);
        return view('public.jobsIndex', compact('jobs'));
    }
    public function view($id){
        $job = Job::whereId($id)->firstOrFail();
        return view('public.viewJob', compact('job'));
    }

    public function viewCategory($id){
        $category = Category::whereId($id)->firstOrFail();
        $selectedJobs = $category->jobs()->paginate(3);
        
        return view('public.selectedJobs', compact('selectedJobs'));
        
    }

    public function apply($id){
        $user = User::whereId( (Auth::user()->id) ? Auth::user()->id : '' )->firstOrFail();
       
       
        if($user->jobs()->saveMany([Job::find($id)])){
            $user->save();
            $job = Job::whereId($id);
            $mainUser = User::whereId($user);
            //Mail::to("nickchibuikem@gmail.com")->send(new AppliedJobMail($job, $mainUser));
            return redirect()->back()->with('status', 'Application Submitted Successfully');
        }else{
            return redirect()->back()->with('status', 'Failed to submit');
        }
    }

    public function profile($id){
        $user = User::whereId($id)->firstOrFail();
        return view('public.userProfile', compact('user'));
    }

    public function editUser($id) {
        $user = User::whereId($id)->firstOrFail();
        return view("public.editUser", compact('user'));
    }

    public function update($id, UserEditFormRequest $request){
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
        $user->address = $request->get('address');
        $user->file = ($request['file']) ? $path : $user->file;
        $user->save();

        return redirect()->back()->with('status', "Updated Successfully");
    }

    public function comment(CommentFormRequest $request){
        $comment = $request->get('comment');
        if(Auth::guest()){
            if( $request->get('email') ){
                $email = $request->get('email');
            }
        }
        $newComment = new Comment(array(
            'comment' => $request->get('comment')
        ));
        $newComment->save();

        $newComment->users()->associate((Auth::check()) ? Auth::user()->id : '' );
        
        $emailAddress = "nickchibuikem@gmail.com";
        //Mail::to($emailAddress)->send(new CommentMail($comment, $email));
        return redirect()->back();//->with('status', $comment);
    }
}
