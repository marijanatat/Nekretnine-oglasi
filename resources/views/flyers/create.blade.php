@extends('layouts.project')


@section('content')


<div class="jumbotron">
    <div class="container">       
      <h1 class="display-3">Selling your home</h1>
      <hr>

     <form action="/flyers" method="POST" enctype="multipart/form-data">
      @csrf
       @include('flyers.form')


    

     </form>

  
    </div>
  </div>

@endsection




