@extends('layouts.project')
@section('content')
<div class="row">
    @foreach (auth()->user()->flyers as $flyer)
                <a class="" href="/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}</a>
    @endforeach
</div>
@endsection
