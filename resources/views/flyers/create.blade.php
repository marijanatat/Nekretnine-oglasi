@extends('layouts.project')


@section('content')


<div class="row">
<div class="jumbotron">
    <div class="container">       
      <h1 class="display-3">Selling your home</h1>
      <hr>

     <form action="/flyers" method="POST" enctype="multipart/form-data" class="col-med-6">
      @csrf
       @include('flyers.form')

      @if(count($errors) >0))
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
      @endif
      


    

     </form>

  
    </div>
  </div>
</div>

@endsection




