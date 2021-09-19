@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center  mb-4">
                {{$webinar->topic}}
            </h1>
            <p>
                <strong>Date:</strong> {{$webinar->date}},
                <!-- {{ \Carbon\Carbon::parse($webinar->date)->diffForHumans() }} -->

                <strong>Time:</strong>
                {{$webinar->time}}
                <br>
                <strong>Presenter:</strong> {{$webinar->presenter}}
                <br>
                <strong>Mode:</strong> {{$webinar->mode}}
                <br>
                <strong>Source code:</strong> <a href="{{$webinar->source_code}}" target="_blank">
                    {{$webinar->source_code}}
                </a>
            </p>
            <div class="d-flex my-4">
                {!! $webinar->youtube_embed_code !!}
            </div>

            @if(!Auth::guest())
            <div class="d-flex">
                <a href="/webinars/{{$webinar->id}}/edit" class="btn btn-primary px-4 mr-2">
                    Edit Webinar
                </a>

                <form action="/webinars/{{$webinar->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger px-4" onclick="return confirm('Are you sure?')">Delete Webinar</button>
                </form>
            </div>

            @endif
        </div>
    </div>
</div>
@endsection