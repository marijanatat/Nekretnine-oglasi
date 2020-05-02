@extends('layouts.project')

@section('content')
<div class="container mt-5">
    <hr>
      <h2>{{$flyer->street}}<h2>
          <hr>
        <div >{{$flyer->city}}</div>
        <hr>
    <div >{!!($flyer->description)!!}</div>
    <hr>
    {{-- <h2>{{number_format($flyer->price)}}</h2> --}}
    <h2>{{$flyer->price}}</h2>
</div>
@endsection