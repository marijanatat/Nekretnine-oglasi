<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flayer</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/lity.css')}}" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css" rel="stylesheet">
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->

    {{-- <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css"> --}}
<script src="{{asset('js/app.js')}}" defer></script>
 
{{-- <link href="dist/lity.css" rel="stylesheet"> --}}
<script src="https://unpjg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="dist/lity.js"></script>

</head>
<body>
  @include('flash')
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/pages/index">Flyers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
            </li>
            @if (Auth::check())
            <li class="nav-item" >
              <a class="nav-link" href="/flyers" id="navbarDropdown" role="button">
                  My flyers
              </a>
              {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               @include('flyers.all')
                <a class="nav-link" href="/flyers">My flyers</a>
               
              </div> --}}
          </li> 
            {{-- <li class="nav-item">
              @foreach (auth()->user()->flyers as $flyer)
              <a class="nav-link" href="/{{$flyer->zip}}/{{$flyer->street}}">My flyers</a>
              @endforeach
          
            </li> --}}
           
            @endif
         
              {{-- @if (Auth::check()) 
              <p class="navbar-text mr-2">
              
                 hello, {{Auth::user()->name}}
                 
              </p> --}}

              @if (Auth::check())

              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Hello,{{ Auth::user()->name }} <span class="caret"></span>
                </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>         

            </li>
            @endif
                  
          </ul>
  
           <!-- Authentication Links -->
           
           <form class="form-inline mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
         </div>
      </nav> 

    <div class="container ">
        @yield('content')
    </div>
    
    {{-- turbo links 
    <script src="http://unpkg.com/turbolinks"></script>--}}
    <div>
        @include('flash') 
    </div> 
    @yield('scripts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="/js/libs.js"></script>
  
</body>
</html>