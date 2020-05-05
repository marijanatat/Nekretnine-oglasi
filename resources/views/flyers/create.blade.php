@extends('layouts.project')


@section('content')


<div class="jumbotron">
    <div class="container">       
      <h1 class="display-3">Selling your home</h1>
      <hr>
 
      <div class="clearfix">
        <a class=" btn btn-primary btn-sm float-right" 
         href="/pages/index" role="button" >Back to Homepage</a>
      </div>

     <form action="/flyers" method="POST" enctype="multipart/form-data" >
      @csrf
       @include('flyers.form')

       @include('errors')
 
     </form>
 
    </div>
  </div>


@endsection




