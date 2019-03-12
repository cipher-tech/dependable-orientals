@extends('master_1')
@section("title", "All jobs")

@section('navbar')
@include('shared.sidenav')
@endsection

@section('content')


<div class="container row section" style="width:90%;">
    <div class="col s12 section z-depth-1">
        <div class="">
            @if (Session('status'))
                <p class="section white-text green">{{session("status")}} </p>
            @endif

            @if (Session('cannot_delete'))
                <p class="section white-text red">{{session("cannot_delete")}} </p>
            @endif

            <h3 class="section">
                <i class="fas fa-users"></i>
                All Jobs
            </h3>
        </div>
      
        @if (!$jobs->isEmpty())
            <table class="bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Salary</th>
                        <th>Categories</th>
                        <th>Rating</th>
                        <th>Slug</th>
                        <th>Joined At</th>
                        <th colspan="2" class="center">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                           <td>
                                {{ $job->name }} 
                            </td>
                            <td>  {!! mb_substr($job->description, 0, 20) !!} ... </td>
                            <td>{{ $job->salary }}</td>
                            <td>
                                {{ $job->Categories->pluck('name') }}

                            </td>
                            <td>{{ $job->rating }}</td>
                            <td>{{ $job->slug }}</td>
                            <td>{{ $job->created_at }}</td>
                            <td>
                                <a class="btn center-align light-blue waves-effect waves-light" href="{{ action('Admin\JobsController@edit', $job->id) }}">Edit &nbsp; <i class="fas fa-edit"></i>
                                </a> 
                            </td>
                            <td>
                                <form method="POST" action="{!! action('Admin\JobsController@delete', $job->id) !!}"> 
                                    {{ csrf_field() }}
                                    <button class="btn waves-effect waves-light red" type="submit">Delete</button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
           
        @else
            <p>There are no jobs</p>
        @endif
       
    </div>
   <div class="col s12"  style="padding:0px; margin: 10px 10px 10px 0px ">
    <a href="/admin/jobs/create" class="btn left blue lighten-2 waves-effect waves-light section">Create job</a>
   </div>

   <div class="col s12 m4 offset-m4">
        {{ $jobs->links() }}
   </div>
</div>



@endsection