@extends('master_1')

@section('title', "Job Info")
@section('content')

<div class="section row container" >
    @if (Session('status'))
        <p class="section white-text green">{{session("status")}} </p>
    @endif
    <div class="collection col s12 row">
        <div class="col s12 m8 offset-m2 row">
            <img class="collection-item circle col s10 offset-s1 m12 l8 offset-l2" src="{{ asset('storage/'. $job->logo) }}" height="300px"  alt="job logo">
        </div>
        <h3 class="col s12 collection-header row">
            {{ $job->name}}
            <div class="divider"></div>
        </h3>
        
        <div class="col s12 collection-item">
            {{ $job->description }}
            <div class="divider"></div>
        </div>
        <div class="col s12">     
            <p>
                <strong>Salary:</strong> 
                &nbsp;
                {{$job->salary}}
            </p>
            <div class="divider"></div>
        </div>
        <div class="col s12">   
            <p>
                <strong>Rating:</strong>
                &nbsp;
                <span class=""> 
                    <?php for ($i=0; $i < $job->rating; $i+= 1) { 
                        echo '<i class="fas fa-star yellow-text"></i>' ;
                    } ?> 
                </span>
                <a href="{{route('apply', [$job->id])}}" class="secondary-content">
                    <strong>Apply</strong>
                </a>
            </p>
            
        </div>
        
    </div>

</div>

@endsection