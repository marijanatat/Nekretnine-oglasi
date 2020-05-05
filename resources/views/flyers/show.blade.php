@extends('layouts.project')

@section('content')
<div class="row">
    <div class="col-md-4 mt-5">
        <h1>{{ $flyer->city }}</h1>
        <h1>{{ $flyer->street }}</h1>
        <h2>{{ $flyer->price }}</h2>
        <hr>
        <div class="description">{!! nl2br($flyer->description) !!}</div>
    </div>

    @if (Auth::check())
  
    <div class="col-md-8 mt-2">
        @foreach ($flyer->photos->chunk(4) as $set)
        <div class="row ">
            @foreach ($set as $photo)
            <div class="col-md-3 mb-2">
                <form action="/photos/{{$photo->id}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="hidden" name="_method" id="" value="DELETE">
                    <button type="submit">Delete</button>
                </form>
               <a href="/{{$photo->path}}" data-lity>
                <img src="{{ asset($photo->thumbnail_path) }}" alt="" style="max-width: 180px">
                </a>
 
            </div>
            @endforeach
        </div>
        @endforeach
        @if(auth()->user() && auth()->user()->owns($flyer))
        <hr>
        {{-- forma mora da ima klasu dropzone, id od forme mora da se referencira na objekat Dropzone u scriptsu --}}
        <form class="dropzone" id="add-photos-form" {{-- action="/{{$flyer->zip}}/{{$flyer->street}}/photos" --}}
            action="{{route('store_photo_path',[$flyer->zip,$flyer->street])}}" method="POST">

            @csrf
        </form>
        @endif
    </div>
</div>

@endif

{{-- </div> --}}
@endsection

@if (Auth::check())
@section('scripts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
<script>
    Dropzone.options.addPhotosForm = {
            paramName: "photo",
            maxFilesize: 10,
            maxFiles: 10,
            acceptedFiles: ".jpg,.jpeg,.png,.bmp"
        };
</script>
@endsection
@endif