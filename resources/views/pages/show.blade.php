@extends('layouts.project')
@section('content')

<div class="jumbotron">
    <div class="container">
        @foreach ($flyers as $flyer)
                <p>{{$flyer->street}}</p>
               <p> {{$flyer->price}}</p>
            
        @endforeach
      <p><a class="btn btn-primary btn-lg" href="/flyers/create" role="button">Add flyer</a></p>
    </div>
  </div>
  
  

@endsection
