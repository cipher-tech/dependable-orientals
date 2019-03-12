<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap 
    <link rel="stylesheet" type="text/css" href="{!! asset('bootstrap/css/bootstrap.css') !!}" >
    
    <script type="text/javascript" src="{!! asset('materialize/js/jquery-2.1.3.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('bootstrap/js/bootstrap.js') !!}"></script>
    -->
    <link rel="stylesheet" type="text/css" href="{!! asset('materialize/css/materialize.css') !!}" >
    <link rel="stylesheet" type="text/css" media="screen,projection" href="{!! asset('main.css') !!}" >
	
	<script type="text/javascript" src="{{ asset('materialize/js/jquery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('materialize/js/materialize.js') }}"></script>
	<script type="text/javascript" src="{{ asset('main.js') }}"></script>
	
    <link rel="stylesheet" type="text/css" href="{!! asset('fontawesome/css/all.css') !!}"/> 

  
  </head>
  <body>

	@section('navbar')
    @include("shared.navbar1")
    @show

    @yield("content")

      @section('footer')  
      <footer class="page-footer grey darken-2">
					<div class="row">
						<div class="row">
							<div class="col l4 s12">
								<h5 class="white-text">Contact</h5>
								<form action="/comment" method="post">
									{{csrf_field()}}
									@if(Auth::check())
										<input type="hidden" value="{{ Auth::user()->email }}" name="email">
									@else 
										<input type="email" name="email" placeholder="Enter your email" id="">
									@endif
									<textarea class="white-text" name="comment" id="comment" cols="30" rows="10" placeholder="Leave us a comment"></textarea>
									<input type="submit" class="btn white black-text" value="Submit">
								</form>
							</div>
							<!-- <div class="col l4 s12">
								<div class="white-text">
									<h5>
										Address:
									</h5>
									<address>
										PLOT 70, FLAT 10, <br>
										DANKANMA CLOSE OFF, <br>
										GONGOLA STREET AREA 2, <br>
										(GARKI, FCT) ABUJA.
									</address>
								</div>

							</div> -->
							<div class="col l4 s12 right">
								<h5 class="white-text">Links</h5>
								<ul>
									<li><a class="grey-text text-lighten-3" href="#!">
									<i class="fab fa-facebook"></i>	Facebook</a></li>
									<li><a class="grey-text text-lighten-3" href="#!">
										<i class="fab fa-twitter"></i>	Twitter</a></li>
									<li><a class="grey-text text-lighten-3" href="#!">
											<i class="fab fa-instagram"></i> Instergram
									</a></li>
									<li><a class="grey-text text-lighten-3" href="#!">
											<i class="fab fa-snapchat"></i> Snapchat
									</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="footer-copyright">
						<div class="container">
						© 2019 Copyright Cipher-Tech

						<a class="grey-text text-lighten-3 right" href="#!">
							<i class="fab fa-facebook"></i>
							&nbsp; &nbsp;
						</a>
					
						<a class="grey-text text-lighten-3 right" href="#!">
							<i class="fab fa-instagram"></i>
							&nbsp; &nbsp;
						</a>
 
						<a class="grey-text text-lighten-3 right" href="#!">
							<i class="fab fa-twitter"></i>
							&nbsp; &nbsp;
						</a>
							
						<a class="grey-text text-lighten-3 right" href="https://github.com/cipher-tech">
							<i class="fab fa-github"></i>
							&nbsp; &nbsp;
						</a>
						
						<a class="grey-text text-lighten-4 right" href="#!">Website designed by Cipher-tech &nbsp; &nbsp;</a>
						</div>
					</div>
				</footer>

    @show

    
	
	

       
   </body>
</html>