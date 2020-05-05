


@extends('layouts.project')
@section('content')

<div class="jumbotron">
    <div class="container">
      
        <h1>Project flyer</h1> 
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    @if(auth()->user())
      {{-- @auth --}}
      <p><a class="btn btn-primary btn-lg" href="/flyers/create" role="button">Add flyer</a></p>
    
  @else
  <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a></p>
      @endif
     
    </div>
  </div>
  
  

@endsection
