@extends('master_1')
@section("title", "homepage")


@section('content')

<div class="hidden">
vdrsvgf
</div>

<div class="parallax-container" style="overflow:visible">
            @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif
    <div class="slider carusel1">
        <div class="search-div row">
            <a class='search-btn col s6 m4 l2 offset-s3 offset-m4 offset-l5 dropdown-button btn' href='#' data-activates='dropdown4'>Jobs in Dubai!</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown4' class='search-btn col s6 m4 l2 offset-s3 offset-m4 offset-l5 dropdown-content'>
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ action('PublicJobsController@viewCategory', $category->id) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                          
                    @endforeach
                </ul>
         
        </div>
         <ul class="slides black-text">
           <li>
             <img src="{!! asset('wallpaper/5.jpg') !!}" alt="">
             <div class="caption ">
               <h3 class="">We Are Dependable</h3>
               <br>
               <p> <h5 class="left-align "> You can depend on us for the latest in the job industry </h5> </p>
              </div>
           </li>
         <li>
             <img src="{!! asset('wallpaper/3.jpg') !!}" alt="">
             <div class="caption left-align">
               <h3>The Job Of Your Dreams </h3>
               <h5 class="light grey-text text-lighten-3"> From our long list of top jobs, it's hard to miss your deram job... </h5>
             </div>
           </li>
           <li>
                <img src="{!! asset('wallpaper/6.jpg') !!}" alt=""> 
                <div class="caption left-align">
                  <h3>Customer Service</h3>
                  <h5 class="light grey-text text-lighten-3">You can ask us any question via our contact page <br> and we'll doour best to reply</h5>
                </div>
            </li>
            <li>
                    <img src="{!! asset('wallpaper/1.jpg') !!}" alt="">
                    <div class="caption left-align">
                      <h3>Security Is Our Moto</h3>
                      <h5 class="light grey-text text-lighten-3">Your details are safe with us.  <br>
                        Our privacy policy ensures that we provide your info with top notch security </h5>
                    </div>
            </li>
        </ul>
    </div>
  <div class="parallax">
    <!-- <img src="{!! asset('wallpaper/IMG-20181217-WA0005.jpg') !!}" alt=""> -->
  </div>
</div>


        <div id="row cen-txt">
            <h4 id="cen-txt1" class="container">Welcome To Dependable Oriental Recuritment Services</h4>
            <p class="cen-txt2">   
                  </p>
    </div>
    
        <div class="row container center-align ">
            <div class="row col s12 offset-s1 l9 offset-l1">
                <a href="/jobs" class="col s6 m4 offset-m3 offset-l4 jobs-button red-text lighten-1">
                    View Jobs
                </a>
        
                <a href="/login" class="col s6 m4 jobs-button2 red lighten-1">
                    Sign in
                </a>
            </div>
        </div> 
    
        <div class="divider"></div>
    
    
    
        <div class="row container main-div">
                <div class="col s12 m6 l4 inner-div">
                    <div class="img-div container">
                         <span  class="container" style="font-size: 80px; text-align:center; color: Dodgerblue;">
                             <i class="far fa-money-bill-alt container"></i>
                         </span>
                    </div>
     
                    <div class="txt-div container section"> 
                        Big companies with good reputation and a higher pay scale are seeking good works.
                        which makes it possible to
                        get paid while working the job of your dreams.

                    </div>
                    
                    <!-- <div class="button-group row container center-align ">
                        <a href="#" class="col s6 offset-s4 m4 offset-m4 jobs-button3 red-text lighten-1">
                            More
                        </a>
                    </div> -->
                </div>
     
     <!-- next block                     -->
     <div class="col s12 m6 l4 inner-div">
             <div class="img-div container">
                  <span  class="container" style="font-size: 80px; text-align:center; color: Dodgerblue;">
                      <i class="fas fa-thumbs-up container"></i>
                  </span>
             </div>
     
             <div class="txt-div container section">
                With countless experts looking for better opportunities in a land filled with oppotunities.
                getting the right job might be a pain.
                Here at Dependable Oriental Recruitment we take the pain away.
                    
                    
             </div>
             <div class="button-group row container center-align ">
                <!-- <a href="#" class="col s6 offset-s4 m4 offset-m4 jobs-button3 red-text lighten-1">
                    More
                </a> -->
            </div>
     </div>
     
         <div class="col s12 m6 l4 inner-div">
                 <div class="img-div container">
                      <span class="container" style="font-size: 80px; text-align:center; color: Dodgerblue;">
                          <i class="far fa-star container"></i>
                      </span>
                 </div>
         
                <div class="txt-div container section">
                    With our experts working round the clock to provide you the best jobs to choose from.
                    from the comfort of your home.
                    Getting a job Has never been easier. 
                        
                </div>
    
                      <div class="button-group row container center-align ">
                        <!-- <a href="#" class="col s6 offset-s4 m4 offset-m4 jobs-button3 red-text lighten-1">
                           More
                        </a> -->
                    </div>
             </div>
            </div>
            <div class="divider"></div>



 <div class="parallax-container">
    <div class="parallax">
      <img src="{!! asset('wallpaper/jobs3.jpg') !!}" alt="">
     </div>
  </div>
  
        <div class="job-collection">
                <div class="row">
                    @foreach($jobs as $job)
                    <div class="col s12 m6 l4 row">
                        <div class="col s12 m12">
                          <div class="card hoverable">
                              <div class="card-image">
                                <img src="{{ asset('storage/'. $job->logo )}}" height="250px">
                                <span class="card-title"> {{ $job->name }}</span>
                              </div>
                                <div class="card-content">
                                    <h5 class="row"> 
                                        Description: 
                                    </h5>
                                    <div class="divider"></div>
                                  <p> {!! mb_substr($job->description, 0, 200) !!} ...</p>
            
                                  <p class="section">Salary: {!! $job->salary !!}</p>
                                </div>
                                <div class="card-action">
                                  <a  href="{{ action('PublicJobsController@view', $job->id) }}"> More</a>
                                  <span class="right"> 
                                      Rating: <?php for ($i=0; $i < $job->rating; $i+= 1) { 
                                          echo '<i class="fas fa-star yellow-text"></i>' ;
                                      } ?> </span>
                                </div>
                              </div>
                        </div>
                    </div>
                @endforeach
                    </div>

        </div>


@endsection