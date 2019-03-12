@extends('master_1')

@section('title', "Profile")
@section('content')

<div class="section row container" >
    @if (Session('status'))
        <p class="section white-text green">{{session("status")}} </p>
    @endif
    <div class="collection col s12 row">
        <div class="col s12 m8 offset-m2 row">
            <img class="collection-item circle col s10 offset-s1 m12 l8 offset-l2" src="{{ asset('storage/'. $user->file) }}" height="300px"  alt="job logo">
        </div>
        <h3 class="col s12 collection-header row">
        <strong>Name:</strong>
            {{ $user->name}} {{ $user->surname }}
            <div class="divider"></div>
        </h3>
        
        <div class="col s12 collection-item">
           <p> <strong>Email:</strong>  {{ $user->email }}</p>
            <div class="divider"></div>
        </div>
        <div class="col s12">     
            <p>
                <strong>PhoneNumber:</strong> 
                &nbsp;
                {{$user->phone_number}}
            </p>
            <div class="divider"></div>
        </div>

        <div class="col s12">     
            <p>
                <strong>Sex:</strong> 
                &nbsp;
                {{$user->sex}}
            </p>
            <div class="divider"></div>
        </div>

        <div class="col s12">   
            <p>
                <strong>Address:</strong>
                &nbsp;
                <span class=""> 
                   &nbsp;
                   {{ $user->address }}
                </span>
                <a href="{{ (Auth::user()->id) ? route('user.edit', [Auth::user()->id]) : '#' }}" class="secondary-content">
                    <strong>Edit Profile</strong>
                </a>
            </p>
            
        </div>
        
    </div>

</div>

@endsection