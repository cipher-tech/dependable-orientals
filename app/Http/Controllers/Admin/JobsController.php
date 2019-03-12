<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Job;
use App\Http\Requests\JobFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\JobEditFormRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller

{
    public function index(){
        $categories = Category::all();
        $jobs = Job::paginate(10);

        return view('backend.admin.jobs.index', compact('categories', 'jobs'));
    }

    public function create(){
        $categories = Category::all();
        return view('backend.admin.jobs.create', compact('categories'));
    }

    public function store(JobFormRequest $request){
        if ($request->hasFile('logo') && $request->file('logo')->isValid() ){
            $file = $request['logo'];
            $fileName = $request['name'].'LOGO'. time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $fileName);
        }

        
        $slug = str_slug($request->get('name'));

        $jobs = new Job(array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'salary' => $request->get('salary'),
            'rating' => $request->get('rating'),
            'slug' => $slug,
            'logo' => $path,
        ));
        $jobs->save();
        $jobs->categories()->sync($request->get('category'));

        return redirect('admin/jobs/create')->with('status', "Job created successfully");
    }

    public function edit($id){
        $job = Job::whereId($id)->firstOrFail();
        $categories = Category::all();
        $selectedCategories = $job->categories->pluck('id')->toArray();

        return view('backend.admin.jobs.edit', compact('job', 'categories', 'selectedCategories'));
    }
    public function update($id, JobEditFormRequest $request){
      
        $slug = str_slug($request->get('name'));
        $job = Job::whereId($id)->firstOrFail();

        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $file = $request['logo'];
            $fileName = $request['name']. 'LOGO'. time(). '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $fileName);

            $job->logo = $path;
        }
        $job->name = $request->get('name');
        $job->description = $request->get('description');
        $job->salary = $request->get('salary');
        $job->rating = $request->get('rating');
        $job->slug = $slug;
        $job->save();
        $job->categories()->sync($request->get('category'));

        return redirect(action('Admin\JobsController@edit', $job->id ))->with('status', "Successfully Updated");

    }

    public function delete($id){
        $user = Job::whereId($id)->firstOrFail();

        if (Auth::user()->id != 1 && Auth::user()->role != 'admin'){
            return redirect('/admin/jobs')->with('cannot_delete', "You are not allowed to delete jobs");
        }else{
            $user->delete();
            return redirect('/admin/jobs')->with('status', "Job deleted");
        }
    }
}
