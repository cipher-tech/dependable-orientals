@extends('master_1')
@section("title", "Jobs")


@section('content')
<div class="row">
        @foreach($selectedJobs as $job)
        <div class="col s12 m6 l4 row">
            <div class="col s12 m12">
              <div class="card hoverable">
                  <div class="card-image">
                    <img src="{{ asset('storage/'. $job->logo )}}" height="300px">
                    <span class="card-title"> {{ $job->name }}</span>
                  </div>
                    <div class="card-content">
                        <h5 class="row"> 
                            Description: 
                        </h5>
                        <div class="divider"></div>
                      <p> {!! mb_substr($job->description, 0, 200) !!} ...</p>

                      <p class="section">Salary: {!! $job->salary !!}</p>

                      <p> <span> <h5> Categories: </h5></span>   <?php foreach($job->categories->pluck('name') as $category) echo $category. ' ' ?> </p>
                    </div>
                    <div class="card-action">
                      <a href="{{ action('PublicJobsController@view', $job->id) }}"> More</a>
                      <span class="right"> 
                          Rating: <?php for ($i=0; $i < $job->rating; $i+= 1) { 
                              echo '<i class="fas fa-star yellow-text"></i>' ;
                          } ?> </span>
                    </div>
                  </div>
            </div>
        </div>
    @endforeach
    <div class="col s6 m4 offset-s3 offset-m5">
            {{ $selectedJobs->links() }}
        </div>
</div>

@endsection